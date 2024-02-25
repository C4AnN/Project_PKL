<center>
  <h4 class="mb-4" style="font-family: 'Sofia', sans-serif; font-weight: bold;">
    <i class="fa fa-home"></i> Halaman Beranda
  </h4>
</center>

<div class="row">
  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card border-success">
          <h5 class="card-header bg-success text-white">Jadwal Kuliah</h5>
          <div class="card-body">
            <h5 class="card-title"> <?= $jumlah_data_jadwalkuliah ?> Data</h5>
            <p class="card-text mb-0">Data terakhir : </p>
            <p class="card-text text-success"><?= $dt_terakhir_jadwalkuliah ?></p>
          </div>
        </div>
  </div>
  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card border-primary">
          <h5 class="card-header bg-primary text-white">Mahasiswa</h5>
          <div class="card-body">
            <h5 class="card-title"> <?= $jumlah_data_mahasiswa ?> Data</h5>
            <p class="card-text mb-0">Data terakhir : </p>
            <p class="card-text text-primary"><?= $dt_terakhir_mahasiswa ?></p>
          </div>
        </div>
  </div>
  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card border-danger">
          <h5 class="card-header bg-danger text-white">Dosen</h5>
          <div class="card-body">
            <h5 class="card-title"> <?= $jumlah_data_dosen ?> Data</h5>
            <p class="card-text mb-0">Data terakhir : </p>
            <p class="card-text text-danger"><?= $dt_terakhir_dosen ?></p>
          </div>
        </div>
  </div>
  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card border-warning">
          <h5 class="card-header bg-warning text-white">User</h5>
          <div class="card-body">
            <h5 class="card-title"> <?= $jumlah_data_user ?> Data</h5>
            <p class="card-text mb-0">Data terakhir : </p>
            <p class="card-text text-warning"><?= $dt_terakhir_user ?></p>
          </div>
        </div>
  </div>
</div>