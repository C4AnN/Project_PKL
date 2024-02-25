<?php
namespace App\Controllers;
use CodeIgniter\Controllers;

class berandaUser extends BaseController
{
    public function __construct()
    {
        //membuat variabel koneksi database untuk menggunakan query manual/custom
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // $data['content']        = 'data-c-beranda';
        // echo view('layout', $data);
        $query_jumlah_mesin = $this->db->query("SELECT count(id_mesin) as jumlah_data from data_mesin ")->getRow();
        $query_jumlah_mandor = $this->db->query("SELECT count(id_mandor) as jumlah_data from data_mandor ")->getRow();
        $query_jumlah_user = $this->db->query("SELECT count(id_user) as jumlah_data from user ")->getRow();
        $query_jumlah_customer = $this->db->query("SELECT count(id_customer) as jumlah_data from data_customer ")->getRow();
        $query_jumlah_plat = $this->db->query("SELECT count(id_plat) as jumlah_data from data_plat ")->getRow();
        $query_jumlah_revisi = $this->db->query("SELECT count(id_revisi) as jumlah_data from revisi_plat ")->getRow();
        $query_jumlah_order = $this->db->query("SELECT count(id_order) as jumlah_data from order_plat ")->getRow();

        $query_dt_terakhir_mesin = $this->db->query("SELECT * from data_mesin order by id_mesin DESC")->getRow();
        $query_dt_terakhir_mandor = $this->db->query("SELECT * from data_mandor order by id_mandor DESC")->getRow();
        $query_dt_terakhir_user = $this->db->query("SELECT * from user order by id_user DESC")->getRow();
        $query_dt_terakhir_customer = $this->db->query("SELECT * from data_customer order by id_customer DESC")->getRow();
        $query_dt_terakhir_plat = $this->db->query("SELECT * from data_plat order by id_plat DESC")->getRow();
        $query_dt_terakhir_revisi = $this->db->query("SELECT * from revisi_plat order by id_revisi DESC")->getRow();
        $query_dt_terakhir_order = $this->db->query("SELECT * from order_plat order by id_order DESC")->getRow();

        $data['content_user']        = 'data-c-beranda-user';
        
        $data['jumlah_data_mesin']              = $query_jumlah_mesin->jumlah_data;
        $data['jumlah_data_mandor']             = $query_jumlah_mandor->jumlah_data;
        $data['jumlah_data_user']               = $query_jumlah_user->jumlah_data;
        $data['jumlah_data_customer']          = $query_jumlah_customer->jumlah_data;
        $data['jumlah_data_plat']               = $query_jumlah_plat->jumlah_data;
        $data['jumlah_data_revisi']               = $query_jumlah_revisi->jumlah_data;
        $data['jumlah_data_order']               = $query_jumlah_order->jumlah_data;

        $data['dt_terakhir_mesin']              = 'Mesin : ' . $query_dt_terakhir_mesin->nama_mesin . ' || Warna : ' . $query_dt_terakhir_mesin->jumlah_warna . ' || Bagian : ' . $query_dt_terakhir_mesin->bagian;
        $data['dt_terakhir_mandor']             = 'NIK : ' . $query_dt_terakhir_mandor->nik . ' || Nama : ' . $query_dt_terakhir_mandor->nama_mandor . ' || Bagian : ' . $query_dt_terakhir_mandor->bagian_mandor;
        $data['dt_terakhir_user']               =  'NIK : ' . $query_dt_terakhir_user->nik_user . ' || Nama : ' . $query_dt_terakhir_user->nama_user . ' || Bagian : ' . $query_dt_terakhir_user->bagian_user;
        $data['dt_terakhir_customer']          = 'Nomor PP : ' . $query_dt_terakhir_customer->nomor_customer . ' || Customer : ' . $query_dt_terakhir_customer->nama_customer;
        $data['dt_terakhir_plat']             = 'No. Plat : ' .$query_dt_terakhir_plat->nomor_plat . ' || Tgl. Order : ' . $query_dt_terakhir_plat->tgl_order;
        $data['dt_terakhir_revisi']             = 'No : ' .$query_dt_terakhir_revisi->nomor_plat . ' || Warna : ' .$query_dt_terakhir_revisi->warna_plat. ' || ' . $query_dt_terakhir_revisi->tgl_revisi;
        $data['dt_terakhir_order']             = 'No : ' .$query_dt_terakhir_order->nomor_plat . ' || Warna : ' . $query_dt_terakhir_order->warna_plat . ' || ' . $query_dt_terakhir_order->tgl_orderplat ;

        
        echo view('layout', $data);
    }
}

