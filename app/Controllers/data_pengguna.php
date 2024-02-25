<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\crud;

class data_pengguna extends BaseController
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
        $data['content_superAdmin']        = 'data-c-pengguna';
        $data['data_pengguna'] = $this->model_crud->tampilpengguna();
        $data['data_mandor'] = $this->model_crud->tampilmandor();
        $data['data_mesin'] = $this->model_crud->tampilmesin();

        echo view('layout', $data);
    }

    public function detaildata($id_pengguna)
    {
        $data = [
            'content_superAdmin'          => 'data-c-pengguna',
            'detail_pengguna' => $this->model_crud->detailpengguna($id_pengguna),
            'data_pengguna'   => $this->model_crud->tampilpengguna(),
            'data_mandor'   => $this->model_crud->tampilmandor(),
            'data_mesin'   => $this->model_crud->tampilmesin(),
            'id_pengguna'     => $id_pengguna
        ];


        echo view('layout', $data);
    }

    public function download($filename)
    {
        $file_path = './public/foto-pengguna/' . $filename;
        return $this->response->download($file_path, null);
    }


    public function simpandata()
    {
        $inputan_foto = $this->request->getFile('inputan_foto');
        if (!empty($inputan_foto->getBasename())) {
            $berkas_foto = $inputan_foto->getRandomName();
            $inputan_foto->move(ROOTPATH . 'public/foto-pengguna/', $berkas_foto);
        } else {
            $berkas_foto = $this->request->getPost('nama_foto_tersimpan');
        }

        $id_pengguna = $this->request->getPost('inputan_id_pengguna');
        $nik_pengguna = $this->request->getPost('inputan_nik_pengguna');

        // Validasi nomor mesin
        if ($this->model_crud->cekNikPenggunaExist($nik_pengguna, $id_pengguna)) {
            // Nomor mesin sudah ada
            echo '<script>
                alert("NIK Mandor sudah ada, silahkan masukkan NIK yang berbeda.");
                window.location = "' . base_url('data_pengguna') . '"
            </script>';
            return;
        }

        $data = [
            'nik_pengguna'         => $this->request->getPost('inputan_nik_pengguna'),
            'nama_pengguna'        => $this->request->getPost('inputan_nama_pengguna'),
            'bagian_pengguna'          => $this->request->getPost('inputan_nama_bagian_pengguna'),
            'id_mandor'          => $this->request->getPost('inputan_mandor'),
            'id_mesin'          => $this->request->getPost('inputan_mesin'),
            'foto_pengguna'   => $berkas_foto,
        ];

        if (empty($id_pengguna)) {
            //data baru
            $this->model_crud->simpanpengguna($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "' . base_url('data_pengguna') . '"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahpengguna($data, $id_pengguna);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "' . base_url('data_pengguna') . '"
            </script>';
        }
    }

    public function hapusdata($id_pengguna)
    {
        //hapus data
        $this->model_crud->hapuspengguna($id_pengguna);

        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "' . base_url('data_pengguna') . '"
            </script>';
    }
}
