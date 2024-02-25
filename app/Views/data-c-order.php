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
</style>

<div class="row">
    <div class="col-md-12 d-flex justify-content-center align-items-center">
        <div class="card col-6">
            <div class="card-header bg-dark text-white "><b>Form (Order Plat)</b></div>
            <div class="card-body ">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('data_order/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_order" value="<?= $id_order ?>">

                    <div class="row mb-2">
                        <label class="col-4">Nomor Plat</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nomor_plat" required value="<?= $detail_order->nomor_plat ?>" placeholder="Masukkan nomor plat">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Customer</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_customer" required>
                                <?php if (!empty($detail_order->id_customer)) { ?>
                                    <option value="<?= $detail_order->id_customer ?>"><?= $detail_order->nomor_customer. ' - ' . $detail_order->nama_customer . ' - ' . $detail_order->nama_produk ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_customer as $customer) { ?>
                                    <option value="<?= $customer['id_customer'] ?>"><?= $customer['nomor_customer']. ' - ' . $customer['nama_customer'] . ' - ' . $customer['nama_produk']?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Produk</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_Nama_Cetakan2" required>
                                <?php if (!empty($detail_order->id_customer)) { ?>
                                    <option value="<?= $detail_order->id_customer ?>"><?= $detail_order->nomor_customer . ' - ' . $detail_order->nama_produk ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_customer as $customer) { ?>
                                    <option value="<?= $customer['id_customer'] ?>"><?= $customer['nomor_customer'].' - '.$customer['nama_produk'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Warna Plat</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_warna_plat" required value="<?= $detail_order->warna_plat ?>" placeholder="Masukkan warna plat">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Tgl. Order</label>
                        <div class="col-8">
                            <input class="form-control" type="date" name="inputan_tgl_orderplat" required value="<?= $detail_order->tgl_orderplat ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Mesin</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_mesin" required>
                                <?php if (!empty($detail_order->id_mesin)) { ?>
                                    <option value="<?= $detail_order->id_mesin ?>"><?= $detail_order->nama_mesin . ' - ' . $detail_order->bagian ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_mesin as $mesin) { ?>
                                    <option value="<?= $mesin['id_mesin'] ?>"><?= $mesin['nama_mesin'] . ' - ' . $mesin['bagian'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Pengorder</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_pengguna" required>
                                <?php if (!empty($detail_order->id_pengguna)) { ?>
                                    <option value="<?= $detail_order->id_pengguna ?>"><?= $detail_order->nama_pengguna . ' - ' . $detail_order->bagian ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_pengguna as $pengguna) { ?>
                                    <option value="<?= $pengguna['id_pengguna'] ?>"><?= $pengguna['nama_pengguna'] . ' - ' . $pengguna['bagian'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Mandor</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_mandor" required>
                                <?php if (!empty($detail_order->id_mandor)) { ?>
                                    <option value="<?= $detail_order->id_mandor ?>"><?= $detail_order->nama_mandor . ' - ' . $detail_order->bagian_mandor ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_mandor as $mandor) { ?>
                                    <option value="<?= $mandor['id_mandor'] ?>"><?= $mandor['nama_mandor'] . ' - ' . $mandor['bagian_mandor'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Keterangan Order</label>
                        <div class="col-8">
                            <textarea class="form-control" name="inputan_keterangan" cols="30" rows="10" required value="<?= $detail_order->keterangan ?>" placeholder="Masukkan keterangan order"></textarea>

                        </div>
                    </div>

                    <!-- Button atau tombol -->
                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('data_order'); ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>
            </div>
        </div>
    </div>


</div>