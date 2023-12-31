<?php

namespace App\Models;

class HomeModel extends \App\Models\MyModel
{
    // BOOK
    public function getHomeBook()
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

    public function getHomeBookPage($page)
    {
        $curl = service('curlrequest');

        $response = $curl->request("POST", "https://unusia.perpustakaan.co.id/view/ajax", [
            "headers" => [
                "Accept" => "application/json, text/javascript, */*; q=0.01"
            ],
            "form_params" => [
                "action" => "get_collectionbook2",
                "page" => $page
            ]
        ]);

        $result = [];
        if (200 == $response->getStatusCode()) {
            $result = json_decode($response->getBody(), true)['data'] ?? null;
        }

        return $result;
    }

    // ARTIKEL
    public function getHomeArtikel($slug = null)
    {
        return $this->db->query('SELECT *,a.image as image_artikel, a.created_at as tanggal_terbit, b.nama as nama_pembuat FROM artikel a 
        LEFT JOIN user b ON b.user_id = a.user_id
        LEFT JOIN artikel_category c ON c.artikel_category_id = a.artikel_category_id WHERE c.slug_kategori = ? ORDER BY a.created_at DESC', [$slug])->getResultArray();
    }


    // LAYANAN
    public function getHomeLayanan($id = null)
    {
        if ($id) {
            $layanan = $this->db->query('SELECT * FROM layanan WHERE layanan_id = ?', $id)->getRowArray();
        } else {
            $layanan = $this->db->query('SELECT * FROM layanan')->getResultArray();
        }
        return $layanan;
    }

    public function getHomeLayananBySlug($slug)
    {
        return $this->db->query('SELECT * FROM layanan WHERE slug_layanan = ?', $slug)->getRowArray();
    }

    // ARTIKEL
    public function getHomeJurnal($kategori = null)
    {
        return $this->db->query('SELECT * FROM jurnal j 
        LEFT JOIN fakultas f ON f.fakultas_id = j.fakultas_id WHERE j.kategori = ?', [$kategori])->getResultArray();
    }

    // SLIDER
    public function getHomeSlider()
    {
        return $this->db->query('SELECT * FROM slider')->getResultArray();
    }

    // TESTIMONI
    public function getHomeTestimoni()
    {
        return $this->db->query('SELECT * FROM testimoni')->getResultArray();
    }

    // PARTNERSHIP
    public function getHomePartnership()
    {
        return $this->db->query('SELECT * FROM partnership')->getResultArray();
    }


    // SUBJECT POPULAR
    public function getHomeSubjectPopular()
    {
        $curl = service('curlrequest');

        $response = $curl->request("GET", "https://opac.unusia.ac.id/index.php", [
            "query" => [
                "p" => "api/subject/popular"
            ]
        ]);

        $result = [];
        if (200 == $response->getStatusCode()) {
            $result = json_decode($response->getBody(), true) ?? null;
        }

        return $result;
    }

    // SUBJECT LASTEST
    public function getHomeSubjectLatest()
    {
        $curl = service('curlrequest');

        $response = $curl->request("GET", "https://opac.unusia.ac.id/index.php", [
            "query" => [
                "p" => "api/subject/latest"
            ]
        ]);

        $result = [];
        if (200 == $response->getStatusCode()) {
            $result = json_decode($response->getBody(), true) ?? null;
        }

        return $result;
    }

    // BIBLIO POPULAR
    public function getHomeBiblioPopular()
    {
        $curl = service('curlrequest');

        $response = $curl->request("GET", "https://opac.unusia.ac.id/index.php", [
            "query" => [
                "p" => "api/biblio/popular"
            ]
        ]);

        $result = [];
        if (200 == $response->getStatusCode()) {
            $result = json_decode($response->getBody(), true) ?? null;
        }

        return $result;
    }

    // BIBLIO LASTEST
    public function getHomeBiblioLatest()
    {
        $curl = service('curlrequest');

        $response = $curl->request("GET", "https://opac.unusia.ac.id/index.php", [
            "query" => [
                "p" => "api/biblio/latest"
            ]
        ]);

        $result = [];
        if (200 == $response->getStatusCode()) {
            $result = json_decode($response->getBody(), true) ?? null;
        }

        return $result;
    }
}
