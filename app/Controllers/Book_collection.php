<?php

namespace App\Controllers;

class Book_collection extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        // $this->addStyleBackend(base_url('public/backend/bower_components/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        // $this->addStyleBackend(base_url('public/backend/bower_components/sweetalert2/') . 'sweetalert2.min.css');
        // $this->addScriptBackend(base_url('public/backend/bower_components/datatables.net/js/') . 'jquery.dataTables.min.js');
        // $this->addScriptBackend(base_url('public/backend/bower_components/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        // $this->addScriptBackend(base_url('public/backend/bower_components/bootbox/') . 'bootbox.min.js');
        // $this->addScriptBackend(base_url('public/backend/bower_components/sweetalert2/') . 'sweetalert2.min.js');
    }

    function http_request($url)
    {
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt(
        //     $ch,
        //     CURLOPT_POSTFIELDS,
        //     "action=get_collectionbook_front"
        // );
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $output = curl_exec($ch);
        // curl_close($ch);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt(
            $ch,
            CURLOPT_POSTFIELDS,
            "action=get_collectionbook_front"
        );

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close($ch);
        return $server_output;
    }

    public function index()
    {
        // echo "<pre>";
        // print_r($server_output);
        // echo "</pre>";
        // die;
        $this->data['title'] = 'Daftar Koleksi Buku';
        $test = $this->http_request("https://unusia.perpustakaan.co.id/view/ajax");
        $test = json_decode($test, TRUE);
        $this->data['book_collection'] = $test;
        $this->view('frontend', 'Book_collection/index', $this->data);
    }

    public function ajaxGetData()
    {
        $test = $this->http_request("https://unusia.perpustakaan.co.id/view/ajax");
        $test = json_decode($test, TRUE);
        print_r($test);
    }
}
