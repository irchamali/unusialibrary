<?php

namespace App\Models;

class LayananModel extends \App\Models\MyModel
{
    public function getLayanan($id = null)
    {
        if ($id) {
            $layanan = $this->db->query('SELECT * FROM layanan WHERE layanan_id = ?', $id)->getRowArray();
        } else {
            $layanan = $this->db->query('SELECT * FROM layanan')->getResultArray();
        }
        return $layanan;
    }

    public function getLayananBySlug($slug)
    {
        return $this->db->query('SELECT * FROM layanan WHERE slug_layanan = ?', $slug)->getRowArray();
    }
}
