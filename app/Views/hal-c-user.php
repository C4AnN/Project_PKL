<div class="row">
    <div class="col-5">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Form Entri (User)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('haluser/simpandata'); ?>">

                    <input class="form-control" type="hidden" name="inputan_id_user" value="<?= $id_user ?>">                    
                    
                    <div class="row mb-2">
                        <label class="col-4">Username</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_username" required value="<?= $detail_user->username ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Password</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_password" required value="<?= $detail_user->password ?>">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Hak Akases</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_hak_akses" required>
                                <?php if(!empty($detail_user->hak_akses)) { ?>
                                <option value="<?= $detail_user->hak_akses ?>"><?= $detail_user->hak_akses ?></option>
                                <?php } ?>
                                <option value=""> -- Silahkan Pilih --</option>
                                <option value="Bukan Admin">Bukan Admin</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>

                    <!-- Button atau tombol -->
                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('haluser'); ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>    
            </div>
        </div>
    </div>
    
    <div class="col-7">
        <div class="card">
            <div class="card-header bg-secondary text-white"><b>Tabel Data (User)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Hak Akses</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_user as $user) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $user['username'] ?></td>
                            <td><?= $user['password'] ?></td>
                            <td><?= $user['hak_akses'] ?></td>
                            <td>
                                <a href="<?= base_url('haluser/detaildata/'.$user['id_user']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('haluser/hapusdata/'.$user['id_user']) ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>