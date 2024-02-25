<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\crud;

class panel_revisi extends BaseController
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
        $data['content_admin']        = 'panel-c-revisi';
        $data['data_revisi'] = $this->model_crud->tampilrevisi();
        $data['data_customer'] = $this->model_crud->tampilcustomer();
        $data['data_mesin'] = $this->model_crud->tampilmesin();
        $data['data_pengguna'] = $this->model_crud->tampilpengguna();
        $data['data_mandor'] = $this->model_crud->tampilmandor();

        echo view('layout', $data);
    }

    public function detaildata($id_revisi)
    {
        $data = [
            'content'      => 'panel-c-revisi',
            'detail_revisi' => $this->model_crud->detailrevisi($id_revisi),
            'data_revisi'   => $this->model_crud->tampilrevisi(),
            'data_customer'   => $this->model_crud->tampilcustomer(),
            'data_mesin'   => $this->model_crud->tampilmesin(),
            'data_pengguna'   => $this->model_crud->tampilpengguna(),
            'data_mandor'   => $this->model_crud->tampilmandor(),
            'id_revisi'     => $id_revisi
        ];

        echo view('layout', $data);
    }

    public function download($filename) {
        $file_path = './public/foto-revisi/'.$filename;
        return $this->response->download($file_path, null);
    }

    public function simpandata()
    {
        $inputan_foto = $this->request->getFile('inputan_foto');
        if (!empty($inputan_foto->getBasename())) {
            $berkas_foto = $inputan_foto->getRandomName();
            $inputan_foto->move(ROOTPATH . 'public/foto-revisi/', $berkas_foto);
        } else {
            $berkas_foto = $this->request->getPost('nama_foto_tersimpan');
        }
        $id_revisi = $this->request->getPost('inputan_id_revisi');

        $data = [
            'nomor_plat'  => $this->request->getPost('inputan_nomor_plat'),
            'id_customer'  => $this->request->getPost('inputan_customer'),
            'Nama_Cetakan'  => $this->request->getPost('inputan_Nama_Cetakan'),
            'warna_plat'  => $this->request->getPost('inputan_warna_plat'),
            'tgl_revisi'  => $this->request->getPost('inputan_tgl_revisi'),
            'id_mesin'  => $this->request->getPost('inputan_mesin'),
            'id_pengguna'  => $this->request->getPost('inputan_pengguna'),
            'id_mandor'  => $this->request->getPost('inputan_mandor'),
            'file_perbaikan'  => $berkas_foto,
            'keterangan'  => $this->request->getPost('inputan_keterangan')
        ];

        if (empty($id_revisi)) {
            //data baru
            $this->model_crud->simpanrevisi($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "' . base_url('data_revisi') . '"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahrevisi($data, $id_revisi);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "' . base_url('data_revisi') . '"
            </script>';
        }
    }

    public function hapusdata($id_revisi)
    {
        //hapus data
        $this->model_crud->hapusrevisi($id_revisi);

        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "' . base_url('data_revisi') . '"
            </script>';
    }
}
