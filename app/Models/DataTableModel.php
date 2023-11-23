<?php

namespace App\Models;

use CodeIgniter\Model;

class DataTableModel extends \App\Models\MyModel
{
    /**
     * DataTable instance.
     * Menghasilkan data untuk DataTable.
     * whereBefore dan whereInBefore untuk menghasilkan data sebelum hasil.
     * whereAfter dan whereInAfter untuk menghasilkan data setelah hasil.
     * NB : cek posisi pada $recordsTotal = $model->countAllResults(false);
     */
    function getGenerateServerSide(
        String $table,
        array $fields,
        array $get,
        array $orderBy = null,
        array $joins = null,

        // ----------------------------------------------------------------------------------------------
        array $whereOnlyBefore = null,
        array $whereBefore = null,
        array $whereInBefore = null,
        array $whereNotInBefore = null,
        array $filtersBefore = null,
        // ----------------------------------------------------------------------------------------------
        array $whereOnlyAfter = null,
        array $whereAfter = null,
        array $whereInAfter = null,
        array $whereNotInAfter = null,
        array $filtersAfter = null,
        // ----------------------------------------------------------------------------------------------

        array $fieldOrder = null,
        bool $withDeleted = null
    ) {
        $model = $this->db->table($table);
        $model->select($fields);

        $start = $get['start'] ?? 0;
        $length = $get['length'] ?? 10;
        $draw = $get['draw'] ?? 1;
        $orders = $get['order'] ?? null;
        $columns = $get['columns'] ?? null;

        if (isset($orders) && $orders !== "") {
            $getColumns = $columns;
            foreach ($orders as $inOrders) {
                if ($getColumns[$inOrders['column']]['orderable'] === 'true') {
                    $model->orderBy($fieldOrder[$inOrders['column'] - 1], strtoupper($inOrders['dir']));
                }
            }
        } else if (isset($orderBy[1]) && $orderBy[1] !== "") {
            $model->orderBy($orderBy[0], $orderBy[1]);
        }

        if (isset($joins) && $joins !== "") {
            foreach ($joins as $key => $val) {
                $model->join($val[0], $val[1], $val[2] ?? '', $val[3] ?? null);
            }
        }

        // ----------------------------------------------------------------------------------------------

        if (isset($whereOnlyBefore) && $whereOnlyBefore !== "") {
            foreach ($whereOnlyBefore as $key) {
                if (isset($key) && $key !== "") {
                    $model->where($key);
                }
                // if (isset($val[1]) && $val[1] !== "") {
                //     $model->where($val[0], $val[1]);
                // }
            }
        }

        if (isset($whereBefore) && $whereBefore !== "") {
            foreach ($whereBefore as $key => $val) {
                if (isset($val) && $val !== "") {
                    $model->where($key, $val);
                }
                // if (isset($val[1]) && $val[1] !== "") {
                //     $model->where($val[0], $val[1]);
                // }
            }
        }

        if (isset($whereInBefore) && $whereInBefore !== "") {
            foreach ($whereInBefore as $key => $val) {
                if (isset($val) && $val !== "") {
                    $model->whereIn($key, $val);
                }
                // if (isset($val[1]) && $val[1] !== "") {
                //     $model->whereIn($val[0], $val[1]);
                // }
            }
        }

        if (isset($whereNotInBefore) && $whereNotInBefore !== "") {
            foreach ($whereNotInBefore as $key => $val) {
                if (isset($val) && $val !== "") {
                    $model->whereNotIn($key, $val);
                }
                // if (isset($val[1]) && $val[1] !== "") {
                //     $model->whereIn($val[0], $val[1]);
                // }
            }
        }

        if (isset($filtersBefore) && $filtersBefore !== "") {
            foreach ($filtersBefore as $key => $val) {
                if (isset($val[1]) && $val[1] !== "") {
                    $model->like($val[0], $val[1], $val[2] ?? 'both', $val[3] ?? null, $val[4] ?? true);
                }
            }
        }

        // ----------------------------------------------------------------------------------------------
        if (is_null($withDeleted)) {
            $recordsTotal = $model->countAllResults(false);
        } else if ($withDeleted) {
            $recordsTotal = $model->where($table . '.deleted_at NOT NULL')->countAllResults(false);
        } else if (!$withDeleted) {
            $recordsTotal = $model->where($table . '.deleted_at IS NULL')->countAllResults(false);
        }
        // ----------------------------------------------------------------------------------------------

        if (isset($whereOnlyAfter) && $whereOnlyAfter !== "") {
            foreach ($whereOnlyAfter as $key) {
                if (isset($key) && $key !== "") {
                    $model->where($key);
                }
                // if (isset($val[1]) && $val[1] !== "") {
                //     $model->where($val[0], $val[1]);
                // }
            }
        }

        if (isset($whereAfter) && $whereAfter !== "") {
            foreach ($whereAfter as $key => $val) {
                if (isset($val) && $val !== "") {
                    $model->where($key, $val);
                }
                // if (isset($val[1]) && $val[1] !== "") {
                //     $model->where($val[0], $val[1]);
                // }
            }
        }

        if (isset($whereInAfter) && $whereInAfter !== "") {
            foreach ($whereInAfter as $key => $val) {
                if (isset($val) && $val !== "") {
                    $model->whereIn($key, $val);
                }
                // if (isset($val[1]) && $val[1] !== "") {
                //     $model->whereIn($val[0], $val[1]);
                // }
            }
        }

        if (isset($whereNotInAfter) && $whereNotInAfter !== "") {
            foreach ($whereNotInAfter as $key => $val) {
                if (isset($val) && $val !== "") {
                    $model->whereNotIn($key, $val);
                }
                // if (isset($val[1]) && $val[1] !== "") {
                //     $model->whereIn($val[0], $val[1]);
                // }
            }
        }

        if (isset($filtersAfter) && $filtersAfter !== "") {
            foreach ($filtersAfter as $key => $val) {
                if (isset($val[1]) && $val[1] !== "") {
                    $model->like($val[0], $val[1], $val[2] ?? 'both', $val[3] ?? null, $val[4] ?? true);
                }
            }
        }

        // ----------------------------------------------------------------------------------------------

        if (empty($get['search']['value']) === false) {
            foreach ($fields as $key => $val) {
                if ($key === 0) {
                    $model->like($val, $get['search']['value'], 'both', null, false);
                } else {
                    $model->orLike($val, $get['search']['value'], 'both', null, false);
                }
            }
        }

        if (is_null($withDeleted)) {
            $recordsFiltered = $model->countAllResults(false);
        } else if ($withDeleted) {
            $recordsFiltered = $model->where($table . '.deleted_at NOT NULL')->countAllResults(false);
        } else if (!$withDeleted) {
            $recordsFiltered = $model->where($table . '.deleted_at IS NULL')->countAllResults(false);
        }

        $model->limit($length, $start);

        if (is_null($withDeleted)) {
            $data = $model->get()->getResult();
        } else if ($withDeleted) {
            $data = $model->where($table . '.deleted_at NOT NULL')->get()->getResult();
        } else if (!$withDeleted) {
            $data = $model->where($table . '.deleted_at IS NULL')->get()->getResult();
        }

        $response = [
            // 'var_dump($model),' => var_dump($model), // for debug uncomment
            'draw' => intval($draw),
            'recordsTotal' => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data' => $data
        ];

        return $response;
    }

