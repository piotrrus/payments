<?php

namespace App\Controllers;

use App\Models\Bank;
use App\Models\Payments;
use App\Library\Template;
use App\Library\FilesImportFactory;

class IndexController extends Controller
{

    private $bank;
    private $view;
    private $payments;

    public function __construct()
    {
        $this->bank = new Bank();
        $this->payments = new Payments();
        $this->view = new Template();

        $method = $this->getMethodName();
        if (method_exists($this, $method)) {
            $func = [$this, $method];
            $func();
        }
    }

    /**
     * render form with bank list and file input
     */
    public function index()
    {
        echo $this->view->render('import', [
            'bankList' => $this->bank->allWithFilesTypes()
        ]);
    }

    /**
     * render imported data
     */
    public function show()
    {
        $importedData = [];
        
        $bankFileTypeId = $this->postRequest('bankFileTypeId');
        $bankData = $this->bank->getBankDataByFileTypeId($bankFileTypeId);

        $import = new FilesImportFactory();
        $file = $import->getFileType('dat');

        $fileName = $_FILES['file']['tmp_name'];

        if ($this->checkFileTypeForBank()) {
            $importedData = $file->getFile($fileName);
            $newImportedData = $this->checkIfImportedDataExist($importedData);

            echo $this->view->render('preview', [
                'importedData' => $newImportedData,
                'bankData' => $bankData,
                'fileExtension' => $this->checkFileTypeForBank()
            ]);
        } else {
            $this->error($bankData);
        }
    }

    private function error($bankData)
    {
        echo $this->view->render('fileMessage', [
            'bankData' => $bankData
        ]);
    }

    public function save()
    {
        $postArgs = filter_input_array(INPUT_POST);
        $payments = new Payments();
        $payments->save($postArgs);
        echo $this->view->render('payments/index', [
            'payments' => $this->payments->all()
        ]);
    }

    /**
     * comparing bank file type & customer file
     * @return boolean
     */
    private function checkFileTypeForBank()
    {
        $bankFileTypeId = $this->postRequest('bankFileTypeId');
        $bankData = $this->bank->getBankDataByFileTypeId($bankFileTypeId);
        $bankFileExtension = $bankData['file_type'];
        $importedFile = $_FILES['file']['name'];
        $ext = pathinfo($importedFile, PATHINFO_EXTENSION);

        if ($ext != $bankFileExtension) {
            return false;
        }
        return true;
    }

    /**
     * check if imported data (row) already exist in database
     * @param array $data
     * @return type
     */
    private function checkIfImportedDataExist(array $data)
    {
        for ($k = 1; $k <= count($data); $k++) {
            $exist = $this->payments->checkIfDataExist($data[$k]);
            $data[$k]['exist'] = $exist['amount'];
        }
        return $data;
    }

}
