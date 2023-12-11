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
        $data['title'] = 'Koleksi Buku Digital';
        $this->view('frontend', 'website/book', $data);
    }

    public function book_fetch()
    {
        $output = '';
        $buku = $this->model->getHomeBook();
        if ($buku == null) {
            $output = '<div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0">Koleksi buku sedang tidak tersedia</span></div>';
        } else {
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

    public function book_print()
    {
        $data = $this->data;
        $data['title'] = 'Halaman Buku Cetak';
        $this->view('frontend', 'website/book_print', $data);
    }

    public function book_print_subject_popular()
    {
        $output = '';
        $subject = $this->model->getHomeSubjectPopular();
        if ($subject == null) {
            $output = '<div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0">Subject yang menarik sedang tidak tersedia</span></div>';
        } else {
            foreach ($subject as $key => $value) {
                $output .= '<a class="btn btn-warning rounded-pill me-3 mt-1" href="https://opac.unusia.ac.id/" target="_blank">' . $value . '</a>';
            }
        }

        echo json_encode($output);
        exit();
    }

    public function book_print_subject_latest()
    {
        $output = '';
        $subject = $this->model->getHomeSubjectLatest();
        if ($subject == null) {
            $output = '<div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0">Subject yang menarik sedang tidak tersedia</span></div>';
        } else {
            foreach ($subject as $key => $value) {
                $output .= '<a class="btn btn-warning rounded-pill me-3 mt-1" href="https://opac.unusia.ac.id/" target="_blank">' . $value . '</a>';
            }
        }

        echo json_encode($output);
        exit();
    }

    public function book_print_biblio_popular()
    {
        $output = '';
        $buku = $this->model->getHomeBiblioPopular();
        if ($buku == null) {
            $output = '<div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0">Koleksi buku sedang tidak tersedia</span></div>';
        } else {
            foreach ($buku as $key => $value) {
                $subURL = 'https://opac.unusia.ac.id/' . substr($value['image'], 2);
                $output .= '<div class="col-md-4 col-lg-3 card-book">
                                <div class="card">
                                    <a href="https://opac.unusia.ac.id/index.php?p=show_detail&id=' . $value['biblio_id'] . '" target="_blank">
                                        <img class="card-img-top" src="' . $subURL . '" alt="' . $value['title'] . '" />
                                    </a>
                                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                        <div class="overflow-hidden">
                                            <a href="https://opac.unusia.ac.id/index.php?p=show_detail&id=' . $value['biblio_id'] . '" target="_blank">
                                                <h6 data-zanim-xs="{"delay":0}">' . $value['title'] . '</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
        }

        echo json_encode($output);
        exit();
    }

    public function book_print_biblio_latest()
    {
        $output = '';
        $buku = $this->model->getHomeBiblioLatest();
        if ($buku == null) {
            $output = '<div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0">Koleksi buku sedang tidak tersedia</span></div>';
        } else {
            foreach ($buku as $key => $value) {
                $subURL = 'https://opac.unusia.ac.id/' . substr($value['image'], 2);
                $output .= '<div class="col-md-4 col-lg-3 card-book">
                                <div class="card">
                                    <a href="https://opac.unusia.ac.id/index.php?p=show_detail&id=' . $value['biblio_id'] . '" target="_blank">
                                        <img class="card-img-top" src="' . $subURL . '" alt="' . $value['title'] . '" />
                                    </a>
                                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                        <div class="overflow-hidden">
                                            <a href="https://opac.unusia.ac.id/index.php?p=show_detail&id=' . $value['biblio_id'] . '" target="_blank">
                                                <h6 data-zanim-xs="{"delay":0}">' . $value['title'] . '</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
            }
        }

        echo json_encode($output);
        exit();
    }

    public function ajaxGetKoleksiTerbaru()
    {
        $output = '';
        $buku = $this->model->getHomeBook();
        if ($buku == null) {
            $output = '<div class="col-md-12 rounded-3 py-4 text-center bg-warning"><span class="text-uppercase mb-0">Koleksi terbaru sedang tidak tersedia</span></div>';
        } else {
            $index = 0;
            foreach ($buku as $key => $value) {
                if ($index == 4) {
                    break;
                }
                $output .= '<div class="col-md-4 col-lg-3 card-book">
                                <div class="card">
                                    <a href="' . $value['book_url'] . '" target="_blank">
                                        <img class="card-img-top" src="' . $value['book_cover'] . '" alt="' . $value['book_title'] . '" />
                                    </a>
                                    <div class="card-body" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                                        <div class="overflow-hidden">
                                            <a href="' . $value['book_url'] . '" target="_blank">
                                                <h6 style="font-size:1rem;" data-zanim-xs="{"delay":0}">' . $value['book_title'] . '</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                $index++;
            }

            $output .= '<div class="row">
                            <div class="col-auto mx-auto mt-4">
                                <a href="" class="btn btn-warning">
                                    <span class="text-primary fw-semi-bold">
                                        Lihat Semua <i class="fas fa-arrow-right"></i>
                                    </span>
                                </a>
                            </div>
                        </div>';
        }

        echo json_encode($output);
        exit();
    }
}
