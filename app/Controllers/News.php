<?php

namespace App\Controllers;

use App\Controllers\Admin\Artikel;
use App\Models\ArtikelModel;

class News extends MyController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($slug = null)
    {
        $this->model = new ArtikelModel;
        if ($slug) {
            $getArtikelBySlug = $this->model->getArtikelBySlug($slug);
            if (!$getArtikelBySlug) {
                $this->errorPage('Berita tidak ditemukan');
                exit;
            }
            $this->data['berita'] = $getArtikelBySlug;
            $this->view('frontend', 'website/news/view', $this->data);
        } else {
            $data = $this->data;
            $data['title'] = 'Berita';
            $data['berita'] = $this->model->getArtikel('Berita');
            $this->view('frontend', 'website/news/index', $data);
        }
    }
}
