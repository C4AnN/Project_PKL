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

    .table .informasi {
        border: 1px solid #e9ecef; /* Garis tepi sel pada tabel */
        padding: 8px; /* Ruang dalam sel pada tabel */
        text-align: center; /* Posisi teks di tengah sel */
    }

</style>

<div class="row">

    <div class="col-md-5 mb-4">
        <div class="card">
            <div class="card-header bg-black text-white"><b>Form Entri (Akun Pengguna)</b></div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="<?= base_url('user/simpandata'); ?>" >

                    <input class="form-control" type="hidden" name="inputan_id_user" value="<?= $id_user ?>">                    
                    
                    <?php if(empty($id_user)){ ?> 
                        <center><i class="fa fa-user fa-5x mb-4"></i></center>
                    <?php } else { ?> 
                        <center><img src="<?= base_url().'/public/foto-user/'.$detail_user->foto_user ?>" class="mb-4" height="100%" width="100px" style="border: 2.5px solid grey;"></center>
                    <?php } ?>
                <div >
                    <p class="mb-2"><b>Ketentuan Password : </b></p>
                    <p class="mb-4" >Harap masukkan setidaknya satu huruf besar, satu angka, dan satu karakter khusus. Minimal 8 karakter.</p>
                 </div>
                    <div class="row mb-2">
                        <label class="col-4">Username</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_username" required value="<?= $detail_user->username ?>" placeholder="Masukkan username">
                        </div>
                    </div>
                    <div class="row mb-2">
                    <label class="col-4">Password</label>
                        <div class="col-8">
                            <div class="input-group">
                                <input id="inputPassword" class="form-control" type="password" name="inputan_password" required pattern="^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"  required value="<?= $detail_user->password ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i id="passwordToggle" class="fa fa-eye" onclick="togglePassword()"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Nama Karyawan</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nama_user" required value="<?= $detail_user->nama_user ?>" placeholder="Masukkan nama lengkap">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">NIK Karyawan</label>
                        <div class="col-8">
                            <input class="form-control" type="text" name="inputan_nik_user" required value="<?= $detail_user->nik_user ?>" placeholder="Masukkan NIK Karyawan">
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Bagian Karyawan</label>
                        <div class="col-8">
                            <select class="form-control" name="inputan_bagian_user" required>
                                <?php if(!empty($detail_user->bagian_user)) { ?>
                                <option value="<?= $detail_user->bagian_user ?>"><?= $detail_user->bagian_user ?></option>
                                <?php } ?>
                                <option value=""> -- Silahkan Pilih --</option>
                                <option value="Cetak 1">Cetak 1</option>
                                <option value="Cetak 2">Cetak 2</option>
                                <option value="Cetak 3">Cetak 3</option>
                                <option value="Cetak 4">Cetak 4</option>
                                <option value="CTP">CTP</option>
                                <option value="HR GA">HR GA</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <label class="col-4">Foto User</label>
                        <div class="col-8">
                            <input class="form-control" type="file" name="inputan_foto">
                            <input class="form-control" type="hidden" name="nama_foto_tersimpan" value="<?= $detail_user->foto_user ?>">
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
                                <option value="User">User</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                    </div>

                    <!-- Button atau tombol -->
                    <button class="btn btn-success btn-block btn-lg"> <i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= base_url('user'); ?>" class="btn btn-danger btn-block"><i class="fa fa-refresh fa-spin"></i> Muat Ulang</a>

                </form>    
            </div>
        </div>
    </div>
    
    <div class="col-md-7">
        <div class="card">
            <div class="card-header bg-black text-white"><b>Tabel Data (Akun Pengguna)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <!-- <th>Password</th> -->
                            <th>Foto</th>
                            <th>Informasi Karyawan</th>
                            <th>Hak Akses</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_user as $user) { ?>
                        <tr>
                            <td class="informasi"><?= $no++ ?></td>
                            <td><?= $user['username'] ?></td>
                            <td class="informasi">
                                <img src="<?= base_url().'/public/foto-user/'.$user['foto_user'] ?>" height="100%" width="60px" style="border: 2.5px solid grey;">
                            </td>
                            <td>
                                    <b>NIK : </b><?= $user['nik_user'] ?>
                                    <hr style="margin : 0">
                                    <b>Nama : </b><?= $user['nama_user'] ?> 
                                    <hr style="margin : 0">
                                    <b>Bagian : </b><?= $user['bagian_user'] ?>
                                    <hr style="margin : 0">
                            </td>
                            <td><?= $user['hak_akses'] ?></td>
                            <td>
                                <div class="d-flex flex-column">
                                    <a href="<?= base_url('user/detaildata/'.$user['id_user']) ?>" class="btn btn-success btn-sm mb-2"><i class="fa fa-edit"></i> Edit</a>
                                    <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('user/hapusdata/'.$user['id_user']) ?>" class="btn btn-sm btn-danger mb-2"><i class="fa fa-trash"></i> Hapus</a>
                                    <a href="<?= base_url('user/download/'.$user['foto_user']) ?>" class="btn btn-sm btn-info"><i class="fa fa-download"></i> Gambar</a>
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
    <div class="col-4">
       
    </div>
<script>
    function togglePassword() {
        var passwordInput = document.getElementById('inputPassword');
        var passwordToggle = document.getElementById('passwordToggle');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordToggle.classList.remove('fa-eye');
            passwordToggle.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            passwordToggle.classList.remove('fa-eye-slash');
            passwordToggle.classList.add('fa-eye');
        }
    }
</script>