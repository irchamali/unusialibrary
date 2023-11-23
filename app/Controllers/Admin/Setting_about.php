<?php

namespace App\Controllers\Admin;

use App\Controllers\MyController;
use App\Models\SettingModel;

class Setting_about extends MyController
{
    public function __construct()
    {
        parent::__construct();
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
        $data = $this->data;
        $data['title'] = 'Pengaturan About Website';
        $this->view('backend', 'setting_about/index', $data);
    }

    public function save()
    {
        // Validasi
        if (!$this->validate([
            'sejarah' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
            'visi_misi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            // 'struktur_organisasi' => [
            //     'rules' => 'max_size[struktur_organisasi,2048]|is_image[struktur_organisasi]|mime_in[struktur_organisasi,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
            //         'is_image' => 'Yang anda pilih bukan gambar',
            //         'mime_in' => 'Yang anda pilih bukan gambar'
            //     ]
            // ],
        ])) {
            return redirect()->to("/admin/setting-about")->with('message', 'error');
        }

        $fileUploadStruktur = $this->request->getFile('struktur_organisasi');

        if ($fileUploadStruktur->getName() == '') {
            $fileStruktur = $this->data['setting']['struktur_organisasi'];
        } else {
            $fileStruktur = $fileUploadStruktur->getRandomName();
            $fileUploadStruktur->move('public/images/', $fileStruktur);
        }

        $fields = [
            'sejarah' => $_POST['sejarah'],
            'visi_misi' => $_POST['visi_misi'],
            'struktur_organisasi' => $fileStruktur,
            'fasilitas' => $_POST['fasilitas'],
        ];

        $this->model->updateData('setting', $fields, 'id', $this->data['setting']['id']);
        return redirect()->to('/admin/setting-about')->with('message', 'success');
    }
}
