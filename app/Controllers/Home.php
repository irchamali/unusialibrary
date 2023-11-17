<?php

namespace App\Controllers;

class Home extends MyController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view('frontend', 'home', $this->data);
    }
}
