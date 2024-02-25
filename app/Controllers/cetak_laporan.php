<?php

namespace App\Controllers;

use CodeIgniter\Controllers;
use App\Models\crud;

class cetak_laporan extends BaseController
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
        $data['content_admin']        = 'data-c-cetak-laporan';
        echo view('layout', $data);
    }


    public function laporancetakorder()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_mulai   = $this->request->getPost('inputan_tgl_mulai');
        $tgl_selesai = $this->request->getPost('inputan_tgl_selesai');

        $data = [
            'data_cetak_order' => $this->db->query("SELECT * FROM konfirmasi_plat, order_plat, data_mesin, data_customer where konfirmasi_plat.id_order = order_plat.id_order and konfirmasi_plat.id_mesin = data_mesin.id_mesin and konfirmasi_plat.id_customer = data_customer.id_customer  and tgl_orderplat between '$tgl_mulai' and '$tgl_selesai' ORDER BY id_konfirmasi DESC ")->getResultArray(),
            'tanggal_cetak_order'     => date('d-m-Y'),
        ];
        echo view('cetak_laporan_plat_order', $data);
    }
    public function laporancetakrevisi()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl_mulai   = $this->request->getPost('inputan_tgl_mulai');
        $tgl_selesai = $this->request->getPost('inputan_tgl_selesai');

        $data = [
            'data_cetak_revisi' => $this->db->query("SELECT * FROM konfirmasi_revisi, revisi_plat, data_mesin, data_customer where konfirmasi_revisi.id_revisi = revisi_plat.id_revisi and konfirmasi_revisi.id_mesin = data_mesin.id_mesin and konfirmasi_revisi.id_customer = data_customer.id_customer  and tgl_revisi between '$tgl_mulai' and '$tgl_selesai' ORDER BY id_konfirmasi_revisi DESC ")->getResultArray(),
            'tanggal_cetak'     => date('d-m-Y'),
        ];
        echo view('cetak_laporan_plat_revisi', $data);
    }
}
