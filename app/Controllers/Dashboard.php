<?php

namespace App\Controllers;

class Dashboard extends MyController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // echo "<pre>";
        // print_r($this->data);
        // echo "</pre>";
        // die;
        $this->view('backend', 'dashboard', $this->data);
    }
}
