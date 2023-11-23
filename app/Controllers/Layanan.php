<?php

namespace App\Controllers;

use App\Controllers\Admin\Artikel;
use App\Models\LayananModel;

class Layanan extends MyController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new LayananModel;
    }

    public function index($slug = null)
    {
        if ($slug) {
            $getLayananBySlug = $this->model->getLayananBySlug($slug);
            if (!$getLayananBySlug) {
                $this->errorPage('Layanan tidak ditemukan');
                exit;
            }
            $this->data['layanan'] = $getLayananBySlug;
            $this->view('frontend', 'website/layanan/view', $this->data);
        } else {
            $data = $this->data;
            $data['title'] = 'Layanan';
            $data['layanan'] = $this->model->getLayanan();
            $this->view('frontend', 'website/layanan/index', $data);
        }
    }
}
