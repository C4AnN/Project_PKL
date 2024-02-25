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

    .table .informasi {
        border: 1px solid #e9ecef;
        /* Garis tepi sel pada tabel */
        padding: 8px;
        /* Ruang dalam sel pada tabel */
        text-align: center;
        /* Posisi teks di tengah sel */
    }
</style>

<div class="row">
    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header bg-black text-white"><b>Tabel Data (Revisi Plat)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Informasi</th>
                            <th>Gambar Perbaikan</th>
                            <th>Keterangan Gambar</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_revisi as $revisi) { ?>
                            <tr>
                                <td class="informasi"><?= $no++ ?></td>
                                <td>
                                    <b>Nomor Plat : </b><?= $revisi['nomor_plat'] ?>
                                    <hr style="margin : 0">
                                    <b>Nomor PP : </b><?= $revisi['nomor_customer'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama Customer : </b><?= $revisi['nama_customer'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama Cetakan : </b>
                                    <hr style="margin : 0">
                                    <?= $revisi['nama_produk'] ?>
                                    <hr style="margin : 0">
                                    <b>Ukuran Cetakan : </b><?= $revisi['size_cetakan'] ?>
                                    <hr style="margin : 0">
                                    <b>Warna Plat : </b><?= $revisi['warna_plat'] ?>
                                    <hr style="margin : 0">
                                    <b>Tgl. Revisi : </b><?= date('d-F-Y', strtotime($revisi['tgl_revisi'])) ?>
                                    <hr style="margin : 0">
                                    <b>Nama Mesin : </b><?= $revisi['nama_mesin'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama Perevisi : </b><?= $revisi['nama_pengguna'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama Mandor : </b><?= $revisi['nama_mandor'] ?>
                                </td>
                                <td class="informasi">
                                    <img src="<?= base_url() . '/public/foto-revisi/' . $revisi['file_perbaikan'] ?>" height="100%" width="90px" style="border: 2.5px solid grey;">
                                </td>
                                <td><?= $revisi['keterangan'] ?></td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a href="<?= base_url('data_revisi/download/' . $revisi['file_perbaikan']) ?>" class="btn btn-sm btn-info"><i class="fa fa-download"></i> Gambar</a>
                                        <div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header bg-dark text-white "><b>Form (Konfirmasi Revisi Plat)</b></div>
            <div class="card-body ">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('konfirmasi_revisi/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_konfirmasi_revisi" value="<?= $id_konfirmasi_revisi ?>">

                    <div class="row mb-2">
                        <label class="col-4">Data Revisi</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_revisi" required>
                                <?php if (!empty($detail_konfirmasi_revisi->id_revisi)) { ?>
                                    <option value="<?= $detail_konfirmasi_revisi->id_revisi ?>"><?= $detail_konfirmasi_revisi->nomor_plat . ' - ' . $detail_konfirmasi_revisi->warna_plat . ' - ' . $detail_konfirmasi_revisi->tgl_revisi ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_revisi as $revisi) { ?>
                                    <option value="<?= $revisi['id_revisi'] ?>"><?= $revisi['nomor_plat'] . ' - ' . $revisi['warna_plat'] . ' - ' . $revisi['tgl_revisi'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Mesin</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_mesin" required>
                                <?php if (!empty($detail_konfirmasi_revisi->id_mesin)) { ?>
                                    <option value="<?= $detail_konfirmasi_revisi->id_mesin ?>"><?= $detail_konfirmasi_revisi->nama_mesin . ' - ' . $detail_konfirmasi_revisi->bagian ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_mesin as $mesin) { ?>
                                    <option value="<?= $mesin['id_mesin'] ?>"><?= $mesin['nama_mesin'] . ' - ' . $mesin['bagian'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Customer</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_customer" required>
                                <?php if (!empty($detail_konfirmasi_revisi->id_customer)) { ?>
                                    <option value="<?= $detail_konfirmasi_revisi->id_customer ?>"><?= $detail_konfirmasi_revisi->nomor_customer . ' - ' . $detail_konfirmasi_revisi->nama_customer . ' - ' . $detail_konfirmasi_revisi->nama_produk ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_customer as $customer) { ?>
                                    <option value="<?= $customer['id_customer'] ?>"><?= $customer['nomor_customer'] . ' - ' . $customer['nama_customer'] . ' - ' . $customer['nama_produk'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Konfirmasi Revisi</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_konfirmasi" required>
                                <?php if (!empty($detail_konfirmasi_revisi->konfirmasi)) { ?>
                                    <option value="<?= $detail_konfirmasi_revisi->konfirmasi ?>"><?= $detail_konfirmasi_revisi->konfirmasi ?></option>
                                <?php } ?>
                                <option value=""> -- Silahkan Konfirmasi Revisi --</option>
                                <option value="Selesai Diproses">Selesai Diproses</option>
                            </select>
                        </div>
                    </div>
                    <!-- Button atau tombol -->
                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Kirim Konfirmasi</button>

                </form>
            </div>
        </div>
    </div>



</div>