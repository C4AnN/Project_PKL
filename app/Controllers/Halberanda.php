<?php
namespace App\Controllers;
use CodeIgniter\Controllers;

class Halberanda extends BaseController
{
    public function __construct()
    {
        //membuat variabel koneksi database untuk menggunakan query manual/custom
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $query_jumlah_jadwalkuliah = $this->db->query("SELECT count(id_jadwalkuliah) as jumlah_data from jadwal_kuliah ")->getRow();
        $query_jumlah_mahasiswa = $this->db->query("SELECT count(id_mahasiswa) as jumlah_data from mahasiswa ")->getRow();
        $query_jumlah_dosen = $this->db->query("SELECT count(id_dosen) as jumlah_data from dosen ")->getRow();
        $query_jumlah_user = $this->db->query("SELECT count(id_user) as jumlah_data from user ")->getRow();

        $query_dt_terakhir_jadwalkuliah = $this->db->query("SELECT * from jadwal_kuliah order by id_jadwalkuliah DESC")->getRow();
        $query_dt_terakhir_mahasiswa = $this->db->query("SELECT * from mahasiswa order by id_mahasiswa DESC")->getRow();
        $query_dt_terakhir_dosen = $this->db->query("SELECT * from dosen order by id_dosen DESC")->getRow();
        $query_dt_terakhir_user = $this->db->query("SELECT * from user order by id_user DESC")->getRow();

        $data['content']        = 'hal-c-beranda';
        $data['judul']          = 'Rekayasa Web (Aplikasi UAS)';
        $data['sub_judul']      = 'Selamat datang di halaman beranda';
        $data['jumlah_data_jadwalkuliah']   = $query_jumlah_jadwalkuliah->jumlah_data;
        $data['jumlah_data_mahasiswa']      = $query_jumlah_mahasiswa->jumlah_data;
        $data['jumlah_data_dosen']          = $query_jumlah_dosen->jumlah_data;
        $data['jumlah_data_user']           = $query_jumlah_user->jumlah_data;
        $data['dt_terakhir_jadwalkuliah']   = $query_dt_terakhir_jadwalkuliah->tempat_kuliah.', '.$query_dt_terakhir_jadwalkuliah->hari_kuliah.' ('.$query_dt_terakhir_jadwalkuliah->jam_kuliah.')';
        $data['dt_terakhir_mahasiswa']      = $query_dt_terakhir_mahasiswa->nama_mahasiswa;
        $data['dt_terakhir_dosen']          = $query_dt_terakhir_dosen->nama_dosen;
        $data['dt_terakhir_user']           = $query_dt_terakhir_user->username;
        
        echo view('_applayout', $data);
    }

}