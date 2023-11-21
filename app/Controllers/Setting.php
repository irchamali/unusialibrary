<?php

namespace App\Controllers;

use App\Models\SettingModel;

class Setting extends MyController
{
    public function __construct()
    {

        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new SettingModel;
        $this->addStyle(base_url('public/plugins/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyle(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.css');
        $this->addScript(base_url('public/plugins/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScript(base_url('public/plugins/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScript(base_url('public/plugins/bootbox/') . 'bootbox.min.js');
        $this->addScript(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScript(base_url('public/plugins/ckeditor/') . 'ckeditor.js');
    }

    public function index()
    {
        // echo "<pre>";
        // print_r($this->data['setting']);
        // echo "</pre>";
        // die;
        $this->view('backend', 'setting_website', $this->data);
    }

    // public function ajaxSaveSettingApp()
    // {
    //     $response = $this->model->saveSettingApp();

    //     if ($response) {
    //         echo json_encode(['status' => true, 'message' => 'Data berhasil diubah']);
    //     } else {
    //         echo json_encode(['status' => false, 'message' => 'Gagal merubah data']);
    //     }
    // }

    // public function ajaxSaveSettingLayout()
    // {
    //     $response = $this->model->saveSettingLayout();

    //     if ($response) {
    //         echo json_encode(['status' => true, 'message' => 'Data berhasil diubah']);
    //     } else {
    //         echo json_encode(['status' => false, 'message' => 'Gagal merubah data']);
    //     }
    // }

    // public function ajaxSaveSettingLibrary()
    // {
    //     $response = $this->model->saveSettingLibrary();

    //     if ($response) {
    //         echo json_encode(['status' => true, 'message' => 'Data berhasil diubah']);
    //     } else {
    //         echo json_encode(['status' => false, 'message' => 'Gagal merubah data']);
    //     }
    // }

    // public function ajaxSaveSettingProfile()
    // {
    //     $response = $this->model->saveSettingProfile();

    //     if ($response) {
    //         echo json_encode(['status' => true, 'message' => 'Data berhasil diubah']);
    //     } else {
    //         echo json_encode(['status' => false, 'message' => 'Gagal merubah data']);
    //     }
    // }
    public function ajaxSaveSettingWebsite()
    {
        $id = $this->data['setting']['id'];

        $fields = [
            'nama_website' => $this->request->getPost('nama_website'),
            'meta_deskripsi' => $this->request->getPost('meta_deskripsi'),
            'meta_keyword' => $this->request->getPost('meta_keyword'),
            'image_dark' => $this->request->getPost('image_dark'),
            'image_light' => $this->request->getPost('image_light'),
            'play_store' => $this->request->getPost('play_store'),
            'apple_store' => $this->request->getPost('apple_store'),
            'footer' => $this->request->getPost('footer'),
        ];

        $response = $this->model->updateData('setting', $fields, 'id', $id);

        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil diubah']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }

    public function ajaxSaveSettingContactUs()
    {
        $id = $this->data['setting']['id'];

        $fields = [
            'alamat' => $this->request->getPost('alamat'),
            'no_telp' => $this->request->getPost('no_telp'),
            'email' => $this->request->getPost('email'),
            'facebook' => $this->request->getPost('facebook'),
            'instagram' => $this->request->getPost('instagram'),
            'whatsapp' => $this->request->getPost('whatsapp'),
            'google_maps' => $this->request->getPost('google_maps'),
        ];

        $response = $this->model->updateData('setting', $fields, 'id', $id);

        if ($response) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil diubah']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }
}
