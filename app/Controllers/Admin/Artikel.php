<?php

namespace App\Controllers\Admin;

use App\Controllers\MyController;
use App\Models\ArtikelModel;
use App\Models\DataTableModel;

class Artikel extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new ArtikelModel;
        $this->addStyle(base_url('public/plugins/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyle(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.css');
        $this->addStyle(base_url('public/plugins/summernote/') . 'summernote.min.css');

        $this->addStyle(base_url('public/plugins/select2/dist/css/') . 'select2.min.css');
        $this->addScript(base_url('public/plugins/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScript(base_url('public/plugins/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScript(base_url('public/plugins/bootbox/') . 'bootbox.min.js');
        $this->addScript(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScript(base_url('public/plugins/select2/dist/js/') . 'select2.full.min.js');
        $this->addScript(base_url('public/plugins/summernote/') . 'summernote.min.js');
    }

    private function getValidate($method)
    {
        $validation = \Config\Services::validation();
        $data = [];
        $data['error_input'] = [];
        $data['error_string'] = [];
        $data['status'] = true;

        $this->validate([
            'judul_artikel' => [
                'label' => 'Judul Artikel',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
            'artikel_category_id' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
            'artikel_tag_id' => [
                'label' => 'Tag',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
        ]);

        if ($validation->hasError('judul_artikel')) {
            $data['error_input'][] = 'judul_artikel';
            $data['error_string'][] = $validation->getError('judul_artikel');
            $data['status'] = false;
        }

        if ($validation->hasError('artikel_category_id')) {
            $data['error_input'][] = 'artikel_category_id';
            $data['error_string'][] = $validation->getError('artikel_category_id');
            $data['status'] = false;
        }

        if ($validation->hasError('artikel_tag_id')) {
            $data['error_input'][] = 'artikel_tag_id[]';
            $data['error_string'][] = $validation->getError('artikel_tag_id');
            $data['status'] = false;
        }

        if ($data['status'] == false) {
            echo json_encode($data);
            exit;
        }
    }

    public function index()
    {
        $this->data['title'] = 'Daftar Artikel';
        $this->view('backend', 'artikel/index', $this->data);
    }

    public function form()
    {
        $this->data['title'] = 'Tambah Artikel';
        if (isset($_GET['id'])) {
            if ($_GET['id']) {
                $this->data['title'] = 'Ubah Artikel';
                $this->data['artikel'] = $this->model->getArtikelById($_GET['id']);
                if (!$this->data['artikel']) {
                    $this->errorDataNotFound();
                    exit;
                }
            }
        }
        $this->data['category'] = $this->model->getCategoryByArtikel();
        $this->data['tag'] = $this->model->getTagByArtikel();
        $this->view('backend', 'artikel/form', $this->data);
    }

    public function ajaxGetData()
    {

        // $this->hasPermission('read_all');
        $model = new DataTableModel;
        $artikel = $model->getServerSideArtikel(null);

        helper('html');
        $image_path = ROOTPATH . 'public/images/artikel/';

        foreach ($artikel['data'] as $key => &$val) {
            if ($val['image']) {
                if (file_exists($image_path . $val['image'])) {
                    $image = base_url('public/images/artikel/') . $val['image'];
                } else {
                    $image = base_url('public/images/') . 'no_image.png';
                }
            } else {
                $image = base_url('public/images/') . 'no_image.png';
            }
            $val['ignore_image'] = '<img src="' . $image . '" style="width:80px;height:80px;">';
            $val['nama_kategori'] = '<a href="' . base_url('category/') . $val['slug_kategori'] . '" target="_blank">' . $val['nama_kategori'] . '</a>';
            $tag = '';
            if ($val['nama_tag']) {
                $split = explode(',', $val['nama_tag']);
                foreach ($split as $nama_tag) {
                    $tag .= '<div class="label label-default mr-1">' . $nama_tag . '</div>';
                }
            }

            if ($val['status'] == 'published') {
                $status = '<div class="label label-success">Published</div>';
            } else {
                $status = '<div class="label label-default">Draft</div>';
            }

            $val['nama_tag'] = $tag;
            $val['status'] = $status;
            $val['ignore_btn'] = '
                <a href="' . base_url('post/') . $val['slug_artikel'] . '" class="btn btn-info btn-sm" target="_blank"><i class="fa fa-eye"></i> Lihat</a>
                <a href="' . base_url('admin/artikel/form?id=') . $val['artikel_id'] . '" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i> Ubah</a>
                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="' . $val['artikel_id'] . '" data-message-delete="Apakah anda yakin, Data user <b>' . $val['judul_artikel'] . '</b> akan dihapus?"><i class="fa fa-trash-alt"></i> Hapus</button>
            ';
        }

        $response = [
            'data' => $artikel['data'],
            'draw' => $artikel['draw'],
            'recordsFiltered' => $artikel['recordsFiltered'],
            'recordsTotal' => $artikel['recordsTotal'],
        ];
        echo json_encode($response);
        exit();
    }

    public function ajaxSaveData()
    {
        $this->getValidate($this->request->getPost('method'));

        echo json_encode($this->model->saveDataArtikel());
    }

    public function ajaxDeleteData()
    {
        if ($this->model->deleteDataArtikel()) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }
}
