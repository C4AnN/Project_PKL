<?php

namespace App\Models;

use CodeIgniter\Model;

class crud extends Model
{
    //--------------------------------------- Validasi agar data tidak sama --------------------------------------------- 

    //--------------------------------------- Start Validasi agar data tidak sama data mesin --------------------------------------------- 

    protected $table = 'data_mesin';

    public function cekNamaMesinExist($nama_mesin, $id_mesin)
    {
        $builder = $this->db->table($this->table);
        $builder->where('nama_mesin', $nama_mesin);
        $builder->where('id_mesin !=', $id_mesin); // Untuk memastikan tidak membandingkan dengan dirinya sendiri jika ini adalah edit data
        return $builder->countAllResults() > 0;
    }

    //--------------------------------------- End Validasi agar data tidak sama data mesin --------------------------------------------- 

    //--------------------------------------- Start Validasi agar data tidak sama data mandor --------------------------------------------- 

    protected $tabel = 'data_mandor';

    public function cekNikExist($nik, $id_mandor)
    {
        $builder = $this->db->table($this->tabel);
        $builder->where('nik', $nik);
        $builder->where('id_mandor !=', $id_mandor); // Untuk memastikan tidak membandingkan dengan dirinya sendiri jika ini adalah edit data
        return $builder->countAllResults() > 0;
    }

    public function cekNamaMandorExist($nama_mandor, $id_mandor)
    {
        $builder = $this->db->table($this->tabel);
        $builder->where('nama_mandor', $nama_mandor);
        $builder->where('id_mandor !=', $id_mandor); // Untuk memastikan tidak membandingkan dengan dirinya sendiri jika ini adalah edit data
        return $builder->countAllResults() > 0;
    }

    //--------------------------------------- End Validasi agar data tidak sama data mandor --------------------------------------------- 
    //--------------------------------------- Start Validasi agar data tidak sama data admin --------------------------------------------- 

    protected $tabel10 = 'data_admin';

    public function cekNikAdminExist($nik_admin, $id_admin)
    {
        $builder = $this->db->table($this->tabel10);
        $builder->where('nik_admin', $nik_admin);
        $builder->where('id_admin !=', $id_admin); // Untuk memastikan tidak membandingkan dengan dirinya sendiri jika ini adalah edit data
        return $builder->countAllResults() > 0;
    }

    //--------------------------------------- End Validasi agar data tidak sama data admin --------------------------------------------- 
    //--------------------------------------- Start Validasi agar data tidak sama data pengguna --------------------------------------------- 

    protected $tabel11 = 'data_pengguna';

    public function cekNikPenggunaExist($nik_pengguna, $id_pengguna)
    {
        $builder = $this->db->table($this->tabel11);
        $builder->where('nik_pengguna', $nik_pengguna);
        $builder->where('id_pengguna !=', $id_pengguna); // Untuk memastikan tidak membandingkan dengan dirinya sendiri jika ini adalah edit data
        return $builder->countAllResults() > 0;
    }

    //--------------------------------------- End Validasi agar data tidak sama data pengguna --------------------------------------------- 

    //--------------------------------------- Start Validasi agar data tidak sama data customer --------------------------------------------- 

    protected $tabel2 = 'data_customer';

    public function cekNomorCustomerExist($nomor_customer, $id_customer)
    {
        $builder = $this->db->table($this->tabel2);
        $builder->where('nomor_customer', $nomor_customer);
        $builder->where('id_customer !=', $id_customer); // Untuk memastikan tidak membandingkan dengan dirinya sendiri jika ini adalah edit data
        return $builder->countAllResults() > 0;
    }


    //--------------------------------------- End Validasi agar data tidak sama data customer--------------------------------------------- 

    //--------------------------------------- Start Validasi agar data tidak sama user --------------------------------------------- 

    protected $tabel4 = 'user';

    public function cekUsernameExist($username, $id_user)
    {
        $builder = $this->db->table($this->tabel4);
        $builder->where('username', $username);
        $builder->where('id_user !=', $id_user); // Untuk memastikan tidak membandingkan dengan dirinya sendiri jika ini adalah edit data
        return $builder->countAllResults() > 0;
    }

