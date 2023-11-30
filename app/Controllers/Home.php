<?php

namespace App\Controllers;

use App\Models\HomeModel;
use App\Models\SliderModel;

class Home extends MyController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new HomeModel;
        $this->sliderModel = new SliderModel();
    }

    public function index()
    {
        $data = $this->data;
        $data['koleksi_terbaru'] = $this->model->getHomeBook();
        $data['berita'] = $this->model->getHomeArtikel('berita');
        $data['pengumuman'] = $this->model->getHomeArtikel('pengumuman');
        $data['agenda'] = $this->model->getHomeArtikel('agenda');
        $data['sliders'] = $this->sliderModel->findAll();
        $this->view('frontend', 'website/home', $data);
    }

    public function sejarah()
    {
        $data = $this->data;
        $data['title'] = 'Sejarah';
        $this->view('frontend', 'website/sejarah', $data);
    }

    public function visi_misi()
    {
        $data = $this->data;
        $data['title'] = 'Visi & Misi';
        $this->view('frontend', 'website/visi_misi', $data);
    }

    public function struktur_organisasi()
    {
        $data = $this->data;
        $data['title'] = 'Struktur Organisasi';
        $this->view('frontend', 'website/struktur_organisasi', $data);
    }

    public function bio_mahbub()
    {
        $data = $this->data;
        $data['title'] = 'Biografi';
        $this->view('frontend', 'website/bio_mahbub', $data);
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
        $data['title'] = 'Koleksi Buku';
        $data['koleksi_buku'] = $this->model->getHomeBook();
        $this->view('frontend', 'website/book', $data);
    }

    public function layanan($slug = null)
    {
        if ($slug) {
            $getLayananBySlug = $this->model->getHomeLayananBySlug($slug);
            if (!$getLayananBySlug) {
                $this->errorPageFrontend('Layanan tidak ditemukan');
                exit;
            }
            $this->data['layanan'] = $getLayananBySlug;
            $this->view('frontend', 'website/layanan/view', $this->data);
        } else {
            $data = $this->data;
            $data['title'] = 'Layanan';
            $data['layanan'] = $this->model->getHomeLayanan();
            $this->view('frontend', 'website/layanan/index', $data);
        }
    }

    public function jurnal_nasional()
    {
        $data = $this->data;
        $data['title'] = 'Jurnal Nasional';
        $data['jurnal'] = $this->model->getHomeJurnal('nasional');
        $this->view('frontend', 'website/jurnal', $data);
    }

    public function jurnal_internasional()
    {
        $data = $this->data;
        $data['title'] = 'Jurnal Internasional';
        $data['jurnal'] = $this->model->getHomeJurnal('internasional');
        $this->view('frontend', 'website/jurnal', $data);
    }
}
