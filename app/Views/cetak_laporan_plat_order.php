<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cetak - Laporan Order Plat</title>
    <!-- data tables css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap4.min.css">
</head>

<body>
    <div style="height: 20px; width: 100%; background-color: green;"></div>
    <div class="m-5">
        <img src="<?= base_url('assets/img/logo1.png') ?>" width="25" height="25"> Project Alpha 
        <!-- <h1>Project Alpha</h1> -->
        <h3>Laporan Order Plat (<?= date("d/M, Y", strtotime($tanggal_cetak_order)) ?>)</h4>

            <table class="table table-bordered mt-5">
                <thead>
                    <tr>
                            <th>No.</th>
                            <th>Data Order</th>
                            <th>Data Customer</th>
                            <th>Data Cetakan</th>
                            <th>Konfirmasi Order Plat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($data_cetak_order as $cetak_order) { ?>
                        <tr style="font-size: smaller;">
                            <td><?= $no++ ?></td>
                            <td>
                                    <b>Nama Mesin    : </b><?= $cetak_order['nama_mesin']. ' | Bagian: ' . $cetak_order['bagian'] ?>
                                <hr style="margin : 0">
                                    <b>Nomor Plat    : </b><?= $cetak_order['nomor_plat'] ?>
                                <hr style="margin : 0">
                                    <b>Nomor PP : </b><?= $cetak_order['nomor_customer'] ?>
                                <hr style="margin : 0">
                                    <b>Warna Plat          : </b><?= $cetak_order['warna_plat'] ?>
                                <hr style="margin : 0">
                                    <b>Tanggal Order Plat      : </b><?= date('d-F-Y', strtotime($cetak_order['tgl_orderplat'])) ?>
                            </td>
                            <td><?= $cetak_order['nama_customer'] ?></td>
                            <td><?= $cetak_order['nama_produk'] ?></td>
                            <td><?= $cetak_order['konfirmasi'] ?></td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
    </div>

    <div style="height: 20px; width: 100%; background-color: black; position: absolute; bottom: 0;"></div>
</body>

</html>
<script type="text/javascript">
    window.print();
    window.onfocus = function() {
        window.close();
    }
</script>