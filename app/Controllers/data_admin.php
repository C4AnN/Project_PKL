<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\crud;

class data_admin extends BaseController
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
        $data['content_superAdmin']        = 'data-c-admin';
        $data['data_admin'] = $this->model_crud->tampiladmin();
        $data['data_mandor'] = $this->model_crud->tampilmandor();

        echo view('layout', $data);
    }

    public function detaildata($id_admin)
    {
        $data = [
            'content_superAdmin'          => 'data-c-admin',
            'detail_admin' => $this->model_crud->detailadmin($id_admin),
            'data_admin'   => $this->model_crud->tampiladmin(),
            'data_mandor'   => $this->model_crud->tampilmandor(),
            'id_admin'     => $id_admin
        ];


        echo view('layout', $data);
    }

    public function download($filename)
    {
        $file_path = './public/foto-admin/' . $filename;
        return $this->response->download($file_path, null);
    }


    public function simpandata()
    {
        $inputan_foto = $this->request->getFile('inputan_foto');
        if (!empty($inputan_foto->getBasename())) {
            $berkas_foto = $inputan_foto->getRandomName();
            $inputan_foto->move(ROOTPATH . 'public/foto-admin/', $berkas_foto);
        } else {
            $berkas_foto = $this->request->getPost('nama_foto_tersimpan');
        }

        $id_admin = $this->request->getPost('inputan_id_admin');
        $nik_admin = $this->request->getPost('inputan_nik_admin');

        // Validasi nomor mesin
        if ($this->model_crud->cekNikAdminExist($nik_admin, $id_admin)) {
            // Nomor mesin sudah ada
            echo '<script>
                alert("NIK Mandor sudah ada, silahkan masukkan NIK yang berbeda.");
                window.location = "' . base_url('data_admin') . '"
            </script>';
            return;
        }

        $data = [
            'nik_admin'         => $this->request->getPost('inputan_nik_admin'),
            'nama_admin'        => $this->request->getPost('inputan_nama_admin'),
            'bagian_admin'          => $this->request->getPost('inputan_nama_bagian'),
            'id_mandor'          => $this->request->getPost('inputan_nama_mandor'),
            'foto_admin'   => $berkas_foto,
        ];

        if (empty($id_admin)) {
            //data baru
            $this->model_crud->simpanadmin($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "' . base_url('data_admin') . '"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahadmin($data, $id_admin);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "' . base_url('data_admin') . '"
            </script>';
        }
    }

    public function hapusdata($id_admin)
    {
        //hapus data
        $this->model_crud->hapusadmin($id_admin);

        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "' . base_url('data_admin') . '"
            </script>';
    }
}
