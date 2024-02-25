<style>
    /* Gaya untuk card */
    .card {
        border: 1px solid #dee2e6;
        /* Garis tepi card */
        border-radius: 10px;
        /* Sudut melengkung pada card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Efek bayangan pada card */
        transition: transform 0.3s ease-in-out;
        /* Efek transisi saat hover */
    }

    .card:hover {
        transform: scale(1.02);
        /* Membesar saat dihover */
    }

    /* Gaya untuk card header */
    .card-header {
        background-color: #343a40;
        /* Warna latar belakang card header */
        color: white;
        /* Warna teks pada card header */
        border-radius: 10px 10px 0 0;
        /* Sudut melengkung pada card header (hanya sudut atas) */
    }

    /* Gaya untuk form input */
    .form-control {
        border: 1px solid #ced4da;
        /* Garis tepi input */
        border-radius: 5px;
        /* Sudut melengkung pada input */
        transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        /* Efek transisi pada input */
    }

    .form-control:focus {
        border-color: #007bff;
        /* Warna garis tepi input saat fokus */
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        /* Efek bayangan saat fokus */
    }

    /* Gaya untuk tombol */
    .btn {
        border-radius: 5px;
        /* Sudut melengkung pada tombol */
        transition: transform 0.3s ease-in-out;
        /* Efek transisi pada tombol */
    }

    .btn:hover {
        transform: translateY(-2px);
        /* Menggeser tombol sedikit ke atas saat dihover */
    }

    /* Gaya untuk tabel */
    .table {
        border: 1px solid #e9ecef;
        /* Garis tepi tabel */
        border-radius: 10px;
        /* Sudut melengkung pada tabel */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Efek bayangan pada tabel */
    }

    .table td {
        border: 1px solid #e9ecef;
        /* Garis tepi sel pada tabel */
        padding: 8px;
        /* Ruang dalam sel pada tabel */
        text-align: left;
        /* Posisi teks di tengah sel */
    }

    .table .nomor {
        border: 1px solid #e9ecef;
        /* Garis tepi sel pada tabel */
        padding: 8px;
        /* Ruang dalam sel pada tabel */
        text-align: center;
        /* Posisi teks di tengah sel */
    }
</style>

<div class="row">
    <div class="col-md-5 mb-4">
        <div class="card">
            <div class="card-header bg-dark text-white"><b>Form Entri (Order Customer)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('data_customer/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_customer" value="<?= $id_customer ?>">

                    <div class="row mb-2">
                        <label class="col-4">Nomor PP</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nomor_customer" required value="<?= $detail_customer->nomor_customer ?>" placeholder="Masukkan Nomor PP">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Customer</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nama_customer" required value="<?= $detail_customer->nama_customer ?>" placeholder="Masukkan Nama Customer">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Produk</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_produk" required value="<?= $detail_customer->nama_produk ?>" placeholder="Masukkan Nama Produk ">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Warna Produk</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_warna" required value="<?= $detail_customer->ketentuan_warna ?>" placeholder="Masukkan Spesifikasi Warna Produk">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Ukuran Produk</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_size" required value="<?= $detail_customer->size_cetakan ?>" placeholder="Masukkan Spesifikasi Ukuran Cetakan">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Mesin</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_mesin" required>
                                <?php if (!empty($detail_plat->id_mesin)) { ?>
                                    <option value="<?= $detail_plat->id_mesin ?>"><?= $detail_plat->nama_mesin . ' - ' . $detail_plat->area_cetak . ' - ' . $detail_plat->jumlah_warna ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_mesin as $mesin) { ?>
                                    <option value="<?= $mesin['id_mesin'] ?>"><?= $mesin['nama_mesin'] . ' | size :  ' . $mesin['area_cetak'] . ' | Jumlah : ' . $mesin['jumlah_warna'] . ' warna' ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <!-- Button atau tombol -->

                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('data_customer') ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-dark text-white"><b>Tabel Data (Order Customer)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor PP</th>
                            <th>Nama Customer</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_customer as $customer) { ?>
                            <tr style="font-size: smaller;">
                                <td class="nomor"><?= $no++ ?></td>
                                <td><?= $customer['nomor_customer'] ?></td>
                                <td>
                                    <b>Nama Customer : </b><?= $customer['nama_customer'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama Produk : </b><?= $customer['nama_produk'] ?>
                                    <hr style="margin : 0">
                                    <b>Spesifikasi Warna Produk : </b><?= $customer['ketentuan_warna'] ?>
                                    <hr style="margin : 0">
                                    <b>Spesifikasi Ukuran Produk : </b><?= $customer['size_cetakan'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama Mesin : </b><?= $customer['nama_mesin'] . ' | Area Cetak : ' . $customer['area_cetak'] . ' | Jumlah Warna : ' . $customer['jumlah_warna'] ?>
                                    <hr style="margin : 0">
                                </td>

                                <td>
                                    <div class="d-flex flex-column">
                                        <a href="<?= base_url('data_customer/detaildata/' . $customer['id_customer']) ?>" class="btn btn-success btn-sm mb-2"><i class="fa fa-edit"></i> Edit</a>
                                        <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('data_customer/hapusdata/' . $customer['id_customer']) ?>" class="btn btn-sm btn-danger mb-2"><i class="fa fa-trash"></i> Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>