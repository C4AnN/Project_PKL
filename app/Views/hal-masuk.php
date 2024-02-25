<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Halaman Masuk - Aplikasi UAS Rekayasa Web</title>
    
    <!-- Komponen CSS Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Komponen FontAwesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <!-- Komponen Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">


</head>
 
<body class="p-5">
    <center style="margin-top: 2.5%; margin-bottom: 2.5%;">
        <h1 style="font-family: 'Sofia', sans-serif; font-weight: bold; color: green"><?= $judul; ?></h1>
        <h5><?= $sub_judul; ?></h5>    
    </center>
    
    <div class="card border-success col-md-4 col-lg-4 mx-auto p-2">
        <div class="card-body">
            <form method="post" action="<?= base_url('halmasuk/autentifikasi'); ?>">
                <div class="mb-4">
                    <center>
                        <i class="fa fa-5x fa-user-o mb-4"></i>
                        <h5 style="font-family: 'Sofia', sans-serif; font-weight: bold;">Silahkan masukkan : </h5>
                    </center>
                </div>

                <div class="row mb-2">
                    <div class="col-12">
                        <b>Username</b>
                        <input class="form-control" type="text" name="inputan_username" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12">
                        <b>Password</b>
                        <input class="form-control" type="password" name="inputan_password" required>
                    </div>
                </div>  

                <!-- Button atau tombol -->
                <button class="btn btn-success btn-lg btn-block"> <i class="fa fa-sign-in"></i> M a s u k </button>
           
            </form>    
        </div>  
    </div>
</body>
 
</html>
