<?php

namespace App\Models;

class SettingModel extends \App\Models\MyModel
{
    public function getSettingApp()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="app"')->getRowArray();
    }

    public function getSettingLayout()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="layout"')->getRowArray();
    }

    public function getSettingProfile()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="profile"')->getRowArray();
    }

    public function getSettingMediaSosial()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="media_sosial"')->getRowArray();
    }

    public function getSettingLibrary()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="library"')->getRowArray();
    }



    public function saveSettingApp()
    {
        $fields = [
            'title' => 'Title',
            'description' => 'Description',
            'keyword' => 'Keyword',
            // 'image' => 'Image',
            // 'shortcut_icon' => 'Shortcut Icon',
            'footer' => 'Footer'
        ];

        foreach ($fields as $field => $title) {
            $arr[$field] = $_POST[$field];
        }

        $this->db->transStart();
        $this->db->table('settings')->delete(['type' => 'app']);
        $this->db->table('settings')->insert(
            ['type' => 'app', 'param' => json_encode($arr)]
        );
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function saveSettingLayout()
    {
        $fields = [
            'font_family' => 'Font Family',
            'font_size' => 'Font Size',
            'theme' => 'Theme',
            'button' => 'Button'
        ];

        foreach ($fields as $field => $title) {
            $arr[$field] = $_POST[$field];
        }

        $this->db->transStart();
        $this->db->table('settings')->delete(['type' => 'layout']);
        $this->db->table('settings')->insert(
            ['type' => 'layout', 'param' => json_encode($arr)]
        );
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function saveSettingLibrary()
    {
        $fields = [
            'perpustakaan_digital_unusia' => 'Perpustakaan Digital Unusia',
            'perpustakaan_univ_nu_indonesia' => 'Perpustakaan Univ NU Indonesia',
            'perpustakaan_unusia' => 'Perpustakaan Unusia',
            'peminjaman_buku' => 'Peminjaman Buku'
        ];

        foreach ($fields as $field => $title) {
            $arr[$field] = $_POST[$field];
        }

        $this->db->transStart();
        $this->db->table('settings')->delete(['type' => 'library']);
        $this->db->table('settings')->insert(
            ['type' => 'library', 'param' => json_encode($arr)]
        );
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function saveSettingMediaSosial()
    {
        $fields = [
            'email' => 'Email',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'whatsapp' => 'WhatsApp'
        ];

        foreach ($fields as $field => $title) {
            $arr[$field] = $_POST[$field];
        }

        $this->db->transStart();
        $this->db->table('settings')->delete(['type' => 'media_sosial']);
        $this->db->table('settings')->insert(
            ['type' => 'media_sosial', 'param' => json_encode($arr)]
        );
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function saveSettingProfile()
    {
        $fields = [
            'sejarah' => 'Sejarah',
            'visi_misi' => 'Visi Misi',
            'struktur_organisasi' => 'Struktur Organisasi',
            'alamat' => 'Alamat',
            'phone' => 'Phone',
            'jam_operasional' => 'Jam Operasional',
            'website_resmi' => 'Website Resmi',
        ];

        foreach ($fields as $field => $title) {
            $arr[$field] = $_POST[$field];
        }

        $this->db->transStart();
        $this->db->table('settings')->delete(['type' => 'profile']);
        $this->db->table('settings')->insert(
            ['type' => 'profile', 'param' => json_encode($arr)]
        );
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function getSliderById($slider_id)
    {
        return $this->db->query('SELECT * FROM slider WHERE slider_id = ?', [$slider_id])->getRowArray();
    }

    public function saveDataSlider()
    {
        $method = $this->request->getPost('method');
        $fields = ['title', 'sub_title', 'url'];

        foreach ($fields as $field) {
            $data_db[$field] = $this->request->getPost($field);
        }

        $this->db->transStart();

        if (!empty($this->request->getPost('id'))) {
            $slider_id = $this->request->getPost('id');
            $this->db->table('slider')->update($data_db, ['slider_id' => $slider_id]);
        } else {
            $this->db->table('slider')->insert($data_db);
            $slider_id = $this->db->insertID();
        }

        $this->db->transComplete();
        $result = $this->db->transStatus();
        if ($result) {

            $file = $this->request->getFile('image');
            $path = ROOTPATH . 'public/images/slider/';

            $img_db = $this->db->query('SELECT image FROM slider WHERE slider_id = ?', $slider_id)->getRowArray();
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
            $save = $this->db->table('slider')->update($data_db, ['slider_id' => $slider_id]);
        }

        if ($save) {
            $response = ['status' => true, 'message' => 'Data berhasil di' . $method, 'slider_id' => $slider_id];
        } else {
            $response = ['status' => false, 'message' => 'Data gagal disimpan'];
        }

        return $response;
    }

    public function deleteDataSlider()
    {
        $slider = $this->db->query('SELECT * FROM slider WHERE slider_id = ?', $this->request->getPost('id'))->getRowArray();
        if (!$slider) {
            return false;
        }

        $this->db->transStart();
        $this->db->table('slider')->delete(['slider_id' => $this->request->getPost('id')]);
        $this->db->affectedRows();
        $this->db->transComplete();
        $response = $this->db->transStatus();

        if ($response) {
            if ($slider['image'] != NULL) {
                delete_file(ROOTPATH . 'public/images/slider/' . $slider['image']);
            }
        } else {
            return false;
        }

        return true;
    }
}
