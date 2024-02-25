<?php
namespace App\Controllers;
use CodeIgniter\Controllers;
use App\Models\crud;

class Halmasuk extends BaseController
{
    public function __construct()
    {
        //variabel koneksi database untuk menggunakan query manual/custom
        $this->db = \Config\Database::connect();

        //variabel session
        $this->session = session();
    }

    public function index()
    {
        $data['judul']          = 'Halaman Masuk';
        $data['sub_judul']      = 'Selamat datang di Aplikasi Ci4';
        
        if(empty($this->session->get('id_user'))) {
            echo view('hal-masuk', $data);
        } else {
            echo 
            '<script>
                alert("Anda sedang masuk di sistem, silahkan keluar / logout terlebih dulu");
                window.location = "'.base_url('halberanda').'"
            </script>';
        }
        
    }

    public function autentifikasi()
    {

        $username = $this->request->getPost('inputan_username');
        $password = $this->request->getPost('inputan_password');

        //mencari data user
        $data_user = $this->db->query("SELECT * FROM user where username = '$username' and password = '$password' ")->getRow();
        

        if(!empty($data_user->id_user)){
            //jika data user di temukan, sistem akan menyimpan data session user
            $simpan_session = [
                'id_user'   => $data_user->id_user,
                'username'  => $data_user->username,
                'password'  => $data_user->password,
                'hak_akses' => $data_user->hak_akses,
            ];
            //mengatur simpan data session user
            $this->session->set($simpan_session);

            echo 
            '<script>
                alert("Selamat! Berhasil masuk ke sistem");
                window.location = "'.base_url('halberanda').'"
            </script>';

        } else {
            //jika data user tidak di temukan
            echo 
            '<script>
                alert("Maaf, gagal masuk ke sistem :( ");
                window.location = "'.base_url('halmasuk').'"
            </script>';
        }
    }

    public function keluar()
    { 
        $this->session->destroy();
        echo 
            '<script>
                alert("Keluar dari sistem");
                window.location = "'.base_url('halmasuk').'"
            </script>';
    }

    
}