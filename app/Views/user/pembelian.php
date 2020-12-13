<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container">

    <form action="/user/beli" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>

        <div class="col mt-5">
            <h3>Pembelian</h3>
            <p>Dapatkan banyak diskon dan produk menarik lainnya</p>
        </div>

        <div class="card pt-2 pb-2 pl-4 pr-4 mb-4 mt-4">
            <h4>Informasi Produk</h4>
            <p class="font-weight-light">Beri kami informasi yang jelas yah, biar sesuai dengan keinginan kamu</p>
            <div class="form-group row">
                <label for="Jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-2">
                    <input type="number" class="form-control" id="jumlah" name="jumlah" value="1">
                </div>
                <div class="col-sm-8">
                    <p class="font-weight-normal">sisa 9 </p>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="catatan">Catatan Pesanan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="catatan" rows="5" name="catatan" placeholder="contoh: aku mau yang kemeja warna merah 2, sama warna biru 1"></textarea>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card pt-2 pb-2 pl-4 pr-4 mb-4 mt-4">
                    <h4>Identitas</h4>
                    <p class="font-weight-light">identitas ini digunakan untuk mempermudah kurir nantinya</p>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="contoh: asep codet">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No. hp</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="contoh: 082112345678">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="card pt-2 pb-2 pl-4 pr-4 mb-4 mt-4">
                    <h4>Alamat</h4>
                    <p class="font-weight-light">produk yang di pesan akan di kirim ke alamat ini</p>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label" for="jalan">Jalan</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="jalan" rows="1" name="jalan" placeholder="contoh: jln tol no 12 kel. A, kec. B"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="kota">Kota</label>
                        <div class="col-10 input-group">
                            <select class="custom-select" id="kota" name="kota">
                                <?php for ($i = 0; $i < 10; $i++) : ?>
                                    <option value="0">Bandung</option>
                                    <option value="1">Jakarta</option>
                                    <option value="2">Surabaya</option>
                                    <option value="3">Garut</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pembayaran -->
        <div class="row justify-content-center">
            <div class="col-md">
                <div class="card pt-2 pb-2 pl-4 pr-4 mb-4 mt-4">
                    <h4>Pengiriman</h4>
                    <p class="font-weight-light">pilih kurir kepercayaan mu</p>

                    <div class="form-group row">
                        <label class="col-3 col-form-label" for="kurir">Kurir</label>
                        <div class="col-9 input-group">
                            <select class="custom-select" id="kurir" name="kurir">
                                <?php for ($i = 0; $i < 10; $i++) : ?>
                                    <option value="0">Jne</option>
                                    <option value="1">Tiki</option>
                                    <option value="2">J&T</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label" for="layanan">Layanan</label>
                        <div class="col-9 input-group">
                            <select class="custom-select" id="layanan" name="layanan">
                                <?php for ($i = 0; $i < 10; $i++) : ?>
                                    <option value="0">Yes (1-3 hari)</option>
                                    <option value="1">Reguler (2-3 hari)</option>
                                    <option value="2">Oke (2-5 hari)</option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md">
                <div class="card pt-2 pb-2 pl-4 pr-4 mb-4 mt-4">
                    <h4>Pembayaran</h4>
                    <p class="font-weight-light">Pilih metode pembayaran yang kamu inginkan</p>
                    <div class="form-group row">
                        <label class="col-3 col-form-label" for="bank">bank</label>
                        <div class="col-9 input-group">
                            <select class="custom-select" id="bank" name="bank">
                                <?php for ($i = 0; $i < 10; $i++) : ?>
                                    <option value="0">BCA</option>
                                    <option value="1">BRI</option>
                                    <option value="2">Mandiri</option>
                                <?php endfor; ?>
                            </select>


                        </div>
                        <p class="mt-2 container font-weight-light text-center">
                            kode transfer pembayaran akan di kirim ketika selesai melakukan konfirmasi
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-warning">Konfirmasi Pembelian</button>
            </div>
        </div>
    </form>
</div>


<?= $this->endSection(); ?>