<?php 
    $session = \Config\Services::session(); 
    if(empty($session->get('id_user'))) { ?>

    <script>window.location = '<?= base_url('halmasuk'); ?>'</script>

<?php } else { ?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Project Alpha</title>
    
    <!-- Komponen CSS Bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Komponen FontAwesome -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <!-- Komponen Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

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



</head>
 
<body>
    <center style="margin-top: 2.5%; margin-bottom: 1%;">
        <h1 style="font-family: 'Sofia', sans-serif; font-weight: bold; color: green"><?= $judul; ?></h1>
        <h4><?= $sub_judul; ?></h4>    
    </center>

	<div style="padding: 2.5%;">
	    
        <!-- memasukkan form menu-->
        <?php include('_menu.php'); ?>
        <!-- memasukkan form content-->
        <?php include('_content.php'); ?>

	    
	</div>
    
</body>
 
</html>
<?php } ?>