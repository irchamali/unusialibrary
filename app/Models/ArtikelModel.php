<?php

namespace App\Models;

class ArtikelModel extends \App\Models\MyModel
{
    protected $table = 'artikel';
    protected $primaryKey = 'artikel_id';

    public function getArtikelTagById($id)
    {
        return $this->db->query('SELECT * FROM artikel_tag WHERE artikel_tag_id = ?', $id)->getRowArray();
    }

    public function getArtikelCategoryById($id)
    {
        return $this->db->query('SELECT * FROM artikel_category WHERE artikel_category_id = ?', $id)->getRowArray();
    }

    public function getArtikelById($artikel_id = null, $array = false)
    {

        $query = $this->db->query('SELECT * FROM artikel WHERE artikel_id = ?', [$artikel_id]);
        $artikel = $query->getRowArray();

        if (!$artikel)
            return;

        $artikel['tag'] = [];
        $query = $this->db->query(
            'SELECT * FROM artikel_list_tag 
                LEFT JOIN artikel_tag USING(artikel_tag_id) 
                WHERE artikel_id = ? 
                ORDER BY  nama_tag',
            [$artikel_id]
        );

        $result = $query->getResultArray();
        if ($result) {
            foreach ($result as $val) {
                $artikel['tag'][$val['artikel_tag_id']] = $val;
            }
        }
        return $artikel;
    }

    public function getCategoryByArtikel()
    {
        return $this->db->query('SELECT * FROM artikel_category')->getResultArray();
    }

    public function getTagByArtikel()
    {
        return $this->db->query('SELECT * FROM artikel_tag')->getResultArray();
    }

