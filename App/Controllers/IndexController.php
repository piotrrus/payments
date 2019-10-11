<?php

namespace App\Controllers;

use App\Models\Bank;
use App\Library\Template;
use App\Library\Formatter;
use App\Library\CsvFile;
use App\Interfaces\ImportInterface;

class IndexController extends Controller implements ImportInterface
{

    private $bank;
    private $view;

    public function __construct()
    {
        $this->bank = new Bank();
        $this->view = new Template();

        $method = $this->getMethodName();
        if (method_exists($this, $method)) {
            $func = [$this, $method];
            $func();
        }
    }

    public function index()
    {
        echo $this->view->render('import', [
            'bank_list' => $this->bank->allWithFilesTypes()
        ]);
    }

    public function show()
    {
        $importedData = [];
        $format = new Formatter();
        $csvFile = new CsvFile();

        $bankFileTypeId = $this->postRequest('bankFileTypeId');
        $bankData = $this->bank->getBankDataByFileTypeId($bankFileTypeId);

        $file = $_FILES['file']['tmp_name'];

        $fileInfo = $_FILES['file']['name'];
        $ext = pathinfo($fileInfo, PATHINFO_EXTENSION);

        $this->checkFileTypeForBank();

//        if ($ext != 'dat') {
//             var_dump($ext);            exit();
//        }

        
        
        $importedData = $csvFile->getCsvFile($file);
        // $this->checkIfImportedDataExist($importedData);
        
        echo $this->view->render('preview', [
            'importedData' => $importedData,
            'bankData' => $bankData,
            'fileExtension' => $ext
        ]);
    }

    public function save()
    {
        $data = $this->bank->allWithCurrency();
        //print_r($data);
    }

    private function checkFileTypeForBank()
    {

        $bankFileTypeId = $this->postRequest('bankFileTypeId');
        $bankData = $this->bank->getBankDataByFileTypeId($bankFileTypeId);
        $bankFileExtension = $bankData['file_type'];
        $importedFile = $_FILES['file']['name'];
        $ext = pathinfo($importedFile, PATHINFO_EXTENSION);
        var_dump($ext);
        var_dump($bankFileExtension);

        if ($ext != $bankFileExtension) {
            return false;
        }
        return true;
    }

    private function checkIfImportedDataExist(array $data)
    {
        for ($k = 1; $k <= count($data); $k++) {
            $exist = false;
            if ($this->bank->checkIfDataExist($data[$k])){
               $exist = true; 
            }
            $data[$k]['exist'] = $exist;
            echo $this->bank->checkIfDataExist($importedData[$k]) . '</br>';
//            $date = $importedData[$k]['date'];
//            $client = $importedData[$k]['client'];
//            $value = $importedData[$k]['value'];
//            $account = $importedData[$k]['account'];
        }
    }

}
