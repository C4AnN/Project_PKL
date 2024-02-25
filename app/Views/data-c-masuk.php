<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Halaman Masuk - Project Alpha</title>

    <!-- Komponen CSS Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Komponen FontAwesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Komponen Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lemon">

    <!-- Modern CSS Styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style_sidebar'); ?>">
</head>
<style>
        body {
            background-image: url('<?= base_url('assets/img/gambar2.jpg')?>'); /* Ganti 'path/to/your/image.jpg' dengan path menuju gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Membuat gambar tetap saat melakukan scroll */
            margin: 0; /* Menghilangkan margin pada body */
            padding: 0; /* Menghilangkan padding pada body */
            font-family: 'Arial', sans-serif; /* Ganti dengan font yang diinginkan */
        
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            width: 100%;
            max-width: 400px;
            background-color: transparent;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease-in-out; /* Efek transisi saat hover */
        }

        .card:hover {
        transform: scale(1.02); /* Membesar saat dihover */
        }

        .card-header {
            background-color: transparent;
            color: #fff;
            text-align: center;
            font-family: 'Sofia', sans-serif;
            font-weight: bold;
            padding: 15px 0;
            border-bottom: none;
        }

        .card-body {
            padding: 20px;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
         
        }

        .btn-success {
            background-color: transparent;
            border: none;
        }

</style>

<body>
    <div class="container">
        <div class="card border-success">
            <div class="card-header">
                <h1><?= $judul; ?></h1>
                <h5><?= $sub_judul; ?></h5>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('masuk/autentifikasi'); ?>">
                    <div class="mb-4">
                        <div class="text-center">
                            <img src="<?= base_url('assets/img/LogoPura.jpg') ?>" width="150" height="150"> 
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputUsername" style="color: white;">Username</label>
                        <input class="form-control" type="text" name="inputan_username" id="inputUsername" required>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword" style="color: white;">Password</label>
                        <input class="form-control" type="password" name="inputan_password" id="inputPassword" required>
                    </div>

                    <!-- Button atau tombol -->
                    <button class="btn btn-success btn-lg btn-block"> <i class="fa fa-sign-in"></i> Masuk </button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