    public function getArtikel($nama_kategori)
    {
        return $this->db->query("SELECT a.artikel_id, a.judul_artikel, a.slug_artikel, a.image as image_artikel, a.isi_artikel, u.nama as nama_pembuat,
        u.image as image_pembuat, ac.nama_kategori FROM artikel a 
        LEFT JOIN user u ON u.user_id = a.user_id 
        LEFT JOIN artikel_category ac ON ac.artikel_category_id = a.artikel_category_id 
        WHERE ac.nama_kategori = ? AND a.status = 'published'
        ORDER BY a.created_at DESC", [$nama_kategori])->getResultArray();
    }

    public function getArtikelByTag()
    {
        return $this->db->query("SELECT alt.artikel_tag_id,a_t.nama_tag,a_t.slug_tag, a.*, a.image as image_artikel,u.nama as nama_pembuat,u.image as image_pembuat FROM artikel_list_tag alt
        LEFT JOIN artikel_tag a_t ON a_t.artikel_tag_id = alt.artikel_tag_id
        LEFT JOIN artikel a ON a.artikel_id = alt.artikel_id 
        LEFT JOIN user u ON u.user_id = a.user_id
        ORDER BY a.created_at DESC")->getResultArray();
    }

    // public function getPengumuman()
    // {
    //     return $this->db->query('SELECT * FROM artikel 
    //     LEFT JOIN user ON user.user_id = artikel.user_id 
    //     LEFT JOIN artikel_category ON artikel_category.artikel_category_id = artikel.artikel_category_id 
    //     WHERE artikel_category.nama_kategori = "Pengumuman" AND status = "published"
    //     ORDER BY artikel.created_at')->getResultArray();
    // }

    // public function getAgenda()
    // {
    //     return $this->db->query('SELECT * FROM artikel 
    //     LEFT JOIN user ON user.user_id = artikel.user_id 
    //     LEFT JOIN artikel_category ON artikel_category.artikel_category_id = artikel.artikel_category_id 
    //     WHERE artikel_category.nama_kategori = "Agenda" AND status = "published"
    //     ORDER BY artikel.created_at')->getResultArray();
    // }

    public function saveDataArtikel()
    {
        $method = $this->request->getPost('method');
        $fields = ['judul_artikel', 'isi_artikel', 'meta_deskripsi', 'meta_keyword', 'artikel_category_id', 'status'];

        $data_db['slug_artikel'] = url_title($_POST['judul_artikel'], '-', true);
        $data_db['user_id'] = $this->session->get('user')['user_id'];

        foreach ($fields as $field) {
            $data_db[$field] = $this->request->getPost($field);
        }

        $this->db->transStart();

        if (!empty($this->request->getPost('id'))) {
            $data_db['updated_at'] = date('Y-m-d H:i:s');
            $artikel_id = $this->request->getPost('id');
            $this->db->table('artikel')->update($data_db, ['artikel_id' => $artikel_id]);
        } else {
            $data_db['created_at'] = date('Y-m-d H:i:s');
            $this->db->table('artikel')->insert($data_db);
            $artikel_id = $this->db->insertID();
        }

        if (!empty($_POST['artikel_tag_id'])) {
            $data_db = [];
            foreach ($_POST['artikel_tag_id'] as $artikel_tag_id) {
                $data_db[] = ['artikel_id' => $artikel_id, 'artikel_tag_id' => $artikel_tag_id];
            }

            $this->db->table('artikel_list_tag')->delete(['artikel_id' => $artikel_id]);
            $this->db->table('artikel_list_tag')->insertBatch($data_db);
        }

        $this->db->transComplete();
        $result = $this->db->transStatus();
        if ($result) {

            $file = $this->request->getFile('image');
            $path = ROOTPATH . 'public/images/artikel/';

            $img_db = $this->db->query('SELECT image FROM artikel WHERE artikel_id = ?', $artikel_id)->getRowArray();
            $new_name = $img_db['image'];

            if (!empty($_POST['image_remove'])) {
                if ($img_db['image'] != NULL) {
                    $del = delete_file($path . $img_db['image']);
                    $new_name = NULL;
                    if (!$del) {
                        $response = ['status' => false, 'message' => 'Gagal menghapus gambar lama'];
                    }
                }
            }

            if ($file && $file->getName()) {
                //old file
                if ($img_db['image']) {
                    if (file_exists($path . $img_db['image'])) {
                        $unlink = delete_file($path . $img_db['image']);
                        if (!$unlink) {
                            $response = ['status' => false, 'message' => 'Gagal menghapus gambar lama'];
                        }
                    }
                }

                $new_name =  get_filename($file->getName(), $path);
                $file->move($path, $new_name);

                if (!$file->hasMoved()) {
                    $response = ['status' => false, 'message' => 'Error saat memperoses gambar'];
                    return $response;
                }
            }

            // Update image
            $data_db = [];
            $data_db['image'] = $new_name;
            $save = $this->db->table('artikel')->update($data_db, ['artikel_id' => $artikel_id]);
        }

        if ($save) {
            $response = ['status' => true, 'message' => 'Data berhasil di' . $method, 'artikel_id' => $artikel_id];
        } else {
            $response = ['status' => false, 'message' => 'Terjadi kesalahan'];
        }

        return $response;
    }

    public function deleteDataArtikel()
    {
        $artikel = $this->db->query('SELECT * FROM artikel WHERE artikel_id = ?', $this->request->getPost('id'))->getRowArray();
        if (!$artikel) {
            return false;
        }

        $this->db->transStart();
        $this->db->table('artikel')->delete(['artikel_id' => $this->request->getPost('id')]);
        $this->db->table('artikel_list_tag')->delete(['artikel_id' => $this->request->getPost('id')]);
        $this->db->affectedRows();
        $this->db->transComplete();
        $response = $this->db->transStatus();

        if ($response) {
            if ($artikel['image'] != NULL) {
                delete_file(ROOTPATH . 'public/images/artikel/' . $artikel['image']);
            }
        } else {
            return false;
        }

        return true;
    }


    public function getArtikelBySlug($slug_artikel = null, $array = false)
    {

        $query = $this->db->query('SELECT artikel.*,user.nama as nama_pembuat, user.image as image_pembuat,artikel_category.nama_kategori FROM artikel LEFT JOIN user ON user.user_id = artikel.user_id 
        LEFT JOIN artikel_category ON artikel_category.artikel_category_id = artikel.artikel_category_id WHERE artikel.slug_artikel = ?', [$slug_artikel]);
        $artikel = $query->getRowArray();

        if (!$artikel)
            return;

        $artikel['tag'] = [];
        $query = $this->db->query(
            'SELECT * FROM artikel_list_tag 
                LEFT JOIN artikel_tag USING(artikel_tag_id) 
                WHERE artikel_id = ? 
                ORDER BY  nama_tag',
            [$artikel['artikel_id']]
        );

        $result = $query->getResultArray();
        if ($result) {
            foreach ($result as $val) {
                $artikel['tag'][$val['artikel_tag_id']] = $val;
            }
        }
        return $artikel;
    }

    // public function getArtikelByLoad($nama_kategori, $artikel_id)
    // {
    //     return $this->db->query("SELECT a.artikel_id, a.judul_artikel, a.slug_artikel, a.image as image_artikel, a.isi_artikel, u.nama as nama_pembuat,
    //     u.image as image_pembuat, ac.nama_kategori FROM artikel a 
    //     LEFT JOIN user u ON u.user_id = a.user_id 
    //     LEFT JOIN artikel_category ac ON ac.artikel_category_id = a.artikel_category_id 
    //     WHERE ac.nama_kategori = '$nama_kategori' AND a.status = 'published' AND a.artikel_id > '$artikel_id' LIMIT 2")->getResultArray();
    // }

    // public function paginateArtikel(int $page)
    // {
    //     return $this->select('*')->join('user', 'artikel.user_id = user.user_id')->paginate($page);
    // }
}
