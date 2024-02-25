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
</style>

<div class="row">
    <div class="col-md-10 mb-4 mx-auto">
        <div class="card">
            <div class="card-header bg-dark text-white"><b>Tabel Data (Konfirmasi Order Plat)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Data Order</th>
                            <th>Data Customer</th>
                            <th>Data Cetakan</th>
                            <th>Konfirmasi Order Plat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($data_konfirmasi as $konfirmasi) { ?>
                        <tr style="font-size: smaller;">
                            <td class="informasi"><?= $no++ ?></td>
                            <td>
                                    <b>Nama Mesin    : </b><?= $konfirmasi['nama_mesin']. ' | Bagian: ' . $konfirmasi['bagian'] ?>
                                <hr style="margin : 0">
                                    <b>Nomor Plat    : </b><?= $konfirmasi['nomor_plat'] ?>
                                <hr style="margin : 0">
                                    <b>Nomor PP : </b><?= $konfirmasi['nomor_customer'] ?>
                                <hr style="margin : 0">
                                    <b>Warna Plat          : </b><?= $konfirmasi['warna_plat'] ?>
                                <hr style="margin : 0">
                                    <b>Tanggal Order Plat      : </b><?= date('d-F-Y', strtotime($konfirmasi['tgl_orderplat'])) ?>
                        
                            </td>
                            <td><?= $konfirmasi['nama_customer'] ?></td>
                            <td><?= $konfirmasi['nama_produk'] ?></td>
                            <td><?= $konfirmasi['konfirmasi'] ?></td>
                            <td>
                                <div class="d-flex flex-column">
                                    <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('panel_konfirmasi/hapusdata/'.$konfirmasi['id_konfirmasi']) ?>" class="btn btn-sm btn-danger mb-2"><i class="fa fa-trash"></i> Hapus</a>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
</div>