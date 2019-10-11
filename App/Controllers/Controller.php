<?php

namespace App\Controllers;

use App\Library\Request;

class Controller
{

    private $request;

    public function getRequest($request)
    {
        $this->request = new Request();
        return $this->request->get($request);
    }

    public function getMethodName()
    {
        $this->request = new Request();
        return $this->request::get('action', 'index');
    }
    
    public function postRequest(string $key)
    {
        $this->request = new Request();
        return $this->request::post($key);
    }

}
