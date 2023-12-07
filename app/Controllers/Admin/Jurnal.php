<?php

namespace App\Controllers\Admin;

use App\Controllers\MyController;
use App\Models\DataTableModel;
use App\Models\FakultasModel;
use App\Models\JurnalModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jurnal extends MyController
{
    protected $fakultas;
    protected $jurnal;

    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->fakultas = new FakultasModel;
        $this->jurnal = new JurnalModel;
        $this->addStyle(base_url('public/plugins/datatables.net-bs/css/') . 'dataTables.bootstrap.min.css');
        $this->addStyle(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.css');
        $this->addStyle(base_url('public/plugins/select2/dist/css/') . 'select2.min.css');

        $this->addScript(base_url('public/plugins/datatables.net/js/') . 'jquery.dataTables.min.js');
        $this->addScript(base_url('public/plugins/datatables.net-bs/js/') . 'dataTables.bootstrap.min.js');
        $this->addScript(base_url('public/plugins/bootbox/') . 'bootbox.min.js');
        $this->addScript(base_url('public/plugins/sweetalert2/') . 'sweetalert2.min.js');
        $this->addScript(base_url('public/plugins/select2/dist/js/') . 'select2.full.min.js');
    }

    private function getValidate()
    {
        $validation = \Config\Services::validation();
        $data = [];
        $data['error_input'] = [];
        $data['error_string'] = [];
        $data['status'] = true;

        $this->validate([
            'nama_jurnal' => [
                'label' => 'Nama Jurnal',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
            'link' => [
                'label' => 'Link',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
        ]);

        if ($validation->hasError('nama_jurnal')) {
            $data['error_input'][] = 'nama_jurnal';
            $data['error_string'][] = $validation->getError('nama_jurnal');
            $data['status'] = false;
        }

        if ($validation->hasError('link')) {
            $data['error_input'][] = 'link';
            $data['error_string'][] = $validation->getError('link');
            $data['status'] = false;
        }

        if ($data['status'] == false) {
            echo json_encode($data);
            exit;
        }
    }

    public function index()
    {
        $this->data['title'] = 'Daftar Jurnal';
        $this->data['fakultas'] = $this->fakultas->getFakultas();
        $this->view('backend', 'jurnal/index', $this->data);
    }

    public function exportData()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'fakultas_id');
        $sheet->setCellValue('B1', 'nama_jurnal');
        $sheet->setCellValue('C1', 'kategori');
        $sheet->setCellValue('D1', 'link');

        $fakultas = $this->fakultas->getFakultasById($this->request->getGet('id'));

        $sheet->setCellValue('A2', $fakultas['fakultas_id']);
        $sheet->setCellValue('B2', null);
        $sheet->setCellValue('C2', null);
        $sheet->setCellValue('D2', null);

        $sheet->getStyle('G2')->getFont()->setBold(true);
        $sheet->setCellValue('G2', 'fakultas_id tidak boleh di hapus.');

        $writer = new Xlsx($spreadsheet);
        $file = "Format Jurnal - " . $fakultas['nama_fakultas'] . ".xlsx";
        header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-disposition: attachment; filename=' . $file);
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    public function ajaxGetData()
    {

        // $this->hasPermission('read_all');

        $req = $this->request->getPost();

        $table = 'jurnal';
        $fields = array(
            'jurnal.jurnal_id',
            'jurnal.nama_jurnal',
            'jurnal.kategori',
            'jurnal.link',
            'fakultas.nama_fakultas',
        );
        $get = $req;
        $orderBy = ['jurnal.jurnal_id', 'ASC'];
        $joins = [];
        $joins[] = ['fakultas', 'fakultas.fakultas_id = jurnal.fakultas_id', 'LEFT'];

        $whereOnlyBefore = [];
        $whereBefore = [];
        $whereInBefore = [];
        $whereNotInBefore = [];
        $filtersBefore = [];
        // --------------------------------------------- AllResults
        $whereOnlyAfter = [];
        $whereAfter = [];
        $whereInAfter = [];
        $whereNotInAfter = [];
        $filtersAfter = [];

        $fieldOrder = $fields;
        $withDeleted = false; // true or false

        $dt = new DataTableModel();
        $res = $dt->getGenerateServerSide(
            $table,
            $fields,
            $get,
            $orderBy,
            $joins,

            $whereOnlyBefore,
            $whereBefore,
            $whereInBefore,
            $whereNotInBefore,
            $filtersBefore,
            // --------------------------------------------- AllResults
            $whereOnlyAfter,
            $whereAfter,
            $whereInAfter,
            $whereNotInAfter,

            $filtersAfter,
            $fieldOrder,
            $withDeleted
        );

        echo json_encode($res);
        exit();
    }

    public function ajaxGetForm()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id']) {
                $this->data['jurnal'] = $this->jurnal->getJurnalById($_GET['id']);
                if (!$this->data['jurnal']) {
                    echo '<div class="alert alert-danger">Data jurnal tidak ditemukan</div>';
                    exit;
                }
            }
        }

        $this->data['fakultas'] = $this->fakultas->getFakultas();
        echo view('jurnal/form', $this->data);
    }

    public function ajaxSaveData()
    {
        $this->getValidate();

        $id = $this->request->getPost('id');

        $fields = [
            'fakultas_id' => $this->request->getPost('fakultas_id'),
            'nama_jurnal' => $this->request->getPost('nama_jurnal'),
            'kategori' => $this->request->getPost('kategori'),
            'link' => $this->request->getPost('link'),
        ];

        if ($id) {
            $result = $this->model->updateData('jurnal', $fields, 'jurnal_id', $id);
        } else {
            $result = $this->model->insertData('jurnal', $fields);
        }


        if ($result) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menyimpan data']);
        }
    }

    public function ajaxDeleteData()
    {
        if ($this->model->deleteData('jurnal', 'jurnal_id', $this->request->getPost('id'))) {
            echo json_encode(['status' => true, 'message' => 'Data berhasil dihapus']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Gagal menghapus data']);
        }
    }

    // private function getValidateImport()
    // {
    //     $data = [];
    //     $data['status'] = true;

    //     if ($_FILES['file_excel']['name']) {
    //         $data['status'] = false;
    //         $file_type = $_FILES['file_excel']['type'];
    //         $allowed = ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
    //         if (!in_array($file_type, $allowed)) {
    //             $data['error'] = 'Tipe file harus ' . join(', ', $allowed);
    //         }
    //     } else {
    //         $data['status'] = false;
    //         $data['error'] = 'File excel harus diisi.';
    //     }

    //     if ($data['status'] == false) {
    //         echo json_encode($data);
    //         exit;
    //     }
    // }

    public function ajaxSaveImportData()
    {
        $file_excel = $this->request->getFile('file_excel');
        $ext = $file_excel->getClientExtension();
        if ($ext == 'xls' || $ext == 'xlsx') {
            if ($ext == 'xls') {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $render->load($file_excel);
            $jurnal = $spreadsheet->getActiveSheet()->toArray();
            $count = 0;
            foreach ($jurnal as $key => $row) {
                if ($key == 0) {
                    continue;
                }

                $db = \Config\Database::connect();
                $checkJurnal = $db->table('jurnal')->getWhere(['fakultas_id' => $row[0], 'nama_jurnal' => $row[1], 'kategori' => $row[2]])->getRowArray();

                if ($row[0] == !empty($checkJurnal['fakultas_id'])) {
                    continue;
                }

                $fields = [
                    'fakultas_id' => $row[0],
                    'nama_jurnal' => $row[1],
                    'kategori' => strtolower($row[2]),
                    'link' => $row[3],
                ];

                $result = $this->model->insertData('jurnal', $fields);
                if ($result) {
                    $count++;
                }
            }
            echo json_encode(['status' => true, 'message' => $count . ' Data berhasil diimport']);
        } else if ($file_excel == null) {
            echo json_encode(['status' => false, 'message' => 'File upload harus diisi']);
        } else {
            echo json_encode(['status' => false, 'message' => 'Format file tidak sesuai']);
        }
    }
}
