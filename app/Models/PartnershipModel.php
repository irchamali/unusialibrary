<?php

namespace App\Models;

use CodeIgniter\Model;

class PartnershipModel extends \App\Models\MyModel
{
    protected $table         = 'partnership';
    protected $primaryKey    = 'id';
    protected $allowedFields = ['logo', 'nama','link'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPartnershipById($id)
    {
        return $this->db->query('SELECT * FROM partnership WHERE id = ?', [$id])->getRowArray();
    }

    public function saveDataPartnership()
    {
        $method = $this->request->getPost('method');
        $fields = ['nama', 'link'];

        foreach ($fields as $field) {
            $data_db[$field] = $this->request->getPost($field);
        }

        $this->db->transStart();

        if (!empty($this->request->getPost('id'))) {
            $id = $this->request->getPost('id');
            $this->db->table('partnership')->update($data_db, ['id' => $id]);
        } else {
            $this->db->table('partnership')->insert($data_db);
            $id = $this->db->insertID();
        }

        $this->db->transComplete();
        $result = $this->db->transStatus();
        if ($result) {

            $file = $this->request->getFile('image');
            $path = ROOTPATH . 'public/images/partnership/';

            $img_db = $this->db->query('SELECT logo FROM partnership WHERE id = ?', $id)->getRowArray();
            $new_name = $img_db['logo'];

            if (!empty($_POST['image_remove'])) {
                if ($img_db['logo'] != NULL) {
                    $del = delete_file($path . $img_db['logo']);
                    $new_name = NULL;
                    if (!$del) {
                        $response = ['status' => false, 'message' => 'Gagal menghapus gambar lama'];
                    }
                }
            }

            if ($file && $file->getName()) {
                //old file
                if ($img_db['logo']) {
                    if (file_exists($path . $img_db['logo'])) {
                        $unlink = delete_file($path . $img_db['logo']);
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
            $data_db['logo'] = $new_name;
            $save = $this->db->table('partnership')->update($data_db, ['id' => $id]);
        }

        if ($save) {
            $response = ['status' => true, 'message' => 'Data berhasil di' . $method, 'id' => $id];
        } else {
            $response = ['status' => false, 'message' => 'Data gagal disimpan'];
        }

        return $response;
    }

    public function deleteDataPartnership()
    {
        $partnership = $this->db->query('SELECT * FROM partnership WHERE id = ?', $this->request->getPost('id'))->getRowArray();
        if (!$partnership) {
            return false;
        }

        $this->db->transStart();
        $this->db->table('partnership')->delete(['id' => $this->request->getPost('id')]);
        $this->db->affectedRows();
        $this->db->transComplete();
        $response = $this->db->transStatus();

        if ($response) {
            if ($partnership['logo'] != NULL) {
                delete_file(ROOTPATH . 'public/images/partnership/' . $partnership['logo']);
            }
        } else {
            return false;
        }

        return true;
    }
}