    public function getServerSideUser($where)
    {
        // Get user
        $columns = $this->request->getPost('columns');
        $order_by = '';

        // Search
        $search_all = @$this->request->getPost('search')['value'];
        $where = ' WHERE 1 = 1 ';
        if ($search_all) {
            foreach ($columns as $val) {
                if (strpos($val['data'], 'ignore') !== false)
                    continue;

                $where_col[] = $val['data'] . ' LIKE "%' . $search_all . '%"';
            }
            $where .= ' AND (' . join(' OR ', $where_col) . ') ';
        }

        // Order
        $start = $this->request->getPost('start') ?: 0;
        $length = $this->request->getPost('length') ?: 10;
        $draw = $this->request->getPost('draw') ?: 1;

        $order_data = $this->request->getPost('order');
        $order = '';
        if (!empty($_POST['columns']) && strpos($_POST['columns'][$order_data[0]['column']]['data'], 'ignore') === false) {
            $order_by = $columns[$order_data[0]['column']]['data'] . ' ' . strtoupper($order_data[0]['dir']);
            $order = ' ORDER BY ' . $order_by . ' LIMIT ' . $start . ', ' . $length;
        }

        $queryData = 'SELECT user.user_id,user.image,user.username,user.email,user.nama,user.is_active, GROUP_CONCAT(nama_role) AS nama_role FROM user 
            LEFT JOIN user_role USING(user_id) 
            LEFT JOIN role ON user_role.role_id = role.role_id
            ' . $where . '
            GROUP BY user_id
            ' . $order;

        $queryFiltered = 'SELECT COUNT(*) as jml FROM
            (SELECT user.user_id,user.image,user.username,user.email,user.nama,user.is_active, GROUP_CONCAT(nama_role) AS nama_role FROM user 
            LEFT JOIN user_role USING(user_id) 
            LEFT JOIN role ON user_role.role_id = role.role_id
            ' . $where . '
            GROUP BY user_id) AS tabel';

        $recordsTotal = 'SELECT COUNT(*) as jml FROM user';

        $response = [
            'draw' => intval($draw),
            'recordsTotal' => $this->db->query($recordsTotal)->getRowArray()['jml'],
            'recordsFiltered' => $this->db->query($queryFiltered)->getRowArray()['jml'],
            'data' => $this->db->query($queryData)->getResultArray()
        ];

        return $response;
    }

