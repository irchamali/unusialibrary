<?php

namespace App\Controllers;

use App\Models\MyModel;
use Config\App;

class MyController extends BaseController
{
    protected $config;
    protected $data;
    protected $session;
    protected $model;
    protected $userLogin;
    protected $userPermission;
    protected $modulePermission;
    protected $listAction;

    protected $isLoggedIn;
    protected $baseURL;
    protected $currentModule;
    protected $moduleURL;

    private $controllerName;
    private $methodName;

    public function __construct()
    {
        $this->config = new App;
        $this->model = new MyModel;

        date_default_timezone_set('Asia/Jakarta');

        $this->session = \Config\Services::session();
        $this->request = \Config\Services::request();

        helper(['form', 'util']);
        $web = $this->session->get('web');

        $nama_module = $web['nama_module'];
        $module = $this->model->getModule($nama_module);

        if (!$module) {
            $this->data['content'] = 'Module ' . $nama_module . ' tidak ditemukan di database';
        }

        $this->isLoggedIn = $this->session->get('isLoggedIn');
        $this->currentModule = $module;
        $this->moduleURL = $web['module_url'];
        $this->userLogin = $this->session->get('user');

        $this->data['currentModule'] = $this->currentModule;
        $this->data['baseURL'] = base_url();
        $this->data['currentURL'] = current_url();
        $this->data['moduleURL'] = $this->moduleURL;
        $this->data['styles'] = array(
            base_url() . 'public/plugins/bootstrap/dist/css/bootstrap.min.css',
            base_url() . 'public/plugins/fontawesome/css/all.css',
            base_url() . 'public/dist/css/styleLTE.css',
        );
        $this->data['scripts'] = array(
            base_url() . 'public/plugins/bootstrap/dist/js/bootstrap.min.js',
            base_url() . 'public/dist/js/adminlte.min.js'
        );
        $this->data['config'] = $this->config;
        $this->data['request'] = $this->request;
        $this->data['isLoggedIn'] = $this->isLoggedIn;
        $this->data['session'] = $this->session;
        $this->data['title'] = 'Mahbub Djunaidi';
        $this->data['description'] = 'Official Website of Unusia Library';
        $this->data['image'] = base_url('public/images/mahbub-djunaidi.jpg');
        $this->data['userLogin'] = [];

        $this->data['setting'] = $this->model->getSetting();

        // Login? Yes, No, Restrict
        if ($this->currentModule['is_login'] == 'Y' && $nama_module != 'is_login') {
            $this->loginRequired();
        } else if ($this->currentModule['is_login'] == 'R') {
            $this->loginRestricted();
        }

        if ($this->isLoggedIn) {
            $this->data['title'] = $this->currentModule['module'];
            $this->data['menu'] = $this->model->getMenu($this->currentModule['nama_module']);
            $this->data['breadcrumb'] = ['Home' => base_url('dashboard'), $this->currentModule['module'] => $this->moduleURL];
            $this->data['module_role'] = $this->model->getRoleModuleUser();
            $this->data['userLogin'] = $this->userLogin;

            $this->getListRole();
            $this->getModuleRole();

            if ($nama_module == 'login') {
                $this->redirectOnLoggedIn();
            }
        }

        $this->data['menu_website'] = $this->model->getMenuWebsite($this->currentModule['nama_module']);

        if ($module['module_status_id'] != 1) {
            $this->errorPage('Module ' . $module['module'] . ' sedang ' . strtolower($module['module_status']));
            exit();
        }


        // echo "<pre>";
        // print_r($this->data);
        // echo "</pre>";
        // die;
    }

