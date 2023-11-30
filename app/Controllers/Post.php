<?php

namespace App\Controllers;

use App\Models\PostModel;

class Post extends MyController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new PostModel;
    }

    public function index($slug = null)
    {
        $this->data['artikel_category'] = $this->model->getArtikelCategory()->getResultArray();
        if ($slug) {
            $this->data['artikel'] = $this->model->getArtikel($slug);
            $this->data['image'] = base_url('public/images/artikel/') . $this->data['artikel']['image_artikel'];
            $this->data['setting']['meta_deskripsi'] = $this->data['artikel']['meta_deskripsi'];
            $this->data['setting']['meta_keyword'] = $this->data['artikel']['meta_keyword'];
            if (!$this->data['artikel']) {
                $this->errorPageFrontend('Data tidak ditemukan');
                exit;
            }
            $this->view('frontend', 'website/post/view', $this->data);
        } else {
            $this->data['title'] = 'Berita';
            $this->data['artikel'] = $this->model->getArtikel()->getResultArray();
            $this->view('frontend', 'website/post/index', $this->data);
        }
    }

    public function category($slug = null)
    {
        if ($slug) {
            $this->data['category'] = $this->model->getArtikelCategory($slug);
            if (!$this->data['category']) {
                $this->errorPageFrontend('Data tidak ditemukan');
                exit;
            }
            $this->view('frontend', 'website/post/category', $this->data);
        } else {
            $this->errorPageFrontend('Data tidak ditemukan');
            exit;
        }
    }

    public function tags($slug = null)
    {
        if ($slug) {
            $this->data['tags'] = $this->model->getArtikelTags($slug);
            // dd($this->data['tags']);
            if (!$this->data['tags']) {
                $this->errorPageFrontend('Data tidak ditemukan');
                exit;
            }
            $this->view('frontend', 'website/post/tags', $this->data);
        } else {
            $this->errorPageFrontend('Data tidak ditemukan');
            exit;
        }
    }
}
