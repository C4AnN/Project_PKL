<style>
    /* Gaya untuk card */
    .card {
        border: 1px solid #dee2e6;
        /* Garis tepi card */
        border-radius: 10px;
        /* Sudut melengkung pada card */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        /* Efek bayangan pada card */
        transition: transform 0.3s ease-in-out;
        /* Efek transisi saat hover */
    }

    .card:hover {
        transform: scale(1.02);
        /* Membesar saat dihover */
    }

    /* Gaya untuk card header */
    .card-header {
        background-color: #343a40;
        /* Warna latar belakang card header */
        color: white;
        /* Warna teks pada card header */
        border-radius: 10px 10px 0 0;
        /* Sudut melengkung pada card header (hanya sudut atas) */
    }

    /* Gaya untuk form input */
    .form-control {
        border: 1px solid #ced4da;
        /* Garis tepi input */
        border-radius: 5px;
        /* Sudut melengkung pada input */
        transition: border-color 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        /* Efek transisi pada input */
    }

    .form-control:focus {
        border-color: #007bff;
        /* Warna garis tepi input saat fokus */
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        /* Efek bayangan saat fokus */
    }

    /* Gaya untuk tombol */
    .btn {
        border-radius: 5px;
        /* Sudut melengkung pada tombol */
        transition: transform 0.3s ease-in-out;
        /* Efek transisi pada tombol */
    }

    .btn:hover {
        transform: translateY(-2px);
        /* Menggeser tombol sedikit ke atas saat dihover */
    }
</style>

<div class="row">
    <div class="col-md-10 mb-4 mx-auto">
        <div class="card">
            <div class="card-header bg-dark text-white"><b>Tabel Data (Konfirmasi Revisi Plat)</b></div>
            <div class="card-body">
                <table class="table table-bordered" id="tabel_data">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Data Revisi</th>
                            <th>Data Customer</th>
                            <th>Data Cetakan</th>
                            <th>Konfirmasi Revisi Plat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_konfirmasi_revisi as $konfirmasirevisi) { ?>
                            <tr style="font-size: smaller;">
                                <td class="informasi"><?= $no++ ?></td>
                                <td>
                                        <b>Nama Mesin : </b><?= $konfirmasirevisi['nama_mesin']. ' | Bagian: ' . $konfirmasirevisi['bagian']?>
                                    <hr style="margin : 0">
                                        <b>Nomor Plat : </b><?= $konfirmasirevisi['nomor_plat'] ?>
                                    <hr style="margin : 0">
                                        <b>Nomor PP : </b><?= $konfirmasirevisi['nomor_customer'] ?>
                                    <hr style="margin : 0">
                                        <b>Warna Plat : </b><?= $konfirmasirevisi['warna_plat'] ?>
                                    <hr style="margin : 0">
                                        <b>Tanggal Revisi Plat : </b><?= date('d-F-Y', strtotime($konfirmasirevisi['tgl_revisi'])) ?>
                                    <hr style="margin : 0">
                                </td>
                                <td><?= $konfirmasirevisi['nama_customer'] ?></td>
                                <td><?= $konfirmasirevisi['nama_produk'] ?></td>
                                <td><?= $konfirmasirevisi['konfirmasi'] ?></td>
                                <td>
                                    <div class="d-flex flex-column">
                                        <a onclick="return confirm('Yakin hapus ?')" href="<?= base_url('panel_konfirmasi_revisi/hapusdata/' . $konfirmasirevisi['id_konfirmasi_revisi']) ?>" class="btn btn-sm btn-danger mb-2"><i class="fa fa-trash"></i> Hapus</a>
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