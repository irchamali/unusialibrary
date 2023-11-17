<?php

namespace App\Controllers;

use App\Models\SettingAppLayoutModel;

class Setting_app extends MyController
{
    public function __construct()
    {

        parent::__construct();
        $this->model = new SettingAppLayoutModel;
        $this->addScriptBackend(base_url('public/backend/dist/js/pages/') . 'Setting_app.js');
        helper(['cookie', 'form']);
    }

    public function index()
    {
        if (!empty($this->request->getPost('submit'))) {

            // if (
            //     $this->hasPermission('update_all')
            //     || $this->hasPermission('update_own')
            // ) {

            if ($this->model->saveSettingAppLayoutData()) {
                echo json_encode(['status' => true, 'message' => 'Data berhasil diubah']);
            } else {
                echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
            }
            // } else {
            //      echo json_encode(['status' => false, 'message' => 'Role anda tidak diperbolehkan melakukan perubahan']);
            // }

            die;
        }

        $data = $this->data;

        $setting_user = $this->model->getSettingAppLayoutUser();
        if (!$setting_user) {
            $user_param = json_decode($setting_user['param'], true);
            $data = array_merge($data, $user_param);
        } else {
            $query = $this->model->getSettingAppLayoutDefault();

            foreach ($query as $val) {
                $data[$val['param']] = $val['value'];
            }
        }

        $this->view('backend', 'Setting_app/index', $data);
    }

    public function ajaxSwicthSkin()
    {
        $button['value'] = $this->request->getPost('button');
        $theme_skin['value'] = $this->request->getPost('theme_skin');

        $result = $this->model->updateData('setting', $button, 'param', 'button');
        $result = $this->model->updateData('setting', $theme_skin, 'param', 'theme_skin');

        if ($result) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil diubah']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }
}
