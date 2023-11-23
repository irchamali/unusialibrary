<?php

namespace App\Controllers;

use App\Models\ArtikelModel;

class Home extends MyController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ArtikelModel;
    }

    public function index()
    {
        $data = $this->data;
        $data['koleksi_terbaru'] = $this->getBookCollection();
        $data['berita'] = $this->model->getArtikel('Berita');
        $data['pengumuman'] = $this->model->getArtikel('Pengumuman');
        $data['agenda'] = $this->model->getArtikel('Agenda');
        $this->view('frontend', 'website/home', $data);
    }

    public function contactUs()
    {
        $data = $this->data;
        $data['title'] = 'Kontak Kami';
        $this->view('frontend', 'website/kontak_kami', $data);
    }

    public function profileSejarah()
    {
        $data = $this->data;
        $data['title'] = 'Sejarah';
        $this->view('frontend', 'website/profile_sejarah', $data);
    }

    public function profileVisiMisi()
    {
        $data = $this->data;
        $data['title'] = 'Visi & Misi';
        $this->view('frontend', 'website/profile_visi_misi', $data);
    }

    public function profileStrukturOrganisasi()
    {
        $data = $this->data;
        $data['title'] = 'Struktur Organisasi';
        $this->view('frontend', 'website/profile_struktur_organisasi', $data);
    }

    public function fasilitas()
    {
        $data = $this->data;
        $data['title'] = 'Fasilitas';
        $this->view('frontend', 'website/fasilitas', $data);
    }

    public function book()
    {
        $data = $this->data;
        $data['title'] = 'Buku';
        $data['koleksi_buku'] = $this->getBookCollection();
        // echo "<pre>";
        // print_r($this->data);
        // echo "</pre>";
        // die;
        $this->view('frontend', 'website/book', $data);
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
