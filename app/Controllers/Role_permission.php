<?php

namespace App\Controllers;

class Role_permission extends MyController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // echo "<pre>";
        // print_r($this->data['setting_aplikasi']);
        // echo "</pre>";
        // die;
        $this->view('backend', 'dashboard', $this->data);
    }
}
