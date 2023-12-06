<?php

namespace App\Models;

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

class JurnalModel extends \App\Models\MyModel
{
    public function getJurnal()
    {
        return $this->db->query('SELECT * FROM jurnal')->getResultArray();
    }

    public function getJurnalById($id)
    {
        return $this->db->query('SELECT * FROM jurnal WHERE jurnal_id = ?', $id)->getRowArray();
    }

    public function checkJurnal($id, $nama_fakultas)
    {
        return $this->db->query("SELECT * FROM jurnal WHERE fakultas_id = ? AND nama_jurnal = ?", [$id, $nama_fakultas])->getRowArray();
    }

    // public function saveDataImport()
    // {
    //     helper(['util']);
    //     $path = ROOTPATH . 'public/tmp/';


    //     $file = $this->request->getFile('file_excel');
    //     if (!$file->isValid()) {
    //         throw new RuntimeException($file->getErrorString() . '(' . $file->getError() . ')');
    //     }

    //     require_once 'app/ThirdParty/Spout/src/Spout/Autoloader/autoload.php';

    //     $filename = upload_file($path, $_FILES['file_excel']);
    //     $reader = ReaderEntityFactory::createReaderFromFile($path . $filename);
    //     $reader->open($path . $filename);

    //     foreach ($reader->getSheetIterator() as $sheet) {
    //         $total_row = 0;
    //         foreach ($sheet->getRowIterator() as $num_row => $row) {
    //             $cols = $row->toArray();


    //             if ($num_row == 1) {
    //                 $field_table = $cols;
    //                 $field_name = array_map('strtolower', $field_table);
    //                 continue;
    //             }

    //             $data_value = [];

    //             foreach ($field_name as $num_col => $field) {
    //                 $val = null;
    //                 if (key_exists($num_col, $cols) && $cols[$num_col] != '') {
    //                     $val = $cols[$num_col];
    //                 }

    //                 $data_value[$field] = $val;
    //             }

    //             $data_db[] = $data_value;
    //             // $nama_fakultas = $data_value['fakultas_id'];
    //             // $fakul = $this->db->query("SELECT * FROM fakultas WHERE nama_fakultas LIKE '%$nama_fakultas%'")->getRowArray();
    //             // $data_db[] = $fakul['fakultas_id'];
    //             return $data_db;
    //             $total_row += 1;
    //             // if ($num_row % 2000 == 0) {
    //             //     $query = $this->db->table('jurnal')->insertBatch($data_db);
    //             //     $data_db = [];
    //             // }
    //         }

    //         // if ($data_db) {
    //         //     $query = $this->db->table('jurnal')->insertBatch($data_db);
    //         // }
    //     }
    //     $reader->close();
    //     return delete_file($path . $filename);
    // }
}
