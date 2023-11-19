<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends MyController
{
    public function __construct()
    {
        parent::__construct();
        helper(['cookie', 'form']);
        $this->model = new LoginModel;
    }

    private function getValidate()
    {
        $validation = \Config\Services::validation();
        $data = [];
        $data['error_input'] = [];
        $data['error_string'] = [];
        $data['status'] = true;

        $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.'
                ],
            ],
        ]);

        if ($validation->hasError('username')) {
            $data['error_input'][] = 'username';
            $data['error_string'][] = $validation->getError('username');
            $data['status'] = false;
        }

        if ($validation->hasError('password')) {
            $data['error_input'][] = 'password';
            $data['error_string'][] = $validation->getError('password');
            $data['status'] = false;
        }

        if ($data['status'] == false) {
            echo json_encode($data);
            exit;
        }
    }

    public function index()
    {
        $this->mustNotLoggedIn();
        $data = $this->data;
        echo view('login', $data);
    }

    public function ajaxCheckLogin()
    {
        $this->getValidate();
        $user = $this->model->checkUser($this->request->getPost('username'));

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($_POST['password'], $user['password'])) {
                    $this->session->set('user', $user);
                    $this->session->set('isLoggedIn', true);
                    echo json_encode(['status' => true, 'message' => 'Selamat, Login berhasil']);
                } else {
                    echo json_encode(['status' => false, 'message' => 'Password salah']);
                }
            } else {
                echo json_encode(['status' => false, 'message' => 'User belum diaktifkan']);
            }
        } else {
            echo json_encode(['status' => false, 'message' => 'Username tidak ditemukan']);
        }
    }

    public function logout()
    {
        $this->session->destroy();
        header('location: ' . base_url('login'));
        exit;
    }
}
