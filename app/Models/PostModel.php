<?php

namespace App\Models;

class PostModel extends \App\Models\MyModel
{
    public function getArtikel($slug = null)
    {
        if ($slug != NULL) {
            $response = $this->db->query('SELECT *,a.image as image_artikel FROM artikel a 
            LEFT JOIN artikel_category b ON b.artikel_category_id = a.artikel_category_id
            LEFT JOIN user c ON c.user_id = a.user_id
            WHERE a.slug_artikel = ? ORDER BY a.created_at', [$slug])->getRowArray();
            if (!$response)
                return;
            $response['tag'] = [];
            $result = $this->db->query('SELECT * FROM artikel_list_tag LEFT JOIN artikel_tag USING(artikel_tag_id) WHERE artikel_id = ?', [$response['artikel_id']])->getResultArray();
            if ($result) {
                foreach ($result as $val) {
                    $response['tag'][$val['artikel_tag_id']] = $val;
                }
            }
            return $response;
        } else {
            return $this->db->query('SELECT *,a.image as image_artikel FROM artikel a LEFT JOIN user c ON c.user_id = a.user_id ORDER BY a.created_at');
        }
    }

    public function getArtikelCategory($slug = null)
    {
        if ($slug != NULL) {
            $response = $this->db->query('SELECT ac.artikel_category_id,ac.nama_kategori,ac.slug_kategori FROM artikel_category ac WHERE ac.slug_kategori = ?', [$slug])->getRowArray();
            if (!$response)
                return;
            $response['artikel'] = [];
            $result = $this->db->query('SELECT *,a.image as image_artikel FROM artikel a LEFT JOIN user c ON c.user_id = a.user_id WHERE a.artikel_category_id = ?', [$response['artikel_category_id']])->getResultArray();
            if ($result) {
                foreach ($result as $val) {
                    $response['artikel'][$val['artikel_id']] = $val;
                }
            }
            return $response;
        } else {
            return $this->db->query('SELECT * FROM artikel_category');
        }
    }

    public function getArtikelTags($slug = null)
    {
        if ($slug != NULL) {
            $response = $this->db->query('SELECT * FROM artikel_tag WHERE artikel_tag.slug_tag = ?', [$slug])->getRowArray();
            if (!$response)
                return;
            $response['artikel'] = [];
            $result = $this->db->query('SELECT *,a.image as image_artikel, alt.artikel_tag_id FROM artikel a LEFT JOIN artikel_list_tag alt ON alt.artikel_id = a.artikel_id LEFT JOIN user c ON c.user_id = a.user_id WHERE alt.artikel_tag_id = ?', [$response['artikel_tag_id']])->getResultArray();
            if ($result) {
                foreach ($result as $val) {
                    $response['artikel'][$val['artikel_id']] = $val;
                }
            }
            return $response;
        } else {
            return $this->db->query('SELECT * FROM artikel_tag');
        }
    }
}
