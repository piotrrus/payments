<?php

namespace App\Controllers;

use App\Models\Payments;
use App\Library\Template;
use App\Library\Formatter;
use App\Library\CsvFile;

class PaymentsController extends Controller
{

    private $payments;
    private $view;

    public function __construct()
    {
        $this->payments = new Payments();
        $this->view = new Template();

        $method = $this->getMethodName();
        if (method_exists($this, $method)) {
            $func = [$this, $method];
            $func();
        }
    }

    public function index()
    {
        echo $this->view->render('payments/index', [
            'payments' => $this->payments->all()
        ]);
    }

    public function show()
    {
        
    }

    public function save()
    {
        
    }

}