    public function cekNamaUserExist($nama_user, $id_user)
    {
        $builder = $this->db->table($this->tabel4);
        $builder->where('nama_user', $nama_user);
        $builder->where('id_user !=', $id_user); // Untuk memastikan tidak membandingkan dengan dirinya sendiri jika ini adalah edit data
        return $builder->countAllResults() > 0;
    }

    //--------------------------------------- End Validasi agar data tidak sama user--------------------------------------------- 

    //--------------------------------------- create atau simpan data baru --------------------------------------------- 
    public function simpanuser($data)
    {
        return $this->db->table('user')->insert($data);
    }

    public function simpanmesin($data)
    {
        return $this->db->table('data_mesin')->insert($data);
    }

    public function simpanmandor($data)
    {
        return $this->db->table('data_mandor')->insert($data);
    }

    public function simpanadmin($data)
    {
        return $this->db->table('data_admin')->insert($data);
    }

    public function simpanpengguna($data)
    {
        return $this->db->table('data_pengguna')->insert($data);
    }

    public function simpancustomer($data)
    {
        return $this->db->table('data_customer')->insert($data);
    }

    public function simpanplat($data)
    {
        return $this->db->table('data_plat')->insert($data);
    }

    public function simpanrevisi($data)
    {
        return $this->db->table('revisi_plat')->insert($data);
    }

    public function simpanorder($data)
    {
        return $this->db->table('order_plat')->insert($data);
    }

    public function simpankonfirmasi($data)
    {
        return $this->db->table('konfirmasi_plat')->insert($data);
    }

    public function simpankonfirmasirevisi($data)
    {
        return $this->db->table('konfirmasi_revisi')->insert($data);
    }

    //--------------------------------------------- read atau tampil data --------------------------------------------- 

    public function tampiluser()
    {
        return $this->db->table('user')->select('*')->orderBy('id_user', 'Desc')->get()->getResultArray();
    }
    public function tampilmesin()
    {
        return $this->db->table('data_mesin')->select('*')->orderBy('id_mesin', 'Desc')->get()->getResultArray();
    }

    public function tampilmandor()
    {
        return $this->db->table('data_mandor')->select('*')->orderBy('id_mandor', 'Desc')->get()->getResultArray();
    }

    public function tampilpengguna()
    {
        return $this->db->query("SELECT * FROM data_pengguna, data_mandor, data_mesin where data_pengguna.id_mandor = data_mandor.id_mandor and data_pengguna.id_mesin = data_mesin.id_mesin ORDER BY id_pengguna DESC ")->getResultArray();
    }

    public function tampiladmin()
    {
        return $this->db->query("SELECT * FROM data_admin, data_mandor where data_admin.id_mandor = data_mandor.id_mandor ORDER BY id_admin DESC ")->getResultArray();
    }

    public function tampilcustomer()
    {
        return $this->db->query("SELECT * FROM data_customer, data_mesin where data_customer.id_mesin = data_mesin.id_mesin ORDER BY id_customer DESC ")->getResultArray();
    }

    // public function tampilcustomer()
    // {
    //     return $this->db->table('data_customer')->select('*')->orderBy('id_customer', 'Desc')->get()->getResultArray();
    // }

    public function tampilplat()
    {
        return $this->db->query("SELECT * FROM data_plat, data_customer where data_plat.id_customer = data_customer.id_customer ORDER BY id_plat DESC ")->getResultArray();
    }

