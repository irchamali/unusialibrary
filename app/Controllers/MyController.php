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
    protected $user;

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
        $this->user = $this->session->get('user');

        $this->data['currentModule'] = $this->currentModule;
        $this->data['baseURL'] = base_url();
        $this->data['currentURL'] = current_url();
        $this->data['moduleURL'] = $this->moduleURL;
        $this->data['stylesBackend'] = array(
            base_url() . 'public/bower_components/bootstrap/dist/css/bootstrap.min.css',
            base_url() . 'public/bower_components/fontawesome/css/all.css',
            base_url() . 'public/dist/css/styleLTE.css',
        );
        $this->data['scriptsBackend'] = array(
            base_url() . 'public/bower_components/bootstrap/dist/js/bootstrap.min.js',
            base_url() . 'public/dist/js/adminlte.min.js'
        );
        $this->data['config'] = $this->config;
        $this->data['request'] = $this->request;
        $this->data['isLoggedIn'] = $this->isLoggedIn;
        $this->data['session'] = $this->session;
        $this->data['title'] = 'Perpustakaan Mahbub Djunaidi';
        $this->data['description'] = 'Website Resmi Perpustakaan Mahbub Djunaidi';
        $this->data['menu_frontend'] = $this->model->getMenuFrontend($this->currentModule['nama_module']);

        $settingApp = $this->model->getSettingApp();
        if ($settingApp) {
            $this->data['settingApp'] = json_decode($settingApp['param'], true);
        }

        $settingLayout = $this->model->getSettingLayout();
        if ($settingLayout) {
            $this->data['settingLayout'] = json_decode($settingLayout['param'], true);
        }

        $settingProfile = $this->model->getSettingProfile();
        if ($settingProfile) {
            $this->data['settingProfile'] = json_decode($settingProfile['param'], true);
        }

        $settingMediaSosial = $this->model->getSettingMediaSosial();
        if ($settingMediaSosial) {
            $this->data['settingMediaSosial'] = json_decode($settingMediaSosial['param'], true);
        }

        $settingLibrary = $this->model->getSettingLibrary();
        if ($settingLibrary) {
            $this->data['settingLibrary'] = json_decode($settingLibrary['param'], true);
        }

        // Login? Yes, No, Restrict
        if ($this->currentModule['is_login'] == 'Y' && $nama_module != 'is_login') {
            $this->loginRequired();
        } else if ($this->currentModule['is_login'] == 'R') {
            $this->loginRestricted();
        }

        if ($this->isLoggedIn) {
            $this->data['title'] = $this->currentModule['module'];
            $this->data['menu'] = $this->model->getMenu($this->currentModule['nama_module']);
            $this->data['breadcrumb'] = ['Home' => base_url(), $this->currentModule['module'] => $this->moduleURL];
            $this->data['module_role'] = $this->model->getRoleModuleUser();

            if ($nama_module == 'login') {
                $this->redirectOnLoggedIn();
            }
        }

        if ($module['module_status_id'] != 1) {
            $this->errorPage('Module ' . $module['module'] . ' sedang ' . strtolower($module['module_status']));
            exit();
        }

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
                echo view('Layouts/frontend-header', $data);
                echo view($file, $data);
                echo view('Layouts/frontend-footer');
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
        if ($this->isLoggedIn) {
            $this->view('backend', 'backend-error-page', $this->data);
        } else {
            $this->view('frontend', 'frontend-error-page', $this->data);
        }
    }

    protected function errorExit($data)
    {
        echo view('backend-error-exit', $data);
        exit;
    }
}
