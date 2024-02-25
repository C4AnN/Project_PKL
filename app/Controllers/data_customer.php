<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class data_customer extends BaseController
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
        $data['content_admin']        = 'data-c-customer';
        $data['data_customer'] = $this->model_crud->tampilcustomer();
        $data['data_mesin'] = $this->model_crud->tampilmesin();
        
        echo view('layout', $data);
    }

    public function detaildata($id_customer)
    {  
        $data = [
            'content_admin'          => 'data-c-customer',
            'detail_customer' => $this->model_crud->detailcustomer($id_customer),
            'data_customer'   => $this->model_crud->tampilcustomer(),
            'data_mesin'   => $this->model_crud->tampilmesin(),
            'id_customer'     => $id_customer
        ];
        
                
        echo view('layout', $data);
    }

    public function simpandata()
    {

        
        $id_customer = $this->request->getPost('inputan_id_customer');
        $nomor_customer = $this->request->getPost('inputan_nomor_customer');

        // Validasi nomor mesin
        if ($this->model_crud->cekNomorCustomerExist($nomor_customer, $id_customer)) {
            // Nomor mesin sudah ada
            echo '<script>
                alert("Nomor Customer sudah ada, silahkan masukkan Nomor yang berbeda.");
                window.location = "' . base_url('data_customer') . '"
            </script>';
            return;
        }

        $data = [
            'nomor_customer'         => $this->request->getPost('inputan_nomor_customer'),
            'nama_customer'        => $this->request->getPost('inputan_nama_customer'),
            'nama_produk'        => $this->request->getPost('inputan_produk'),
            'ketentuan_warna'        => $this->request->getPost('inputan_warna'),
            'size_cetakan'        => $this->request->getPost('inputan_size'),
            'id_mesin'        => $this->request->getPost('inputan_mesin'),

        ];

        if(empty($id_customer)){
            //data baru
            $this->model_crud->simpancustomer($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "'.base_url('data_customer').'"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahcustomer($data, $id_customer);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "'.base_url('data_customer').'"
            </script>';
        }
    }

    public function hapusdata($id_customer)
    {
        //hapus data
        $this->model_crud->hapuscustomer($id_customer);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('data_customer').'"
            </script>';
    }
}