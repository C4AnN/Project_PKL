<?php 
    $session = \Config\Services::session(); 
    if(empty($session->get('id_user'))) { ?>

    <script>window.location = '<?= base_url('masuk'); ?>'</script>

<?php } else { ?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Aplikasi UAS Rekayasa Web</title>
    
    <!-- Komponen CSS Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Komponen FontAwesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <!-- Komponen Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <!-- Pastikan jQuery sudah dimuat sebelum script ini -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style_sidebar.css') ?>">

    
    <!-- Komponen DataTables (Tabel Data) -->
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <!-- data tables js -->
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>
    <!-- data tables css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">

    <!-- membuat datatables -->
    <script type="text/javascript">
        $(document).ready(function(){ $('#tabel_data').DataTable(); });
    </script>

<style>

    section {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 92.5vh; /* Menggunakan 100vh agar sesuai dengan tinggi layar */
        width: 100%;
        background: url('<?= base_url('assets/img/10.jpg')?>');
        background-position: center;
        background-size: cover;
        overflow: hidden; /* Menyembunyikan overflow jika ada */
    }

    .card {
            position: absolute;
            top: 170px;
            left: 500px;
            width: 100%;
            height: 100%;
            max-height: 60px;
            max-width: 700px;
            background-color: transparent;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease-in-out; /* Efek transisi saat hover */
        } 

    .card2 {
            position: absolute;
            top: 260px;
            left: 750px;
            width: 100%;
            height: 100%;
            max-width: 200px;
            max-height: 220px;
            background-color: transparent;
            border: none;
            transition: transform 0.3s ease-in-out; /* Efek transisi saat hover */
        }

    .card3 {
            position: absolute;
            top: 300px;
            left: 30px;
            width: 100%;
            height: 100%;
            max-width: 400px;
            max-height: 220px;
            background-color: transparent;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease-in-out; /* Efek transisi saat hover */
        }

    .card4 {
            position: absolute;
            top: 550px;
            left: 30px;
            width: 100%;
            height: 100%;
            max-width: 400px;
            max-height: 170px;
            background-color: transparent;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease-in-out; /* Efek transisi saat hover */
        }

 
        .card-header {
            background-color: transparent;
            color: #ffff;
            text-align: center;
            font-family: "Merriweather", serif;
            font-weight: bold;
            padding: 15px 0;
            border-bottom: none;
        }

        .card-header p{
            text-align: justify;
        }

</style>

</head>
 
<body>

	<header>
        <!-- memasukkan form menu-->
        <?php include('menu.php'); ?>	    
	</header>
<section>
    <div class="card border-success">
            <div class="card-header">
                <H1>PT. PURA BARUTAMA UNIT OFFSET</H1>
            </div>
    </div>
    <div class="card2">
        <div class="card-header">
            <img src="<?= base_url('assets/img/LogoPura.jpg') ?>" width="200" height="200"> 
        </div>
    </div>
    <div class="card3 border-success">
            <div class="card-header">
                <H1>VISI</H1>
                <p>Memenuhi permintaan kebutuhan akan produk-produk pengepakan dan percetakan di pasar domestik dan di luar negeri, dengan menawarkan solusi yang inovatif, berkualitas dan berbasis teknologi canggih dan bahan baku lokal</p>
            </div>
    </div>
    <div class="card4 border-success">
            <div class="card-header">
                <H1>VISI</H1>
                <p>Menjadi pemain utama di industri percetakan dan pengepakan global, dengan memanfaatkan inovasi produk, sinergi, dan solusi yang komprehensif.</p>
            </div>
    </div>
</section>
    
</body>
 
</html>
<?php } ?>