    public function getServerSideArtikel($where)
    {
        // Get user
        $columns = $this->request->getPost('columns');
        $order_by = '';

        // Search
        $search_all = @$this->request->getPost('search')['value'];
        $where = ' WHERE 1 = 1 ';
        if ($search_all) {
            foreach ($columns as $val) {
                if (strpos($val['data'], 'ignore') !== false)
                    continue;

                $where_col[] = $val['data'] . ' LIKE "%' . $search_all . '%"';
            }
            $where .= ' AND (' . join(' OR ', $where_col) . ') ';
        }

        // Order
        $start = $this->request->getPost('start') ?: 0;
        $length = $this->request->getPost('length') ?: 10;
        $draw = $this->request->getPost('draw') ?: 1;

        $order_data = $this->request->getPost('order');
        $order = '';
        if (!empty($_POST['columns']) && strpos($_POST['columns'][$order_data[0]['column']]['data'], 'ignore') === false) {
            $order_by = $columns[$order_data[0]['column']]['data'] . ' ' . strtoupper($order_data[0]['dir']);
            $order = ' ORDER BY ' . $order_by . ' LIMIT ' . $start . ', ' . $length;
        }

        $queryData = 'SELECT artikel.*, artikel_category.nama_kategori, GROUP_CONCAT(nama_tag) AS nama_tag FROM artikel 
            LEFT JOIN artikel_list_tag USING(artikel_id) 
            LEFT JOIN artikel_tag ON artikel_list_tag.artikel_tag_id = artikel_tag.artikel_tag_id
            LEFT JOIN artikel_category ON artikel.artikel_category_id = artikel_category.artikel_category_id
            ' . $where . '
            GROUP BY artikel_id
            ' . $order;

        $queryFiltered = 'SELECT COUNT(*) as jml FROM
            (SELECT artikel.*, GROUP_CONCAT(nama_tag) AS nama_tag FROM artikel 
            LEFT JOIN artikel_list_tag USING(artikel_id) 
            LEFT JOIN artikel_tag ON artikel_list_tag.artikel_tag_id = artikel_tag.artikel_tag_id
            LEFT JOIN artikel_category ON artikel.artikel_category_id = artikel_category.artikel_category_id
            ' . $where . '
            GROUP BY artikel_id) AS tabel';

        $recordsTotal = 'SELECT COUNT(*) as jml FROM artikel';

        $response = [
            'draw' => intval($draw),
            'recordsTotal' => $this->db->query($recordsTotal)->getRowArray()['jml'],
            'recordsFiltered' => $this->db->query($queryFiltered)->getRowArray()['jml'],
            'data' => $this->db->query($queryData)->getResultArray()
        ];

        return $response;
    }
}
