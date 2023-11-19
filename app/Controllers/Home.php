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
        $data = $this->data;
        $data['koleksi_buku'] = $this->getBookCollection();
        $this->view('frontend', 'Frontend/home', $data);
    }

    public function profileSejarah()
    {
        $data = $this->data;
        $data['title'] = 'Sejarah';
        $this->view('frontend', 'Frontend/profile_sejarah', $data);
    }

    public function profileVisiMisi()
    {
        $data = $this->data;
        $data['title'] = 'Visi & Misi';
        $this->view('frontend', 'Frontend/profile_visi_misi', $data);
    }

    public function profileStrukturOrganisasi()
    {
        $data = $this->data;
        $data['title'] = 'Struktur Organisasi';
        $this->view('frontend', 'Frontend/profile_struktur_organisasi', $data);
    }

    private function getBookCollection()
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
        // echo "<pre>";
        // print_r($result);
        // exit;
    }
}
