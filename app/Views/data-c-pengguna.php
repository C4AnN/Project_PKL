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
    <div class="col-md-5 mb-4">
        <div class="card">
            <div class="card-header bg-dark text-white"><b>Form Entri (Pengguna)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('data_pengguna/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_pengguna" value="<?= $id_pengguna ?>">

                    <?php if (empty($id_pengguna)) { ?>
                        <center><i class="fa fa-user fa-5x mb-4"></i></center>
                    <?php } else { ?>
                        <center><img src="<?= base_url() . '/public/foto-pengguna/' . $detail_pengguna->foto_pengguna ?>" class="mb-4" height="100%" width="100px" style="border: 2.5px solid grey;"></center>
                    <?php } ?>

                    <div class="row mb-2">
                        <label class="col-4">NIK</label>
                        <div class="col-8">
                            <input class="form-control" type="number" name="inputan_nik_pengguna" required value="<?= $detail_pengguna->nik_pengguna ?>" placeholder="Masukkan NIK">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Pengguna</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nama_pengguna" required value="<?= $detail_pengguna->nama_pengguna ?>" placeholder="Masukkan nama pengguna">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Bagian</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_nama_bagian_pengguna" required>
                                <?php if (!empty($detail_pengguna->bagian_pengguna)) { ?>
                                    <option value="<?= $detail_pengguna->bagian_pengguna ?>"><?= $detail_pengguna->bagian_pengguna ?></option>
                                <?php } ?>
                                <option value=""> -- Silahkan Pilih --</option>
                                <option value="Cetak 1">Cetak 1</option>
                                <option value="Cetak 2">Cetak 2</option>
                                <option value="Cetak 3">Cetak 3</option>
                                <option value="Cetak 4">Cetak 4</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Mandor</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_mandor" required>
                                <?php if (!empty($detail_pengguna->id_mandor)) { ?>
                                    <option value="<?= $detail_pengguna->id_mandor ?>"><?= $detail_pengguna->nama_mandor . ' - ' . $detail_pengguna->bagian_mandor ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_mandor as $mandor) { ?>
                                    <option value="<?= $mandor['id_mandor'] ?>"><?= $mandor['nama_mandor'] . ' - ' . $mandor['bagian_mandor'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Mesin</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_mesin" required>
                                <?php if (!empty($detail_pengguna->id_mesin)) { ?>
                                    <option value="<?= $detail_pengguna->id_mesin ?>"><?= $detail_pengguna->nomor_mesin . ' - ' . $detail_pengguna->nama_mesin ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_mesin as $mesin) { ?>
                                    <option value="<?= $mesin['id_mesin'] ?>"><?= $mesin['nama_mesin'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Foto Pengguna</label>
                        <div class="col-8">
                            <input class="form-control" type="file" name="inputan_foto">
                            <input class="form-control" type="hidden" name="nama_foto_tersimpan" value="<?= $detail_pengguna->foto_pengguna ?>">
                        </div>
                    </div>

                    <!-- Button atau tombol -->

                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('data_pengguna') ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-dark text-white"><b>Tabel Data (Pengguna)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Informasi</th>
                            <th>Foto Admin</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_pengguna as $pengguna) { ?>
                            <tr style="font-size: smaller;">
                                <td class="informasi"><?= $no++ ?></td>
                                <td><?= $pengguna['nik_pengguna'] ?></td>
                                <td>
                                    <b>Nama Pengguna : </b><?= $pengguna['nama_pengguna'] ?>
                                    <hr style="margin : 0">
                                    <b>Bagian : </b><?= $pengguna['bagian_pengguna'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama Mandor : </b><?= $pengguna['nama_mandor'] . ' - ' . $pengguna['bagian_mandor'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama Mesin : </b><?= $pengguna['nama_mesin'] ?>
                                </td>

                                <td class="informasi">
                                    <img src="<?= base_url() . '/public/foto-pengguna/' . $pengguna['foto_pengguna'] ?>" height="100%" width="70px" style="border: 2px solid black;">

                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a href="<?= base_url('data_pengguna/detaildata/' . $pengguna['id_pengguna']) ?>" class="btn btn-success btn-sm mb-2"><i class="fa fa-edit"></i> Edit</a>
                                        <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('data_pengguna/hapusdata/' . $pengguna['id_pengguna']) ?>" class="btn btn-sm btn-danger mb-2"><i class="fa fa-trash"></i> Hapus</a>
                                        <a href="<?= base_url('data_pengguna/download/' . $pengguna['foto_pengguna']) ?>" class="btn btn-sm btn-info"><i class="fa fa-download"></i> Gambar</a>
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