<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


<?php
$p = $produk["produk"];
$h = $produk["harga"];
$d = $produk["diskon"];
$r = $produk["rating"];
$u = $produk["ukuran"];
$u_2 = $ukuran;
?>

<div class="container">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>
    <form action="/user/beli" method="POST" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <input type="hidden" class="form-control" value="<?= $h["harga_saat_ini"]; ?>" id="harga_produk_value" name="harga_produk_value">
        <input type="hidden" class="form-control" value="0" id="biaya_kurir_value" name="biaya_kurir_value">
        <input type="hidden" class="form-control" value="" id="layanan_kurir_name" name="layanan_kurir_name">
        <input type="hidden" class="form-control" value="<?= $p['id_produk']; ?>" id="id_produk" name="id_produk">
        <input type="hidden" class="form-control" value="<?= user_id(); ?>" id="id_user" name="id_user">


        <div class="col mt-5">
            <h3>Pembelian</h3>
            <p>Dapatkan banyak diskon dan produk menarik lainnya</p>
        </div>

        <div class="card pt-2 pb-2 pl-4 pr-4 mb-4 mt-4">
            <h4>Informasi Produk</h4>
            <p class="font-weight-light">Beri kami informasi yang jelas yah, biar sesuai dengan keinginan kamu</p>

            <div class="row">

                <div class="col-md-3">
                    <div class="card mb-2">
                        <img src="/img/<?= $p["gambar"]; ?>" class="card-img-top">
                        <div class="card-body">
                            <div class="row">
                                <p class="col-12 text-truncate text-dark card-title primary"><?= $p["nama_produk"]; ?></p>
                            </div>

                            <?php if ($d['diskon_persen'] != null || $d['diskon_persen'] > 0) : ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <p class="badge badge-success"><?= $d["diskon_persen"]; ?> %</p>
                                    </div>

                                    <div class="col-md-9">
                                        <p class="text-secondary font-weight-light"><s> Rp. <?= number_format($h["harga_normal"]); ?></s></p>
                                    </div>

                                </div>

                            <?php endif; ?>

                            <h6 class="text-dark card-text font-weight-bold">Rp. <?= number_format($h["harga_saat_ini"]); ?></h6>

                            <div class="row">
                                <div class="col-md-8">
                                    <?php for ($i = 0; $i < 5; $i++) : ?>
                                        <img src="/assets/img/<?= ($r['total_rating'] > $i) ? 'star_true.png' : 'star_false.png'; ?>" width="15">
                                    <?php endfor; ?>
                                </div>

                                <div class="col-md-4">
                                    <p class="text-right text-secondary font-weight-light">(<?= $p['total_pesanan']; ?>)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="form-group row">
                        <label for="Jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                        <div class="col-sm-2">
                            <input type="number" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" id="jumlah" name="jumlah" value="1" onchange="generateHargaProduk(<?= $h['harga_saat_ini']; ?>, <?= $p['stok_produk']; ?>)">
                        </div>
                        <div class="col-sm-7">
                            <h4>
                                <small class="text-muted">sisa </small><?= $p['stok_produk']; ?>
                            </h4>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label" for="catatan">Catatan Pesanan</label>
                        <div class="col-sm-9">
                            <textarea class="form-control <?= ($validation->hasError('catatan')) ? 'is-invalid' : ''; ?>" id="catatan" rows="5" name="catatan" placeholder="contoh: aku mau yang ukuran XL 2 pcs, yang ukuran M 3 pcs"><?= old('catatan'); ?></textarea>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <label class="col-sm-3 col-form-label" for="catatan">Ukuran Tersedia</label>
                        <div class="col-sm-9">
                            <?php $maxCol = 6 ?>
                            <?php for ($i = 0; $i < $maxCol; $i++) : ?>
                                <?php $id_ukuran = $u["id_ukuran_" . ($i + 1)]; ?>
                                <?php if ($id_ukuran  !== null && trim($id_ukuran, "") !== "") : ?>
                                    <?php foreach ($u_2 as $ukuran) : ?>
                                        <?php if ($ukuran['id_ukuran'] == $id_ukuran) : ?>
                                            <p class="col-md-2 badge badge-info ml-2 mr-2 pt-2 pb-2"><?= $ukuran['nama_ukuran']; ?></p>

                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </div>
                    </div>

                    <div class="form-group row mt-5 justify-content-center">
                        <label class="col-9 col-form-label"></label>
                        <div class="col input-group">
                            <fieldset disabled>
                                <input type="text" class="form-control" id="harga_produk_text" placeholder="Rp. <?= number_format($h["harga_saat_ini"]); ?>" name="harga_produk_text">
                            </fieldset>

                        </div>
                    </div>
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
                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" placeholder="contoh: asep codet" value="<?= old('nama'); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No. hp</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : ''; ?>" id="no_hp" name="no_hp" placeholder="contoh: 082112345678" value="<?= old('no_hp'); ?>">
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
                            <textarea class="form-control <?= ($validation->hasError('jalan')) ? 'is-invalid' : ''; ?>" id="jalan" rows="1" name="jalan" placeholder="contoh: jln tol no 12 kel. A, kec. B"><?= old('jalan'); ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label" for="kota">Kota</label>
                        <div class="col-10 input-group">
                            <select class="custom-select <?= ($validation->hasError('kota')) ? 'is-invalid' : ''; ?>" id="kota" name="kota">
                                <?php foreach ($kota as $k) : ?>
                                    <option value="<?= $k['city_id']; ?>"><?= $k['city_name']; ?></option>
                                <?php endforeach; ?>
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
                            <select class="custom-select <?= ($validation->hasError('layanan_kurir_name')) ? 'is-invalid' : ''; ?>" id="kurir" name="kurir">
                                <option value="pilih">pilih kurir</option>
                                <option value="tiki">Tiki</option>
                                <option value="jne">Jne</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row" id="layanan_kurir">

                    </div>

                    <div class="form-group row">
                        <label class="col-8 col-form-label"></label>
                        <div class="col input-group">
                            <fieldset disabled>
                                <input type="text" class="form-control" value="RP. 0" id="biaya_kurir_text" name="biaya_kurir_text">
                            </fieldset>

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
                            <select class="custom-select selectpicker" id="bank" name="bank">
                                <?php foreach ($bank as $b) : ?>
                                    <option value="<?= $b['id_bank']; ?>"><?= $b['nama_bank']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                    </div>

                    <div class="form-group row">
                        <label class="col-8 col-form-label"></label>

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