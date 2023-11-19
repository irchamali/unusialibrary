<?php

namespace App\Controllers;

class Book_new extends MyController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = $this->data;
        $data['koleksi_buku'] = $this->getData();
        $this->view('frontend', 'Frontend/book_new', $data);
    }

    private function getData()
    {
        $curl = service('curlrequest');

        $response = $curl->request("POST", "https://unusia.perpustakaan.co.id/view/ajax", [
            "headers" => [
                "Accept" => "application/json, text/javascript, */*; q=0.01"
            ],
            "form_params" => [
                "action" => "get_collectionbook_front"
            ]
        ]);

        $result = [];
        if (200 == $response->getStatusCode()) {
            $result = json_decode($response->getBody(), true)['data'] ?? null;
        }

        return $result;
    }
}
