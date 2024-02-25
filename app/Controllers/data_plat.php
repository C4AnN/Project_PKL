<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class data_plat extends BaseController
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
        $data['content_admin']        = 'data-c-plat';
        $data['data_plat'] = $this->model_crud->tampilplat();
        $data['data_customer'] = $this->model_crud->tampilcustomer();
        
        echo view('layout', $data);
    }

    public function detaildata($id_plat)
    {  
        $data = [
            'content_admin'          => 'data-c-plat',
            'detail_plat' => $this->model_crud->detailplat($id_plat),
            'data_plat'   => $this->model_crud->tampilplat(),
            'data_customer'   => $this->model_crud->tampilcustomer(),
            'id_plat'     => $id_plat
        ];
        
                
        echo view('layout', $data);
    }

    public function download($filename) {
        $file_path = './public/foto-plat/'.$filename;
        return $this->response->download($file_path, null);
    }

    public function simpandata()
    {
        $inputan_foto = $this->request->getFile('inputan_foto_cetakan');
    
        // Validasi apakah file yang diunggah adalah file PDF
        if ($inputan_foto->isValid() && $inputan_foto->getClientMimeType() === 'application/pdf') {
            $berkas_foto = $inputan_foto->getRandomName();
            $inputan_foto->move(ROOTPATH . 'public/foto-plat/', $berkas_foto);
        } else {
            // Jika file yang diunggah bukan file PDF, beri respons atau tindakan yang sesuai
            echo '<script>
                alert("File yang diunggah harus dalam format PDF.");
                window.location = "'.base_url('data_plat').'"
            </script>';
            return;
        }
    
        $id_plat = $this->request->getPost('inputan_id_plat');
        
        $data = [
            'nomor_plat'      => $this->request->getPost('inputan_nomor_plat'),
            'id_customer'     => $this->request->getPost('inputan_nama_customer'),
            'tgl_order'       => $this->request->getPost('inputan_tgl_order'),
            'nama_cetakan'    => $this->request->getPost('inputan_nama_cetakan'),
            'foto_plat'       => $berkas_foto,
            'ukuran_cetakan'  => $this->request->getPost('inputan_ukuran_cetakan'),
            'warna_plat'     => $this->request->getPost('inputan_warna_plat'),
        ];
    
        if (empty($id_plat)) {
            // Data baru
            $this->model_crud->simpanplat($data);
            echo '<script>
                alert("Selamat! Berhasil Menambah Data");
                window.location = "'.base_url('data_plat').'"
            </script>';
        } else {
            // Ubah data
            $this->model_crud->ubahplat($data, $id_plat);
            echo '<script>
                alert("Selamat! Berhasil Mengubah Data");
                window.location = "'.base_url('data_plat').'"
            </script>';
        }
    }
    

    public function hapusdata($id_plat)
    {
        //hapus data
        $this->model_crud->hapusplat($id_plat);
        
        echo '<script>
                alert("Selamat! Hapus Data Berhasil");
                window.location = "'.base_url('data_plat').'"
            </script>';
    }
}