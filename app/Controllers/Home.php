<?php

namespace App\Controllers;

use App\Models\HomeModel;

class Home extends MyController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new HomeModel;
    }

    public function index()
    {
        $data = $this->data;
        $data['koleksi_terbaru'] = $this->model->getHomeBook();
        $data['berita'] = $this->model->getHomeArtikel('berita');
        $data['pengumuman'] = $this->model->getHomeArtikel('pengumuman');
        $data['agenda'] = $this->model->getHomeArtikel('agenda');
        $data['slider'] = $this->model->getHomeSlider();
        $data['partnership'] = $this->model->getHomePartnership();
        $data['testimoni'] = $this->model->getHomeTestimoni();
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
        $this->view('frontend', 'website/book', $data);
    }

    public function book_fetch()
    {
        $output = '';
        $buku = $this->model->getHomeBook();
        foreach ($buku as $key => $value) {
            $output .= '<div class="col-md-4 col-lg-3 card-book">
                            <div class="card">
                                <a href="' . $value['book_url'] . '" target="_blank">
                                    <img class="card-img-top" src="' . $value['book_cover'] . '" alt="' . $value['book_title'] . '" />
                                </a>
                                <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                    <div class="overflow-hidden">
                                        <a href="' . $value['book_url'] . '" target="_blank">
                                            <h5 data-zanim-xs="{"delay":0}">' . $value['book_title'] . '</h5>
                                        </a>
                                    </div>
                                    <div class="overflow-hidden">
                                        <h6 class="text-500" data-zanim-xs="{"delay":0.1}>' . $value['penulis'] . '</h6>
                                    </div>
                                </div>
                            </div>
                        </div>';
        }
        echo json_encode($output);
        exit();
    }

    public function layanan($slug = null)
    {
        $data = $this->data;
        if ($slug) {
            $getLayananBySlug = $this->model->getHomeLayananBySlug($slug);
            $data['title'] = $getLayananBySlug['nama_layanan'];
            if (!$getLayananBySlug) {
                $this->errorPageFrontend('Layanan tidak ditemukan');
                exit;
            }
            $data['layanan'] = $getLayananBySlug;
            $this->view('frontend', 'website/layanan/view', $data);
        } else {
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
