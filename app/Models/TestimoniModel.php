<?php

namespace App\Models;

class TestimoniModel extends \App\Models\MyModel
{
    public function getTestimoniById($id)
    {
        return $this->db->query('SELECT * FROM testimoni WHERE id = ?', [$id])->getRowArray();
    }

    public function saveDataTestimoni()
    {
        $method = $this->request->getPost('method');
        $fields = ['nama', 'title', 'deskripsi'];

        foreach ($fields as $field) {
            $data_db[$field] = $this->request->getPost($field);
        }

        $this->db->transStart();

        if (!empty($this->request->getPost('id'))) {
            $id = $this->request->getPost('id');
            $this->db->table('testimoni')->update($data_db, ['id' => $id]);
        } else {
            $this->db->table('testimoni')->insert($data_db);
            $id = $this->db->insertID();
        }

        $this->db->transComplete();
        $result = $this->db->transStatus();
        if ($result) {

            $file = $this->request->getFile('image');
            $path = ROOTPATH . 'public/images/testimoni/';

            $img_db = $this->db->query('SELECT image FROM testimoni WHERE id = ?', $id)->getRowArray();
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
            $save = $this->db->table('testimoni')->update($data_db, ['id' => $id]);
        }

        if ($save) {
            $response = ['status' => true, 'message' => 'Data berhasil di' . $method, 'id' => $id];
        } else {
            $response = ['status' => false, 'message' => 'Data gagal disimpan'];
        }

        return $response;
    }

    public function deleteDataTestimoni()
    {
        $testimoni = $this->db->query('SELECT * FROM testimoni WHERE id = ?', $this->request->getPost('id'))->getRowArray();
        if (!$testimoni) {
            return false;
        }

        $this->db->transStart();
        $this->db->table('testimoni')->delete(['id' => $this->request->getPost('id')]);
        $this->db->affectedRows();
        $this->db->transComplete();
        $response = $this->db->transStatus();

        if ($response) {
            if ($testimoni['image'] != NULL) {
                delete_file(ROOTPATH . 'public/images/testimoni/' . $testimoni['image']);
            }
        } else {
            return false;
        }

        return true;
    }
}