    public function getModuleRole()
    {
        $query = $this->model->getModuleRole($this->currentModule['module_id']);
        $module_role = [];
        foreach ($query as $val) {
            $module_role[$val['role_id']] = $val;
        }

        $this->listAction = [];
        $module_exception = ['login', 'home', 'post'];
        if ($this->isLoggedIn && !in_array($this->currentModule['nama_module'], $module_exception)) {
            if ($module_role) {
                foreach ($this->session->get('user')['role'] as $role_id => $arr) {
                    if (key_exists($role_id, $module_role)) {
                        $this->listAction = $module_role[$role_id];
                    }
                }

                if ($this->currentModule['nama_module'] != 'login') {
                    if (!$this->listAction) {
                        $this->errorPage('Anda tidak berhak mengakses halaman <b>' . $this->currentModule['module'] . '</b>');
                        exit;
                    }
                }
            } else {
                $this->errorPage('Anda tidak berhak mengakses halaman <b>' . $this->currentModule['module'] . '</b>, Role untuk module tersebut belum diatur');
                exit;
            }
        }
    }

    private function getListRole()
    {
        $user_role = $this->session->get('user')['role'];

        if ($this->isLoggedIn && $this->currentModule['nama_module'] != 'login') {
            $current_user = $this->model->getUserById($this->userLogin['user_id']);
            if ($current_user['is_active'] != 'aktif') {
                $this->data['content'] = 'Status akun Anda ' . ucfirst($current_user['is_active']);
                $this->errorExit($this->data);
            }

            if (!$user_role) {
                $this->errorPage('User belum memiliki role');
                exit;
            }
        }
    }

    protected function addStyle($file)
    {
        $this->data['styles'][] = $file;
    }

    protected function addScript($file, $print = false)
    {
        if ($print) {
            $this->data['scripts'][] = ['print' => true, 'script' => $file];
        } else {
            $this->data['scripts'][] = $file;
        }
    }

    protected function getControllerName()
    {
        return $this->controllerName;
    }

    protected function getMethodName()
    {
        return $this->methodName;
    }

    protected function loginRequired()
    {
        if (!$this->isLoggedIn) {
            header('Location: ' . base_url());
            exit();
        }
    }

    protected function loginRestricted()
    {
        if ($this->isLoggedIn) {
            if ($this->methodName !== 'logout') {
                header('Location: ' . base_url());
            }
        }
    }

    protected function redirectOnLoggedIn()
    {
        if ($this->isLoggedIn) {
            header('Location: ' . base_url('dashboard'));
        }
    }

    /* Redirect User setelah login */
    protected function mustNotLoggedIn()
    {
        if ($this->isLoggedIn) {
            if ($this->currentModule['nama_module'] == 'login') {
                header('Location: ' . base_url('dashboard'));
                exit();
            }
        }
    }

    protected function view($layout, $file, $data, $fileOnly = false)
    {
        if ($layout == 'frontend') {
            if (is_array($file)) {
                foreach ($file as $fileItem) {
                    echo view($fileItem, $data);
                }
            } else {
                echo view('layouts/frontend-header', $data);
                echo view($file, $data);
                echo view('layouts/frontend-footer');
            }
            // echo 'KESINI FRONTEND';
        } else {
            if (is_array($file)) {
                foreach ($file as $fileItem) {
                    echo view($fileItem, $data);
                }
            } else {
                echo view('layouts/backend-header', $data);
                echo view($file, $data);
                echo view('layouts/backend-footer');
            }
        }
    }

    protected function errorDataNotFound($addData = null)
    {
        $data = $this->data;
        $data['title'] = 'Error';
        $data['msg']['status'] = 'error';
        $data['msg']['content'] = 'Data tidak ditemukan';

        if ($addData) {
            $data = array_merge($data, $addData);
        }
        $this->view('backend', 'errors/backend-data-notfound', $data);
    }

    protected function errorPage($message)
    {
        $this->data['title'] = 'Error';
        if (is_string($message)) {
            $message = ['status' => 'error', 'message' => $message];
        }
        $this->data['msg'] = $message;
        $this->view('backend', 'errors/backend-error-page', $this->data);
    }

    protected function errorPageFrontend($message)
    {
        $this->data['title'] = 'Error';
        if (is_string($message)) {
            $message = ['status' => 'error', 'message' => $message];
        }
        $this->data['msg'] = $message;
        $this->view('frontend', 'errors/frontend-error-page', $this->data);
    }

    protected function errorExit($data)
    {
        $data = $this->data;
        echo view('backend-error-exit', $data);
        exit;
    }
}
