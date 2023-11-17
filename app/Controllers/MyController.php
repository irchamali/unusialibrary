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
            // $this->errorExit($this->data);
        }

        // $this->isLoggedIn = $this->session->get('isLoggedIn');
        $this->currentModule = $module;
        $this->moduleURL = $web['module_url'];
        // $this->user = $this->session->get('user');
        // $this->model->checkRememberme();

        $this->data['currentModule'] = $this->currentModule;
        $this->data['baseURL'] = base_url();
        $this->data['currentURL'] = current_url();
        $this->data['moduleURL'] = $this->moduleURL;
        $this->data['stylesBackend'] = array(
            base_url() . 'public/backend/bower_components/bootstrap/dist/css/bootstrap.min.css',
            base_url() . 'public/backend/bower_components/fontawesome/css/all.css',
            base_url() . 'public/backend/dist/css/styleLTE.css',
        );
        $this->data['scriptsBackend'] = array(
            base_url() . 'public/backend/bower_components/bootstrap/dist/js/bootstrap.min.js',
            base_url() . 'public/backend/dist/js/adminlte.min.js'
        );
        $this->data['config'] = $this->config;
        $this->data['request'] = $this->request;
        $this->data['isLoggedIn'] = $this->isLoggedIn;
        $this->data['session'] = $this->session;
        $this->data['title'] = 'AdminLTE 2';
        $this->data['deskripsi'] = 'AdminLTE 2 Lengkap dengan berbagai fitur untuk memudahkan pengembangan aplikasi';
        $this->data['settingAppLayout'] = $this->model->getSettingAppLayout();
        $this->data['menu_frontend'] = $this->model->getMenuFrontend($this->currentModule['nama_module']);

        if ($this->isLoggedIn) {
            $user_setting = $this->model->getSettingAppLayoutUser();

            if ($user_setting) {
                $this->data['settingAppLayoutUser'] = json_decode($user_setting->param, true);
            }
        } else {
            $query = $this->model->getSettingAppLayoutDefault();
            foreach ($query as $val) {
                $settingAppLayoutUser[$val['param']] = $val['value'];
            }
            $this->data['settingAppLayoutUser'] = $settingAppLayoutUser;
        }

        // Login? Yes, No, Restrict
        // if ($this->currentModule['is_login'] == 'Y' && $nama_module != 'is_login') {
        //     $this->loginRequired();
        // } else if ($this->currentModule['is_login'] == 'R') {
        //     $this->loginRestricted();
        // }

        if (!$this->isLoggedIn) {
            // $this->data['user'] = $this->user;

            // List action assigned to role
            // $this->data['action_user'] = $this->userPermission;
            $this->data['title'] = $this->currentModule['module'];
            $this->data['menu'] = $this->model->getMenu($this->currentModule['nama_module']);

            $this->data['breadcrumb'] = ['Home' => base_url(), $this->currentModule['module'] => $this->moduleURL];
            // $this->data['module_role'] = $this->model->getDefaultUserModule();

            // $this->getModulePermission();
            // $this->getListPermission();

            // $result = $this->model->getAllModulePermission($_SESSION['user']['id_user']);
            // $all_module_permission = [];
            // if ($result) {
            //     foreach ($result as $val) {
            //         $all_module_permission[$val['id_module']][$val['nama_permission']] = $val;
            //     }
            // }
            // $_SESSION['user']['all_permission'] = $all_module_permission;

            // Check Global Role Action
            // $this->checkRoleAction();
            // if ($nama_module == 'login') {
            //     $this->redirectOnLoggedIn();
            // }
        }

        // if ($module['module_status_id'] != 1) {
        //     $this->errorPage('Module ' . $module['nama_module'] . ' sedang ' . strtolower($module['module_status']));
        //     exit();
        // }

        // echo "<pre>";
        // print_r($this->data);
        // echo "</pre>";
        // die;
    }

    protected function addStyleBackend($file)
    {
        $this->data['stylesBackend'][] = $file;
    }

    protected function addScriptBackend($file, $print = false)
    {
        if ($print) {
            $this->data['scriptsBackend'][] = ['print' => true, 'script' => $file];
        } else {
            $this->data['scriptsBackend'][] = $file;
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

    protected function view($layout, $file, $data, $fileOnly = false)
    {
        if ($layout == 'frontend') {
            if (is_array($file)) {
                foreach ($file as $fileItem) {
                    echo view($fileItem, $data);
                }
            } else {
                // echo view('Layouts/frontend-header', $data);
                echo view($file, $data);
                // echo view('Layouts/frontend-footer');
            }
            // echo 'KESINI FRONTEND';
        } else {
            if (is_array($file)) {
                foreach ($file as $fileItem) {
                    echo view($fileItem, $data);
                }
            } else {
                echo view('Layouts/backend-header', $data);
                echo view($file, $data);
                echo view('Layouts/backend-footer');
            }
        }
    }

    protected function errorDataNotFound($dataNotFound = null)
    {
        $data = $this->data;
        $data['title'] = 'Error';
        $data['msg']['status'] = 'error';
        $data['msg']['content'] = 'Data tidak ditemukan';

        if ($dataNotFound) {
            $data = array_merge($data, $dataNotFound);
        }
        $this->view('backend', 'backend-error-data-notfound', $data);
    }

    protected function errorPage($message)
    {
        if (is_string($message)) {
            $message = ['status' => 'error', 'message' => $message];
        }
        $this->data['msg'] = $message;
        $this->view('backend', 'backend-error-page', $this->data);
    }

    protected function errorExit($data)
    {
        echo view('backend-error-exit', $data);
        exit;
    }
}
