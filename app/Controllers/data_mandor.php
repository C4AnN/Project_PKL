<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class data_mandor extends BaseController
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
        $data['content_superAdmin']        = 'data-c-mandor';
        $data['data_mandor'] = $this->model_crud->tampilmandor();
        
        echo view('layout', $data);
    }

    public function detaildata($id_mandor)
    {  
        $data = [
            'content_superAdmin'          => 'data-c-mandor',
            'detail_mandor' => $this->model_crud->detailmandor($id_mandor),
            'data_mandor'   => $this->model_crud->tampilmandor(),
            'id_mandor'     => $id_mandor
        ];
        
                
        echo view('layout', $data);
    }

    public function download($filename) {
        $file_path = './public/foto-mandor/'.$filename;
        return $this->response->download($file_path, null);
    }
    

    public function simpandata()
    {
        $inputan_foto = $this->request->getFile('inputan_foto');
        if(!empty($inputan_foto->getBasename())){
            $berkas_foto = $inputan_foto->getRandomName();
            $inputan_foto->move(ROOTPATH . 'public/foto-mandor/', $berkas_foto);
        }else{
            $berkas_foto = $this->request->getPost('nama_foto_tersimpan');
        }
        
        $id_mandor = $this->request->getPost('inputan_id_mandor');
        $nik = $this->request->getPost('inputan_nik');
        $nama_mandor = $this->request->getPost('inputan_nama_mandor');

        // Validasi nomor mesin
        if ($this->model_crud->cekNikExist($nik, $id_mandor)) {
            // Nomor mesin sudah ada
            echo '<script>
                alert("NIK Mandor sudah ada, silahkan masukkan NIK yang berbeda.");
                window.location = "' . base_url('data_mandor') . '"
            </script>';
            return;
        }

        // Validasi nama mesin
        if ($this->model_crud->cekNamaMandorExist($nama_mandor, $id_mandor)) {
            // Nomor mesin sudah ada
            echo '<script>
                alert("Nama Mandor sudah ada, silahkan masukkan Nama Mandor yang berbeda.");
                window.location = "' . base_url('data_mandor') . '"
            </script>';
            return;
        }
        
        $data = [
            'nik'         => $this->request->getPost('inputan_nik'),
            'nama_mandor'        => $this->request->getPost('inputan_nama_mandor'),
            'bagian_mandor'          => $this->request->getPost('inputan_nama_bagian'),
            'foto_mandor'   => $berkas_foto,
        ];

        if(empty($id_mandor)){
            //data baru
            $this->model_crud->simpanmandor($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "'.base_url('data_mandor').'"
            </script>';
        } else {
            //ubah data
            $this->model_crud->ubahmandor($data, $id_mandor);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "'.base_url('data_mandor').'"
            </script>';
        }
    }

    public function hapusdata($id_mandor)
    {
        //hapus data
        $this->model_crud->hapusmandor($id_mandor);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('data_mandor').'"
            </script>';
    }
}