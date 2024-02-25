<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\crud;

class panel_order extends BaseController
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
        $data['content_admin']    = 'panel-c-order';
        $data['data_order'] = $this->model_crud->tampilorder();
        $data['data_customer'] = $this->model_crud->tampilcustomer();
       
        $data['data_mesin'] = $this->model_crud->tampilmesin();
        $data['data_user'] = $this->model_crud->tampiluser();
        $data['data_mandor'] = $this->model_crud->tampilmandor();

        echo view('layout', $data);
    }

    public function detaildata($id_order)
    {
        $data = [
            'content'      => 'panel-c-order',
            'detail_order' => $this->model_crud->detailrevisi($id_order),
            'data_revisi'   => $this->model_crud->tampilrevisi(),
            'data_customer'   => $this->model_crud->tampilcustomer(),
           
            'data_mesin'   => $this->model_crud->tampilmesin(),
            'data_user'   => $this->model_crud->tampiluser(),
            'data_mandor'   => $this->model_crud->tampilmandor(),
            'id_order'     => $id_order
        ];

        echo view('layout', $data);
    }

    public function simpandata()
    {

        $id_order = $this->request->getPost('inputan_id_order');

        $data = [
            'nomor_plat'  => $this->request->getPost('inputan_nomor_plat'),
            'id_customer'  => $this->request->getPost('inputan_customer'),
            'Nama_Cetakan2'  => $this->request->getPost('inputan_Nama_Cetakan2'),
            'warna_plat'  => $this->request->getPost('inputan_warna_plat'),
            'tgl_order'  => $this->request->getPost('inputan_tgl_order'),
            'id_mesin'  => $this->request->getPost('inputan_mesin'),
            'id_user'  => $this->request->getPost('inputan_user'),
            'id_mandor'  => $this->request->getPost('inputan_mandor'),
            'keterangan'  => $this->request->getPost('inputan_keterangan')
        ];

        if (empty($id_order)) {
            //data baru
            $this->model_crud->simpanorder($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "' . base_url('data_order') . '"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahorder($data, $id_order);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "' . base_url('data_order') . '"
            </script>';
        }
    }

    public function hapusdata($id_order)
    {
        //hapus data
        $this->model_crud->hapusorder($id_order);

        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "' . base_url('data_order') . '"
            </script>';
    }
}
