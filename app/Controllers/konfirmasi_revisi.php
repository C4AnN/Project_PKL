<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\crud;

class konfirmasi_revisi extends BaseController
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
        $data['content']        = 'panel-c-revisi';
        $data['konfirmasi_revisi'] = $this->model_crud->tampilkonfirmasirevisi();
        $data['data_revisi'] = $this->model_crud->tampilrevisi();
        $data['data_mesin'] = $this->model_crud->tampilmesin();
        $data['data_customer'] = $this->model_crud->tampilcustomer();

        echo view('layout', $data);
    }

    public function detaildata($id_konfirmasi_revisi)
    {
        $data = [
            'content'      => 'panel-c-revisi',
            'detail_konfirmasi_revisi' => $this->model_crud->detailkonfirmasirevisi($id_konfirmasi_revisi),
            'data_revisi'   => $this->model_crud->tampilrevisi(),
            'data_mesin'   => $this->model_crud->tampilmesin(),
            'data_customer'   => $this->model_crud->tampilcustomer(),

            'id_konfirmasi_revisi'     => $id_konfirmasi_revisi
        ];

        echo view('layout', $data);
    }

    public function simpandata()
    {

        $id_konfirmasi_revisi = $this->request->getPost('inputan_id_konfirmasi_revisi');

        $data = [
            'id_revisi'  => $this->request->getPost('inputan_revisi'),
            'id_mesin'  => $this->request->getPost('inputan_mesin'),
            'id_customer'  => $this->request->getPost('inputan_customer'),

            'konfirmasi'  => $this->request->getPost('inputan_konfirmasi')
        ];

        if (empty($id_konfirmasi_revisi)) {
            //data baru
            $this->model_crud->simpankonfirmasirevisi($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "' . base_url('panel_revisi') . '"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahkonfirmasirevisi($data, $id_konfirmasi_revisi);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "' . base_url('konfirmasi_revisi') . '"
            </script>';
        }
    }

    public function hapusdata($id_konfirmasi_revisi)
    {
        //hapus data
        $this->model_crud->hapuskonfirmasi($id_konfirmasi_revisi);

        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "' . base_url('konfirmasi_revisi') . '"
            </script>';
    }
}
