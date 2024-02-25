<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\crud;

class User extends BaseController
{
    public function __construct()
    {
        //membuat variabel koneksi database untuk menggunakan query manual/custom
        $this->db = \Config\Database::connect();

        //membuat variabel baru untuk menggunakan models crud.php
        $this->model_crud = new crud;
    }

    public function index()
    {
        $data['content_superAdmin']        = 'data-c-user';
        $data['data_user'] = $this->model_crud->tampiluser();

        echo view('layout', $data);
    }

    public function detaildata($id_user)
    {
        $data = [
            'content_superAdmin'      => 'data-c-user',
            'detail_user' => $this->model_crud->detailuser($id_user),
            'data_user'   => $this->model_crud->tampiluser(),
            'id_user'     => $id_user
        ];

        echo view('layout', $data);
    }

    public function download($filename) {
        $file_path = './public/foto-user/'.$filename;
        return $this->response->download($file_path, null);
    }

    public function simpandata()
    {
        $inputan_foto = $this->request->getFile('inputan_foto');
        if (!empty($inputan_foto->getBasename())) {
            $berkas_foto = $inputan_foto->getRandomName();
            $inputan_foto->move(ROOTPATH . 'public/foto-user/', $berkas_foto);
        } else {
            $berkas_foto = $this->request->getPost('nama_foto_tersimpan');
        }
        $id_user = $this->request->getPost('inputan_id_user');
        $username = $this->request->getPost('inputan_username');
        $nama_user = $this->request->getPost('inputan_nama_user');

        // Validasi username
        if ($this->model_crud->cekUsernameExist($username, $id_user)) {
            // Nomor mesin sudah ada
            echo '<script>
                alert("Username sudah ada, silahkan masukkan Username yang berbeda.");
                window.location = "' . base_url('user') . '"
            </script>';
            return;
        }

        // Validasi nama user
        if ($this->model_crud->cekNamaUserExist($nama_user, $id_user)) {
            // Nomor mesin sudah ada
            echo '<script>
                alert("Nama User sudah ada, silahkan masukkan User yang berbeda.");
                window.location = "' . base_url('user') . '"
            </script>';
            return;
        }

        $data = [
            'username'  => $this->request->getPost('inputan_username'),
            'password'  => $this->request->getPost('inputan_password'),
            'nama_user'  => $this->request->getPost('inputan_nama_user'),
            'nik_user'  => $this->request->getPost('inputan_nik_user'),
            'bagian_user'  => $this->request->getPost('inputan_bagian_user'),
            'foto_user'  => $berkas_foto,
            'hak_akses' => $this->request->getPost('inputan_hak_akses')
        ];

        if (empty($id_user)) {
            //data baru
            $this->model_crud->simpanuser($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "' . base_url('user') . '"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahuser($data, $id_user);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "' . base_url('user') . '"
            </script>';
        }
    }

    public function hapusdata($id_user)
    {
        //hapus data
        $this->model_crud->hapususer($id_user);

        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "' . base_url('user') . '"
            </script>';
    }
}
