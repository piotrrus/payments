<?php

namespace App\Controllers;

use App\Library\Request;

abstract class Controller
{

    private $request;

    abstract public function index();

    abstract public function save();

    abstract public function show();

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