    public function tampilrevisi()
    {
        return $this->db->query("SELECT * FROM revisi_plat, data_customer, data_mesin, data_pengguna, data_mandor where revisi_plat.id_customer = data_customer.id_customer 
         and revisi_plat.id_mesin = data_mesin.id_mesin and revisi_plat.id_pengguna = data_pengguna.id_pengguna and revisi_plat.id_mandor = data_mandor.id_mandor ORDER BY id_revisi DESC ")->getResultArray();
    }

    public function tampilorder()
    {
        return $this->db->query("SELECT * FROM order_plat, data_customer, data_mesin, data_pengguna, data_mandor where order_plat.id_customer = data_customer.id_customer 
         and order_plat.id_mesin = data_mesin.id_mesin and order_plat.id_pengguna = data_pengguna.id_pengguna and order_plat.id_mandor = data_mandor.id_mandor ORDER BY id_order DESC ")->getResultArray();
    }

    public function tampilkonfirmasi()
    {
        return $this->db->query("SELECT * FROM konfirmasi_plat, order_plat, data_mesin, data_customer where konfirmasi_plat.id_order = order_plat.id_order and konfirmasi_plat.id_mesin = data_mesin.id_mesin
        and konfirmasi_plat.id_customer = data_customer.id_customer  ORDER BY id_konfirmasi DESC ")->getResultArray();
    }

    public function tampilkonfirmasirevisi()
    {
        return $this->db->query("SELECT * FROM konfirmasi_revisi, revisi_plat, data_mesin, data_customer where konfirmasi_revisi.id_revisi = revisi_plat.id_revisi and konfirmasi_revisi.id_mesin = data_mesin.id_mesin
        and konfirmasi_revisi.id_customer = data_customer.id_customer ORDER BY id_konfirmasi_revisi DESC ")->getResultArray();
    }


    public function tampiljadwalkuliah()
    {
        return $this->db->query("SELECT * FROM jadwal_kuliah, mahasiswa, dosen where jadwal_kuliah.id_mahasiswa = mahasiswa.id_mahasiswa and jadwal_kuliah.id_dosen = dosen.id_dosen ORDER BY id_jadwalkuliah DESC ")->getResultArray();
    }



    //--------------------------------------------- read atau detail data --------------------------------------------- 

    public function detailuser($id_user)
    {
        return $this->db->query("SELECT * FROM user where id_user = '$id_user' ")->getRow();
    }
    public function detailmesin($id_mesin)
    {
        return $this->db->query("SELECT * FROM data_mesin where id_mesin = '$id_mesin' ")->getRow();
    }

    public function detailmandor($id_mandor)
    {
        return $this->db->query("SELECT * FROM data_mandor where id_mandor = '$id_mandor' ")->getRow();
    }

    public function detailadmin($id_admin)
    {
        return $this->db->query("SELECT * FROM data_admin, data_mandor where data_admin.id_mandor = data_mandor.id_mandor and id_admin = '$id_admin' ")->getRow();
    }

    public function detailpengguna($id_pengguna)
    {
        return $this->db->query("SELECT * FROM data_pengguna, data_mandor, data_mesin where data_pengguna.id_mandor = data_mandor.id_mandor and data_pengguna.id_mesin = data_mesin.id_mesin and id_pengguna = '$id_pengguna' ")->getRow();
    }

    // public function detailcustomer($id_customer)
    // {
    //     return $this->db->query("SELECT * FROM data_customer where id_customer = '$id_customer' ")->getRow();
    // }

    
    public function detailcustomer($id_customer)
    {
        return $this->db->query("SELECT * FROM data_customer, data_mesin where data_customer.id_mesin = data_mesin.id_mesin and id_customer = '$id_customer' ")->getRow();
    }

    public function detailplat($id_plat)
    {
        return $this->db->query("SELECT * FROM data_plat, data_customer where data_plat.id_customer = data_customer.id_customer and id_plat = '$id_plat' ")->getRow();
    }

    public function detailrevisi($id_revisi)
    {
        return $this->db->query("SELECT * FROM revisi_plat, data_customer, data_mesin, data_pengguna, data_mandor where  revisi_plat.id_customer = data_customer.id_customer 
         and revisi_plat.id_mesin = data_mesin.id_mesin and revisi_plat.id_pengguna = data_pengguna.id_pengguna and revisi_plat.id_mandor = data_mandor.id_mandor = '$id_revisi' ")->getRow();
    }

    public function detailorder($id_order)
    {
        return $this->db->query("SELECT * FROM order_plat, data_customer, data_mesin, data_pengguna, data_mandor where  order_plat.id_customer = data_customer.id_customer 
         and order_plat.id_mesin = data_mesin.id_mesin and order_plat.id_pengguna = data_pengguna.id_pengguna and order_plat.id_mandor = data_mandor.id_mandor = '$id_order' ")->getRow();
    }

    public function detailkonfirmasi($id_konfirmasi)
    {
        return $this->db->query("SELECT * FROM konfirmasi_plat, order_plat, data_mesin, data_customer where konfirmasi_plat.id_order = order_plat.id_order and konfirmasi_plat.id_mesin = data_mesin.id_mesin
        and konfirmasi_plat.id_customer = data_customer.id_customer = '$id_konfirmasi' ")->getRow();
    }

    public function detailkonfirmasirevisi($id_konfirmasi_revisi)
    {
        return $this->db->query("SELECT * FROM konfirmasi_revisi, revisi_plat, data_mesin, data_customer where konfirmasi_revisi.id_revisi = revisi_plat.id_revisi and konfirmasi_revisi.id_mesin = data_mesin.id_mesin
        and konfirmasi_revisi.id_customer = data_customer.id_customer  = '$id_konfirmasi_revisi' ")->getRow();
    }

    //--------------------------------------------- update atau ubah data --------------------------------------------- 
    public function ubahuser($data, $id_user)
    {
        return $this->db->table('user')->update($data, array('id_user' => $id_user));
    }

    public function ubahmesin($data, $id_mesin)
    {
        return $this->db->table('data_mesin')->update($data, array('id_mesin' => $id_mesin));
    }

    public function ubahmandor($data, $id_mandor)
    {
        return $this->db->table('data_mandor')->update($data, array('id_mandor' => $id_mandor));
    }

    public function ubahadmin($data, $id_admin)
    {
        return $this->db->table('data_admin')->update($data, array('id_admin' => $id_admin));
    }

    public function ubahpengguna($data, $id_pengguna)
    {
        return $this->db->table('data_pengguna')->update($data, array('id_pengguna' => $id_pengguna));
    }

    public function ubahcustomer($data, $id_customer)
    {
        return $this->db->table('data_customer')->update($data, array('id_customer' => $id_customer));
    }

    public function ubahplat($data, $id_plat)
    {
        return $this->db->table('data_plat')->update($data, array('id_plat' => $id_plat));
    }

    public function ubahrevisi($data, $id_revisi)
    {
        return $this->db->table('revisi_plat')->update($data, array('id_revisi' => $id_revisi));
    }

    public function ubahorder($data, $id_order)
    {
        return $this->db->table('order_plat')->update($data, array('id_order' => $id_order));
    }

    public function ubahkonfirmasi($data, $id_konfirmasi)
    {
        return $this->db->table('konfirmasi_plat')->update($data, array('id_konfirmasi' => $id_konfirmasi));
    }

    public function ubahkonfirmasirevisi($data, $id_konfirmasi_revisi)
    {
        return $this->db->table('konfirmasi_revisi')->update($data, array('id_konfirmasi_revisi' => $id_konfirmasi_revisi));
    }

    //--------------------------------------------- delete atau hapus data --------------------------------------------- 
    public function hapususer($id_user)
    {
        return $this->db->table('user')->delete(array('id_user' => $id_user));
    }

    public function hapusmesin($id_mesin)
    {
        return $this->db->table('data_mesin')->delete(array('id_mesin' => $id_mesin));
    }

    public function hapusmandor($id_mandor)
    {
        return $this->db->table('data_mandor')->delete(array('id_mandor' => $id_mandor));
    }

    public function hapusadmin($id_admin)
    {
        return $this->db->table('data_admin')->delete(array('id_admin' => $id_admin));
    }

    public function hapuspengguna($id_pengguna)
    {
        return $this->db->table('data_pengguna')->delete(array('id_pengguna' => $id_pengguna));
    }

    public function hapuscustomer($id_customer)
    {
        return $this->db->table('data_customer')->delete(array('id_customer' => $id_customer));
    }

    public function hapusplat($id_plat)
    {
        return $this->db->table('data_plat')->delete(array('id_plat' => $id_plat));
    }

    public function hapusrevisi($id_revisi)
    {
        return $this->db->table('revisi_plat')->delete(array('id_revisi' => $id_revisi));
    }

    public function hapusorder($id_order)
    {
        return $this->db->table('order_plat')->delete(array('id_order' => $id_order));
    }

    public function hapuskonfirmasi($id_konfirmasi)
    {
        return $this->db->table('konfirmasi_plat')->delete(array('id_konfirmasi' => $id_konfirmasi));
    }

    public function hapuskonfirmasirevisi($id_konfirmasi_revisi)
    {
        return $this->db->table('konfirmasi_revisi')->delete(array('id_konfirmasi_revisi' => $id_konfirmasi_revisi));
    }
}
