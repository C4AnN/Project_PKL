<center>
    <h4 class="mb-4" style="font-family: 'Lemon', serif; font-weight: bold;">
        <i class="fa fa-print"></i> Halaman Cetak Laporan
    </h4>
</center>

<div class="row">
    <div class="col-12">
        <div class="card border-dark">
            <h5 class="card-header bg-dark text-white">Pilihan Laporan</h5>
            <div class="card-body">

                <!-- Start Area form cetak laporan Order -->
                <form action="<?= base_url('cetak_laporan/laporancetakorder') ?>" method="post" target="new">
                    <div class="row mb-2">
                        <label class="col-4"><b>Laporan Cetak Order</b> </label>
                        <div class="col-3">
                            <input class="form-control" type="date" name="inputan_tgl_mulai" required>
                            <small><b>Tgl. Mulai</b></small>
                        </div>
                        <div class="col-3">
                            <input class="form-control" type="date" name="inputan_tgl_selesai" required>
                            <small><b>Tgl. Selesai</b></small>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak</button>
                        </div>
                    </div>
                </form>
                <!-- End Area form cetak laporan -->

                <!-- Start Area form cetak laporan Revisi -->
                <form action="<?= base_url('cetak_laporan/laporancetakrevisi') ?>" method="post" target="new">
                    <div class="row mb-2">
                        <label class="col-4"><b>Laporan Cetak Revisi</b> </label>
                        <div class="col-3">
                            <input class="form-control" type="date" name="inputan_tgl_mulai" required>
                            <small><b>Tgl. Mulai</b></small>
                        </div>
                        <div class="col-3">
                            <input class="form-control" type="date" name="inputan_tgl_selesai" required>
                            <small><b>Tgl. Selesai</b></small>
                        </div>
                        <div class="col-2">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-print"></i> Cetak</button>
                        </div>
                    </div>
                </form>
                <!-- End Area form cetak Revisi -->

            </div>
        </div>
    </div>
</div>