<?php

namespace App\Models;

class SettingModel extends \App\Models\MyModel
{
    public function getSettingApp()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="app"')->getRowArray();
    }

    public function getSettingLayout()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="layout"')->getRowArray();
    }

    public function getSettingProfile()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="profile"')->getRowArray();
    }

    public function getSettingMediaSosial()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="media_sosial"')->getRowArray();
    }

    public function getSettingLibrary()
    {
        return $this->db->query('SELECT * FROM settings WHERE type="library"')->getRowArray();
    }



    public function saveSettingApp()
    {
        $fields = [
            'title' => 'Title',
            'description' => 'Description',
            'keyword' => 'Keyword',
            // 'image' => 'Image',
            // 'shortcut_icon' => 'Shortcut Icon',
            'footer' => 'Footer'
        ];

        foreach ($fields as $field => $title) {
            $arr[$field] = $_POST[$field];
        }

        $this->db->transStart();
        $this->db->table('settings')->delete(['type' => 'app']);
        $this->db->table('settings')->insert(
            ['type' => 'app', 'param' => json_encode($arr)]
        );
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function saveSettingLayout()
    {
        $fields = [
            'font_family' => 'Font Family',
            'font_size' => 'Font Size',
            'theme' => 'Theme',
            'button' => 'Button'
        ];

        foreach ($fields as $field => $title) {
            $arr[$field] = $_POST[$field];
        }

        $this->db->transStart();
        $this->db->table('settings')->delete(['type' => 'layout']);
        $this->db->table('settings')->insert(
            ['type' => 'layout', 'param' => json_encode($arr)]
        );
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function saveSettingLibrary()
    {
        $fields = [
            'perpustakaan_digital_unusia' => 'Perpustakaan Digital Unusia',
            'perpustakaan_univ_nu_indonesia' => 'Perpustakaan Univ NU Indonesia',
            'perpustakaan_unusia' => 'Perpustakaan Unusia',
            'peminjaman_buku' => 'Peminjaman Buku'
        ];

        foreach ($fields as $field => $title) {
            $arr[$field] = $_POST[$field];
        }

        $this->db->transStart();
        $this->db->table('settings')->delete(['type' => 'library']);
        $this->db->table('settings')->insert(
            ['type' => 'library', 'param' => json_encode($arr)]
        );
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function saveSettingMediaSosial()
    {
        $fields = [
            'email' => 'Email',
            'facebook' => 'Facebook',
            'instagram' => 'Instagram',
            'whatsapp' => 'WhatsApp'
        ];

        foreach ($fields as $field => $title) {
            $arr[$field] = $_POST[$field];
        }

        $this->db->transStart();
        $this->db->table('settings')->delete(['type' => 'media_sosial']);
        $this->db->table('settings')->insert(
            ['type' => 'media_sosial', 'param' => json_encode($arr)]
        );
        $this->db->transComplete();
        return $this->db->transStatus();
    }

    public function saveSettingProfile()
    {
        $fields = [
            'sejarah' => 'Sejarah',
            'visi_misi' => 'Visi Misi',
            'struktur_organisasi' => 'Struktur Organisasi',
            'alamat' => 'Alamat',
            'phone' => 'Phone',
            'jam_operasional' => 'Jam Operasional',
            'website_resmi' => 'Website Resmi',
        ];

        foreach ($fields as $field => $title) {
            $arr[$field] = $_POST[$field];
        }

        $this->db->transStart();
        $this->db->table('settings')->delete(['type' => 'profile']);
        $this->db->table('settings')->insert(
            ['type' => 'profile', 'param' => json_encode($arr)]
        );
        $this->db->transComplete();
        return $this->db->transStatus();
    }
}
