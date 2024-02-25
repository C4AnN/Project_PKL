<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\crud;

class data_mesin extends BaseController
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
        $data['content_admin']       = 'data-c-mesin';
        $data['data_mesin'] = $this->model_crud->tampilmesin();

        echo view('layout', $data);
    }

    public function detaildata($id_mesin)
    {
        $data = [
            'content_admin'          => 'data-c-mesin',
            'detail_mesin' => $this->model_crud->detailmesin($id_mesin),
            'data_mesin'   => $this->model_crud->tampilmesin(),
            'id_mesin'     => $id_mesin
        ];


        echo view('layout', $data);
    }

    public function download($filename)
    {
        $file_path = './public/foto-mesin/' . $filename;
        return $this->response->download($file_path, null);
    }

    public function simpandata()
    {
        $inputan_foto = $this->request->getFile('inputan_foto');
        if (!empty($inputan_foto->getBasename())) {
            $berkas_foto = $inputan_foto->getRandomName();
            $inputan_foto->move(ROOTPATH . 'public/foto-mesin/', $berkas_foto);
        } else {
            $berkas_foto = $this->request->getPost('nama_foto_tersimpan');
        }

        $id_mesin = $this->request->getPost('inputan_id_mesin');
        $nama_mesin = $this->request->getPost('inputan_nama_mesin');

        // Validasi nama mesin
        if ($this->model_crud->cekNamaMesinExist($nama_mesin, $id_mesin)) {
            // Nomor mesin sudah ada
            echo '<script>
                alert("Nama Mesin sudah ada, silahkan masukkan Nama Mesin yang berbeda.");
                window.location = "' . base_url('data_mesin') . '"
            </script>';
            return;
        }

        $data = [
            'nama_mesin'        => $this->request->getPost('inputan_nama_mesin'),
            'jumlah_warna'        => $this->request->getPost('inputan_jumlah_warna'),
            'area_cetak'        => $this->request->getPost('inputan_area_cetak'),
            'bagian'          => $this->request->getPost('inputan_bagian'),
            'foto_mesin'   => $berkas_foto,
        ];

        if (empty($id_mesin)) {
            //data baru
            $this->model_crud->simpanmesin($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "' . base_url('data_mesin') . '"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahmesin($data, $id_mesin);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "' . base_url('data_mesin') . '"
            </script>';
        }
    }

    public function hapusdata($id_mesin)
    {
        //hapus data
        $this->model_crud->hapusmesin($id_mesin);

        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "' . base_url('data_mesin') . '"
            </script>';
    }
}
