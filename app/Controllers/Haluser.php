<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Haluser extends BaseController
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
        $data['content']        = 'hal-c-user';
        $data['judul']          = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']      = 'Selamat datang di halaman user';
        $data['data_user'] = $this->model_crud->tampiluser();
        
        echo view('_applayout', $data);
    }

    public function detaildata($id_user)
    {  
        $data = [
            'content'      => 'hal-c-user',
            'judul'        => 'Rekayasa Web (Aplikasi UAS)',
            'sub_judul'    => 'Selamat datang di halaman user',
            'detail_user' => $this->model_crud->detailuser($id_user),
            'data_user'   => $this->model_crud->tampiluser(),
            'id_user'     => $id_user
        ];

        echo view('_applayout', $data);
    }

    public function simpandata()
    {
        
        $id_user = $this->request->getPost('inputan_id_user');
        
        $data = [
            'username'  => $this->request->getPost('inputan_username'),
            'password'  => $this->request->getPost('inputan_password'),
            'hak_akses' => $this->request->getPost('inputan_hak_akses')
        ];

        if(empty($id_user)){
            //data baru
            $this->model_crud->simpanuser($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "'.base_url('haluser').'"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahuser($data, $id_user);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "'.base_url('haluser').'"
            </script>';
        }
    }

    public function hapusdata($id_user)
    { 
        //hapus data
        $this->model_crud->hapususer($id_user);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('haluser').'"
            </script>';
    }
}