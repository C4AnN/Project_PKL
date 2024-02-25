<style>
    /* Gaya untuk mengubah warna teks link saat dihover */
    .navbar-dark .navbar-nav .nav-link:hover {
        color: #17a2b8;
        /* Ganti dengan warna teks yang diinginkan */
        transform: scale(1.05);
        /* Membesar saat dihover */
    }

      /* Basic styling for the menu */
      .nav {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
        }

        .nav-item {
            margin-right: 15px;
            position: relative;
        }

        .nav-link {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px;
            background-color: none;
            border-radius: 5px;
        }

        /* Styling for the dropdown */
        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a {
            color: #333;
            padding: 10px;
            display: block;
            text-decoration: none;
        }

        .dropdown-menu a:hover {
            color: #17a2b8;
            /* Ganti dengan warna teks yang diinginkan */
            transform: scale(1.05);
            /* Membesar saat dihover */
        }

</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="">
        <img src="<?= base_url('assets/img/logo1.png') ?>" width="25" height="25"> Project Alpha (<?= $session->get('username') ?>)
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php if ($session->get('hak_akses') == 'Admin') { ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('berandaAdmin') ?>"><span class="fa fa-home"></span> Beranda</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" href="#"><span class="fa fa-inbox"></span> Informasi Data</a>
                    <div class="dropdown-menu">
            
                        <a href="<?= base_url('data_mesin') ?>"><span class="fa fa-book"></span> Data Mesin</a>
                        <a href="<?= base_url('data_customer') ?>"><span class="fa fa-address-card"></span> Order Customer</a>
                        <a href="<?= base_url('data_plat') ?>"><span class="fa fa-file"></span> Data Plat</a>
                
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('panel_revisi') ?>"><span class="fa fa-list-alt"></span> Panel Revisi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('panel_order') ?>"><span class="fa fa-indent"></span> Panel Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('cetak_laporan') ?>"><span class="fa fa-print"></span> Cetak Laporan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('masuk/keluar') ?>" onclick="return confirm('Kamu yakin keluar dari sistem ?')"><span class="fa fa-bookmark"></span> Keluar</a>
                </li>
                <?php } elseif ($session->get('hak_akses') == 'User') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('berandaUser') ?>"><span class="fa fa-home"></span> Beranda</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('data_revisi') ?>"><span class="fa fa-list-ul"></span> Revisi Plat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('data_order') ?>"><span class="fa fa-table"></span> Order Plat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('panel_konfirmasi') ?>"><span class="fa fa-indent"></span> Panel Konfirmasi Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('panel_konfirmasi_revisi') ?>"><span class="fa fa-check"></span> Panel Konfirmasi revisi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('masuk/keluar') ?>" onclick="return confirm('Kamu yakin keluar dari sistem ?')"><span class="fa fa-bookmark"></span> Keluar</a>
                </li>
                <?php } elseif ($session->get('hak_akses') == 'Super_Admin') { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('berandaSuperAdmin') ?>"><span class="fa fa-home"></span> Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('user') ?>"><span class="fa fa-users"></span> Panel Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('data_mandor') ?>"><span class="fa fa-indent"></span> Panel Mandor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('data_admin') ?>"><span class="fa fa-indent"></span> Panel Dept CTP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('data_pengguna') ?>"><span class="fa fa-indent"></span> Panel Dept Cetak</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('masuk/keluar') ?>" onclick="return confirm('Kamu yakin keluar dari sistem ?')"><span class="fa fa-bookmark"></span> Keluar</a>
                    </li>
                    <?php } ?>
        </ul>
    </div>
</nav>
<script>
    $(document).ready(function() {
        $('.navbar-toggler').click(function() {
            $('.navbar-collapse').toggleClass('show');
        });
    });
</script>