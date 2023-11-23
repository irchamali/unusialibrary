<?php

namespace App\Controllers\Admin;

use App\Controllers\MyController;
use App\Models\SettingModel;

class Setting_website extends MyController
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
        $data['title'] = 'Pengaturan Website';
        $this->view('backend', 'setting_website/index', $data);
    }

    public function save()
    {
        // Validasi
        if (!$this->validate([
            'nama_website' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'alpha_space' => 'Inputan tidak boleh mengandung karakter aneh'
                ]
            ],
            'meta_deskripsi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'meta_keyword' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'logo_profile' => [
                'rules' => 'max_size[logo_profile,2048]|is_image[logo_profile]|mime_in[logo_profile,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'logo_favicon' => [
                'rules' => 'max_size[logo_favicon,2048]|is_image[logo_favicon]|mime_in[logo_favicon,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'logo_header' => [
                'rules' => 'max_size[logo_header,2048]|is_image[logo_header]|mime_in[logo_header,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'logo_footer' => [
                'rules' => 'max_size[logo_footer,2048]|is_image[logo_footer]|mime_in[logo_footer,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar tidak boleh lebih dari 2MB',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'valid_email' => 'Iputan harus email'
                ]
            ],
            'facebook' => [
                'rules' => 'required|valid_url_strict',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'valid_url_strict' => 'Inputan harus berupa link'
                ]
            ],
            'instagram' => [
                'rules' => 'required|valid_url_strict',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'valid_url_strict' => 'Inputan harus berupa link'
                ]
            ],
            'whatsapp' => [
                'rules' => 'required|valid_url_strict',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'valid_url_strict' => 'Inputan harus berupa link'
                ]
            ],
            // 'google_maps' => [
            //     'rules' => 'required',
            //     'errors' => [
            //         'required' => '{field} harus diisi!',
            //     ]
            // ],
            'apple_store' => [
                'rules' => 'required|valid_url_strict',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'valid_url_strict' => 'Inputan harus berupa link'
                ]
            ],
            'play_store' => [
                'rules' => 'required|valid_url_strict',
                'errors' => [
                    'required' => '{field} harus diisi!',
                    'valid_url_strict' => 'Inputan harus berupa link'
                ]
            ],
            'footer' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi!',
                ]
            ],
        ])) {
            return redirect()->to("/admin/setting-website")->with('message', 'error');
        }

        $fileLogoProfile = $this->request->getFile('logo_profile');
        $fileLogoFavicon = $this->request->getFile('logo_favicon');
        $fileLogoHeader = $this->request->getFile('logo_header');
        $fileLogoFooter = $this->request->getFile('logo_footer');

        if ($fileLogoProfile->getName() == '') {
            $fileProfile = $this->data['setting']['logo_profile'];
        } else {
            $fileProfile = $fileLogoProfile->getRandomName();
            $fileLogoProfile->move('public/images/', $fileProfile);
        }

        if ($fileLogoFavicon->getName() == '') {
            $fileFavicon = $this->data['setting']['logo_favicon'];
        } else {
            $fileFavicon = $fileLogoFavicon->getRandomName();
            $fileLogoFavicon->move('public/images/', $fileFavicon);
        }

        if ($fileLogoHeader->getName() == '') {
            $fileHeader = $this->data['setting']['logo_header'];
        } else {
            $fileHeader = $fileLogoHeader->getRandomName();
            $fileLogoHeader->move('public/images/', $fileHeader);
        }

        if ($fileLogoFooter->getName() == '') {
            $fileFooter = $this->data['setting']['logo_footer'];
        } else {
            $fileFooter = $fileLogoFooter->getRandomName();
            $fileLogoFooter->move('public/images/', $fileFooter);
        }

        $fields = [
            'nama_website' => strip_tags(htmlspecialchars($_POST['nama_website'], ENT_QUOTES)),
            'meta_deskripsi' => strip_tags(htmlspecialchars($_POST['meta_deskripsi'], ENT_QUOTES)),
            'meta_keyword' => strip_tags(htmlspecialchars($_POST['meta_keyword'], ENT_QUOTES)),
            'logo_profile' => $fileProfile,
            'logo_favicon' => $fileFavicon,
            'logo_header' => $fileHeader,
            'logo_footer' => $fileFooter,
            'alamat' => strip_tags(htmlspecialchars($_POST['alamat'], ENT_QUOTES)),
            'no_telp' => strip_tags(htmlspecialchars($_POST['no_telp'], ENT_QUOTES)),
            'email' => strip_tags(htmlspecialchars($_POST['email'], ENT_QUOTES)),
            'facebook' => strip_tags(htmlspecialchars($_POST['facebook'], ENT_QUOTES)),
            'instagram' => strip_tags(htmlspecialchars($_POST['instagram'], ENT_QUOTES)),
            'whatsapp' => strip_tags(htmlspecialchars($_POST['whatsapp'], ENT_QUOTES)),
            'google_maps' => strip_tags(htmlspecialchars($_POST['google_maps'], ENT_QUOTES)),
            'apple_store' => strip_tags(htmlspecialchars($_POST['apple_store'], ENT_QUOTES)),
            'play_store' => strip_tags(htmlspecialchars($_POST['play_store'], ENT_QUOTES)),
            'footer' => strip_tags(htmlspecialchars($_POST['footer'], ENT_QUOTES)),
        ];

        $this->model->updateData('setting', $fields, 'id', $this->data['setting']['id']);
        return redirect()->to('/admin/setting-website')->with('message', 'success');
    }
}
