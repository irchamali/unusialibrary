<?php

namespace App\Models;

class SettingAppLayoutModel extends \App\Models\MyModel
{
    public function getSettingAppLayoutDefault()
    {
        $data = $this->db->query('SELECT * FROM setting WHERE type="app" OR type="layout"')->getResultArray();
        return $data;
    }

    public function getSettingAppLayoutUser()
    {
        $data = $this->db->query('SELECT * FROM setting_user WHERE id_user = ? AND type="layout"', '2')->getRowArray();
        return $data;
    }

    public function saveSettingAppLayoutData()
    {
        $data_db[] = ['type' => 'backend-app', 'param' => 'judul_web', 'value' => $this->request->getPost('judul_web')];
        $data_db[] = ['type' => 'backend-app', 'param' => 'deskripsi_web', 'value' => $this->request->getPost('deskripsi_web')];
        $data_db[] = ['type' => 'backend-app', 'param' => 'footer_web', 'value' => $this->request->getPost('footer_web')];
        $data_db[] = ['type' => 'backend-app', 'param' => 'button', 'value' => button_theme($this->request->getPost('theme_skin'))];
        $data_db[] = ['type' => 'backend-layout', 'param' => 'font_family', 'value' => $this->request->getPost('font_family')];
        $data_db[] = ['type' => 'backend-layout', 'param' => 'font_size', 'value' => $this->request->getPost('font_size')];
        $data_db[] = ['type' => 'backend-layout', 'param' => 'theme_skin', 'value' => $this->request->getPost('theme_skin')];

        // if (key_exists('update_all', $_SESSION['user']['permission'])) {
        $this->db->transStart();
        $this->db->table('setting')->delete(['type' => 'backend-app']);
        $this->db->table('setting')->delete(['type' => 'backend-layout']);
        $this->db->table('setting')->insertBatch($data_db);
        $this->db->transComplete();
        $response = $this->db->transStatus();

        if ($response) {
            $file_name = ROOTPATH . 'public/bower_components/fonts/font-size-' . $this->request->getPost('font_size') . '.css';
            if (!file_exists($file_name)) {
                file_put_contents($file_name, 'html, body { font-size: ' . $this->request->getPost('font_size') . 'px }');
            }
        }
        // } else if (key_exists('update_own', $_SESSION['user']['permission'])) {
        //     $this->db->transStart();
        //     $this->db->table('setting_user')->delete(['id_user' => $_SESSION['user']['id_user'], 'type' => 'layout']);
        //     $result = $this->db->table('setting_user')->insert(
        //         [
        //             'id_user' => $_SESSION['user']['id_user'], 'param' => json_encode($arr), 'type' => 'layout'
        //         ]
        //     );
        //     $this->db->transComplete();
        //     $result = $this->db->transStatus();
        // }

        return $response;
    }
}
