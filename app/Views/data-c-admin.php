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
            <div class="card-header bg-dark text-white"><b>Form Entri (Admin)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('data_admin/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_admin" value="<?= $id_admin ?>">

                    <?php if (empty($id_admin)) { ?>
                        <center><i class="fa fa-user fa-5x mb-4"></i></center>
                    <?php } else { ?>
                        <center><img src="<?= base_url() . '/public/foto-admin/' . $detail_admin->foto_admin ?>" class="mb-4" height="100%" width="100px" style="border: 2.5px solid grey;"></center>
                    <?php } ?>

                    <div class="row mb-2">
                        <label class="col-4">NIK</label>
                        <div class="col-8">
                            <input class="form-control" type="number" name="inputan_nik_admin" required value="<?= $detail_admin->nik_admin ?>" placeholder="Masukkan NIK">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Admin</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nama_admin" required value="<?= $detail_admin->nama_admin ?>" placeholder="Masukkan nama admin">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <label class="col-4">Bagian</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_nama_bagian" required>
                                <?php if(!empty($detail_admin->bagian_admin)) { ?>
                                <option value="<?= $detail_admin->bagian_admin ?>"><?= $detail_admin->bagian_admin ?></option>
                                <?php } ?>
                                <option value=""> -- Silahkan Bagian --</option>
                                <option value="CTP">CTP</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Mandor</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_nama_mandor" required>
                                <?php if (!empty($detail_admin->id_mandor)) { ?>
                                    <option value="<?= $detail_admin->id_mandor ?>"><?= $detail_admin->nama_mandor . ' - ' . $detail_admin->bagian ?></option>
                                <?php } ?>

                                <option value=""> -- Silahkan Pilih --</option>
                                <?php foreach ($data_mandor as $mandor) { ?>
                                    <option value="<?= $mandor['id_mandor'] ?>"><?= $mandor['nama_mandor'] . ' - ' . $mandor['bagian'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Foto Admin</label>
                        <div class="col-8">
                            <input class="form-control" type="file" name="inputan_foto">
                            <input class="form-control" type="hidden" name="nama_foto_tersimpan" value="<?= $detail_admin->foto_admin ?>">
                        </div>
                    </div>

                    <!-- Button atau tombol -->

                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('data_admin') ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-dark text-white"><b>Tabel Data (Admin)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama Admin</th>
                            <th>Nama Bagian</th>
                            <th>Nama Mandor</th>
                            <th>Foto Admin</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_admin as $admin) { ?>
                            <tr style="font-size: smaller;">
                                <td class="informasi"><?= $no++ ?></td>
                                <td><?= $admin['nik_admin'] ?></td>
                                <td><?= $admin['nama_admin'] ?></td>
                                <td><?= $admin['bagian_admin'] ?></td>
                                <td><?= $admin['nama_mandor'] ?></td>
                                <td class="informasi">
                                    <img src="<?= base_url() . '/public/foto-admin/' . $admin['foto_admin'] ?>" height="100%" width="70px" style="border: 2px solid black;">

                                </td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a href="<?= base_url('data_admin/detaildata/' . $admin['id_admin']) ?>" class="btn btn-success btn-sm mb-2"><i class="fa fa-edit"></i> Edit</a>
                                        <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('data_admin/hapusdata/' . $admin['id_admin']) ?>" class="btn btn-sm btn-danger mb-2"><i class="fa fa-trash"></i> Hapus</a>
                                        <a href="<?= base_url('data_admin/download/' . $admin['foto_admin']) ?>" class="btn btn-sm btn-info"><i class="fa fa-download"></i> Gambar</a>
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