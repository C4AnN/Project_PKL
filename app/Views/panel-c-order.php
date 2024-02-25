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

    <div class="col-md-8 mb-4">
        <div class="card">
            <div class="card-header bg-black text-white"><b>Tabel Data (Panel Order Plat)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Plat</th>
                            <th>Nama Customer</th>
                            <th>Informasi</th>
                            <th>Keterangan Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_order as $order) { ?>
                            <tr>
                                <td class="nomor"><?= $no++ ?></td>
                                <td><?= $order['nomor_plat'] ?></td>
                                <td><?= $order['nama_customer'] ?></td>
                                <td>
                                    <b>Nomor PP : </b><?= $order['nomor_customer'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama Cetakan : </b><?= $order['nama_produk'] ?>
                                    <hr style="margin : 0">
                                    <b>Ukuran Cetakan : </b><?= $order['size_cetakan'] ?>
                                    <hr style="margin : 0">
                                    <b>Warna Plat : </b><?= $order['warna_plat'] ?>
                                    <hr style="margin : 0">
                                    <b>Tanggal Order : </b><?= date('d-F-Y', strtotime($order['tgl_orderplat'])) ?>
                                    <hr style="margin : 0">
                                    <b>Nama Mesin : </b><?= $order['nama_mesin'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama Pengorder : </b><?= $order['nama_pengguna'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama Mandor : </b><?= $order['nama_mandor'] ?>
                                </td>
                                <td><?= $order['keterangan'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="card-header bg-dark text-white "><b>Form (Konfirmasi Order Plat)</b></div>
            <div class="card-body ">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('data_konfirmasi/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_konfirmasi" value="<?= $id_konfirmasi ?>">

                    <div class="row mb-2">
                        <label class="col-4">Data Order</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_order" required>
                                <?php if (!empty($detail_konfirmasi->id_order)) { ?>
                                    <option value="<?= $detail_konfirmasi->id_order ?>"><?= $detail_konfirmasi->nomor_plat . ' - ' . $detail_konfirmasi->warna_plat . ' - ' . $detail_konfirmasi->tgl_orderplat ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_order as $order) { ?>
                                    <option value="<?= $order['id_order'] ?>"><?= $order['nomor_plat'] . ' - ' . $order['warna_plat'] . ' - ' . $order['tgl_orderplat'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Mesin</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_mesin" required>
                                <?php if (!empty($detail_konfirmasi->id_mesin)) { ?>
                                    <option value="<?= $detail_konfirmasi->id_mesin ?>"><?= $detail_konfirmasi->nama_mesin . ' - ' . $detail_konfirmasi->bagian ?></option>
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
                                <?php if (!empty($detail_konfirmasi->id_customer)) { ?>
                                    <option value="<?= $detail_konfirmasi->id_customer ?>"><?= $detail_konfirmasi->nomor_customer. ' - ' . $detail_konfirmasi->nama_customer. ' - ' . $detail_konfirmasi->nama_produk ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_customer as $customer) { ?>
                                    <option value="<?= $customer['id_customer'] ?>"><?= $customer['nomor_customer']. ' - ' . $customer['nama_customer']. ' - ' . $customer['nama_produk'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Konfirmasi Order</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_konfirmasi" required>
                                <?php if (!empty($detail_konfirmasi->konfirmasi)) { ?>
                                    <option value="<?= $detail_konfirmasi->konfirmasi ?>"><?= $detail_konfirmasi->konfirmasi ?></option>
                                <?php } ?>
                                <option value=""> -- Silahkan Konfirmasi Order --</option>
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