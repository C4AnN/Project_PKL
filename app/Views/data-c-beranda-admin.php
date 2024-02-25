<style>
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
        margin-bottom: 20px;
        background-color: #ffffff;
    }

    .card:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        transform: scale(1.02); /* Membesar saat dihover */
        transition: transform 0.5s ease-in-out; /* Efek transisi saat hover */
    }

    .card-header {
        border-radius: 12px 12px 0 0;
        background-color: #343a40;
        color: #ffffff;
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-text {
        color: #6c757d;
    }
</style>


<center>
  <h4 class="mb-4" style="font-family: 'Lemon', serif; font-weight: bold;">
    <i class="fa fa-home"></i> Halaman Beranda CTRP
  </h4>
</center>

<div class="row">
  <div class="col-12 col-md-6 mb-4 mb-lg-5 col-lg-3">
      <div class="card border-success">
          <h5 class="card-header bg-success text-white"><span class="fa fa-book" ></span> Data Mesin</h5>
          <div class="card-body">
            <h5 class="card-title"> <?= $jumlah_data_mesin ?> Data</h5>
            <p class="card-text mb-0">Data terakhir : </p>
            <p class="card-text text-success"><?= $dt_terakhir_mesin ?></p>
          </div>
        </div>
  </div>

  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card border-primary">
          <h5 class="card-header bg-primary text-white"><span class="fa fa-address-book" ></span> Data Mandor</h5>
          <div class="card-body">
            <h5 class="card-title"> <?= $jumlah_data_mandor ?> Data</h5>
            <p class="card-text mb-0">Data terakhir : </p>
            <p class="card-text text-primary"><?= $dt_terakhir_mandor ?></p>
          </div>
        </div>
  </div>

  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card border-danger">
          <h5 class="card-header bg-danger text-white"><span class="fa fa-users" ></span> Panel Pengguna</h5>
          <div class="card-body">
            <h5 class="card-title"> <?= $jumlah_data_user ?> Data</h5>
            <p class="card-text mb-0">Data terakhir : </p>
            <p class="card-text text-danger"><?= $dt_terakhir_user ?></p>
          </div>
      </div>
  </div>

  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card border-secondary">
          <h5 class="card-header bg-secondary text-white"><span class="fa fa-address-card" ></span> Data Customer</h5>
          <div class="card-body">
            <h5 class="card-title"> <?= $jumlah_data_customer ?> Data</h5>
            <p class="card-text mb-0">Data terakhir : </p>
            <p class="card-text text-secondary"><?= $dt_terakhir_customer ?></p>
          </div>
      </div>
  </div>

  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card border-info ">
          <h5 class="card-header bg-info text-white"><span class="fa fa-file" ></span> Data Plat</h5>
          <div class="card-body">
            <h5 class="card-title"> <?= $jumlah_data_plat ?> Data</h5>
            <p class="card-text mb-0">Data terakhir : </p>
            <p class="card-text text-info"><?= $dt_terakhir_plat ?></p>
          </div>
      </div>
  </div>

  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card border-warning">
          <h5 class="card-header bg-warning text-white"><span class="fa fa-list-ul" ></span> Data Revisi Plat</h5>
          <div class="card-body">
            <h5 class="card-title"> <?= $jumlah_data_revisi ?> Data</h5>
            <p class="card-text mb-0">Data terakhir : </p>
            <p class="card-text text-warning"><?= $dt_terakhir_revisi ?></p>
          </div>
      </div>
  </div>

  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card border-dark">
          <h5 class="card-header bg-dark text-white"><span class="fa fa-table" ></span> Data Order Plat</h5>
          <div class="card-body">
            <h5 class="card-title"> <?= $jumlah_data_order ?> Data</h5>
            <p class="card-text mb-0">Data terakhir : </p>
            <p class="card-text text-dark"><?= $dt_terakhir_order ?></p>
          </div>
      </div>
  </div>

 
</div>