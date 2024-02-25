<style>
    /* Gaya untuk card */
    .card {
        border: 1px solid #dee2e6; /* Garis tepi card */
        border-radius: 10px; /* Sudut melengkung pada card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan pada card */
        transition: transform 0.3s ease-in-out; /* Efek transisi saat hover */
    }

    .card:hover {
        transform: scale(1.02); /* Membesar saat dihover */
    }

    /* Gaya untuk card header */
    .card-header {
        background-color: #343a40; /* Warna latar belakang card header */
        color: white; /* Warna teks pada card header */
        border-radius: 10px 10px 0 0; /* Sudut melengkung pada card header (hanya sudut atas) */
    }

    /* Gaya untuk form input */
    .form-control {
        border: 1px solid #ced4da; /* Garis tepi input */
        border-radius: 5px; /* Sudut melengkung pada input */
        transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out; /* Efek transisi pada input */
    }

    .form-control:focus {
        border-color: #007bff; /* Warna garis tepi input saat fokus */
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5); /* Efek bayangan saat fokus */
    }

    /* Gaya untuk tombol */
    .btn {
        border-radius: 5px; /* Sudut melengkung pada tombol */
        transition: transform 0.3s ease-in-out; /* Efek transisi pada tombol */
    }

    .btn:hover {
        transform: translateY(-2px); /* Menggeser tombol sedikit ke atas saat dihover */
    }

    /* Gaya untuk tabel */
    .table {
        border: 1px solid #e9ecef; /* Garis tepi tabel */
        border-radius: 10px; /* Sudut melengkung pada tabel */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan pada tabel */
    }

    .table td {
        border: 1px solid #e9ecef; /* Garis tepi sel pada tabel */
        padding: 8px; /* Ruang dalam sel pada tabel */
        text-align: left; /* Posisi teks di tengah sel */
    }

    .table .nomor {
        border: 1px solid #e9ecef; /* Garis tepi sel pada tabel */
        padding: 8px; /* Ruang dalam sel pada tabel */
        text-align: center; /* Posisi teks di tengah sel */
    }
</style>

<div class="row">
    <div class="col-md-5 mb-4">
        <div class="card">
            <div class="card-header bg-black text-white"><b>Form Entri (Plat)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('data_plat/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_plat" value="<?= $id_plat ?>">   

                    <div class="row mb-2">
                        <label class="col-4">Nomor Plat</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nomor_plat" required value="<?= $detail_plat->nomor_plat ?>" placeholder="Masukkan nomor plat">
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <label class="col-4">Nama Customer</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_nama_customer" required>
                                <?php if(!empty($detail_plat->id_customer)) { ?>
                                <option value="<?= $detail_plat->id_customer ?>"><?= $detail_plat->nomor_customer.' - '.$detail_plat->nama_customer.' - '.$detail_plat->nama_produk ?></option>
                                <?php } ?>
                                
                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_customer as $customer) { ?>
                                    <option value="<?= $customer['id_customer'] ?>"><?= $customer['nomor_customer'].' - '.$customer['nama_customer'].' - '.$customer['nama_produk'] ?></option>
                                    <?php } ?>
                            </select>
                            </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Tgl. Order</label>
                        <div class="col-8">
                            <input class="form-control" type="date" name="inputan_tgl_order" required value="<?= $detail_plat->tgl_order ?>">
                        </div>
                    </div>
                    
                    <div class="row mb-2">
                        <label class="col-4">Nama Produk</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_nama_cetakan" required>
                                <?php if(!empty($detail_plat->id_customer)) { ?>
                                <option value="<?= $detail_plat->id_customer ?>"><?= $detail_plat->nomor_customer.' - '.$detail_plat->nama_produk ?></option>
                                <?php } ?>
                                
                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_customer as $customer) { ?>
                                    <option value="<?= $customer['id_customer'] ?>"><?= $customer['nomor_customer'].' - '.$customer['nama_produk'] ?></option>
                                    <?php } ?>
                            </select>
                            </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Desain Produk</label>
                        <div class="col-8">
                            <input class="form-control" type="file" name="inputan_foto_cetakan">
                            <input class="form-control" type="hidden" name="nama_foto_tersimpan" value="<?= $detail_plat->foto_plat ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Ukuran Produk</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_ukuran_cetakan" required>
                                <?php if(!empty($detail_plat->id_customer)) { ?>
                                <option value="<?= $detail_plat->id_customer ?>"><?= $detail_plat->nomor_customer.' - '.$detail_plat->size_cetakan ?></option>
                                <?php } ?>
                                
                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_customer as $customer) { ?>
                                    <option value="<?= $customer['id_customer'] ?>"><?= $customer['nomor_customer'].' - '.$customer['size_cetakan'] ?></option>
                                    <?php } ?>
                            </select>
                            </div>
                    </div>


                    <div class="row mb-2">
                        <label class="col-4">Spesifikasi Warna</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_warna_plat" required>
                                <?php if(!empty($detail_plat->id_customer)) { ?>
                                <option value="<?= $detail_plat->id_customer ?>"><?= $detail_plat->nomor_customer.' - '.$detail_plat->ketentuan_warna ?></option>
                                <?php } ?>
                                
                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_customer as $customer) { ?>
                                    <option value="<?= $customer['id_customer'] ?>"><?= $customer['nomor_customer'].' - '.$customer['ketentuan_warna'] ?></option>
                                    <?php } ?>
                            </select>
                            </div>
                    </div>

                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('data_plat') ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>    
            </div>
        </div>
    </div>
    
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-black text-white"><b>Tabel Data (Plat)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nomor Plat</th>
                            <th>Informasi</th>
                            <th>Desain Produk</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_plat as $plat) { ?>
                        <tr style="font-size: smaller;">
                            <td class="nomor"><?= $no++ ?></td>
                            <td><?= $plat['nomor_plat'] ?></td>
                            <td>
                                    <b>Nomor PP : </b><?= $plat['nomor_customer'] ?>
                                <hr style="margin : 0">
                                    <b>Nama Customer : </b><?= $plat['nama_customer'] ?>
                                <hr style="margin : 0">
                                    <b>Tanggal Order : </b><?= date('d-F-Y', strtotime($plat['tgl_order']))?>
                                <hr style="margin : 0">
                                    <b>Nama Cetakan : </b><?= $plat['nama_produk'] ?>
                                <hr style="margin : 0">
                                    <b>Ukuran Produk : </b><?= $plat['size_cetakan'] ?>
                                <hr style="margin : 0">
                                    <b>Warna Plat : </b><?= $plat['ketentuan_warna'] ?>
                                <hr style="margin : 0">
                            </td>
                            <td class="nomor">
                                <!-- <img src="<?= base_url().'/public/foto-plat/'.$plat['foto_plat'] ?>" height="100%" width="70px" style="border: 2.5px solid grey;">  -->
                                <a href="<?= base_url('data_plat/download/'.$plat['foto_plat']) ?>" class="btn btn-sm btn-info"><i class="fa fa-download"></i> Download File</a>
                            </td>
                                <td>
                                <div class="d-flex flex-column">
                                    <a href="<?= base_url('data_plat/detaildata/'.$plat['id_plat']) ?>" class="btn btn-success btn-sm mb-2"><i class="fa fa-edit"></i> Edit</a>
                                    <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('data_plat/hapusdata/'.$plat['id_plat']) ?>" class="btn btn-sm btn-danger mb-2"><i class="fa fa-trash"></i> Hapus</a>
                                <div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>