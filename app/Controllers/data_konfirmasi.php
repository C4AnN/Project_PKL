<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\crud;

class data_konfirmasi extends BaseController
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
        $data['content_admin']        = 'panel-c-order';
        $data['data_konfirmasi'] = $this->model_crud->tampilkonfirmasi();
        $data['data_order'] = $this->model_crud->tampilorder();
        $data['data_mesin'] = $this->model_crud->tampilmesin();
        $data['data_customer'] = $this->model_crud->tampilcustomer();
        

       

        echo view('layout', $data);
    }

    public function detaildata($id_konfirmasi)
    {
        $data = [
            'content'      => 'panel-c-order',
            'detail_konfirmasi' => $this->model_crud->detailkonfirmasi($id_konfirmasi),
            'data_order'   => $this->model_crud->tampilorder(),
            'data_mesin'   => $this->model_crud->tampilmesin(),
            'data_customer'   => $this->model_crud->tampilcustomer(),
        
            'id_konfirmasi'     => $id_konfirmasi
        ];

        echo view('layout', $data);
    }

    public function simpandata()
    {

        $id_konfirmasi = $this->request->getPost('inputan_id_konfirmasi');

        $data = [
            'id_order'  => $this->request->getPost('inputan_order'),
            'id_mesin'  => $this->request->getPost('inputan_mesin'),
            'id_customer'  => $this->request->getPost('inputan_customer'),
            
            'konfirmasi'  => $this->request->getPost('inputan_konfirmasi')
        ];

        if (empty($id_konfirmasi)) {
            //data baru
            $this->model_crud->simpankonfirmasi($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "' . base_url('panel_order') . '"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahkonfirmasi($data, $id_konfirmasi);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "' . base_url('data_konfirmasi') . '"
            </script>';
        }
    }

    public function hapusdata($id_konfirmasi)
    {
        //hapus data
        $this->model_crud->hapuskonfirmasi($id_konfirmasi);

        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "' . base_url('data_konfirmasi') . '"
            </script>';
    }
}
