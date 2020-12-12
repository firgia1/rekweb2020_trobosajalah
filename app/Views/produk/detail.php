<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/navbar_user'); ?>
<div class="container mt-5 mb-5">


    <div class="row">

        <?php

        // Data dari produk
        $data = $produk[0];
        $p = $data["produk"];
        $h = $data["harga"];
        $d = $data["diskon"];
        $r = $data["rating"];
        $g = $data["gambar"];
        $u = $data["ukuran"];
        $k = $data["kategori"];

        // Data dari ukuran
        $u_2 = $ukuran;
        $k_2 = $kategori;
        ?>
        <!-- ini bagian kiri  -->
        <div class="col-sm-4">


            <!-- gambar utama -->
            <div class=" card" style="width: 18rem;">
                <img src="/img/<?= $p["gambar"]; ?>" class="card-img-top">
            </div>
            <!-- gambar lainnya -->
            <div class="row container">
                <?php
                $maxCol = 5;
                for ($i = 0; $i < $maxCol; $i++) {
                    $gambar = $g["gambar_" . ($i + 1)];
                    if ($gambar !== null && trim($gambar, "") !== "") {
                ?>
                        <div class="card" style="width: 4rem;">
                            <img src="/img/<?= $gambar; ?>" class="card-img-top">
                        </div>

                <?php }
                } ?>
            </div>
        </div>


        <!-- ini bagian kanan  -->
        <div class="col-sm-8">
            <h4 class="font-weight-bold"><?= $p["nama_produk"]; ?></h4>
            <h5><?= $p["jenis"]; ?></h5>
            <div class="row">
                <div class="col-md-2">
                    <?php for ($i = 0; $i < 5; $i++) : ?>
                        <img src="/assets/img/<?= ($r['total_rating'] > $i) ? 'star_true.png' : 'star_false.png'; ?>" width="15">
                    <?php endfor; ?>

                </div>

                <div class="col-md-10">
                    <p class="text-secondary font-weight-normal">terjual sebanyak <?= $p["total_pesanan"]; ?> produk</p>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-dark card-text font-weight-bold">Harga</h4>
                </div>

                <div class="col-md-9">
                    <h5 class="text-primary card-text font-weight-bold">Rp. <?= number_format($h["harga_saat_ini"]); ?></h5>

                    <?php if ($d['diskon_persen'] != null || $d['diskon_persen'] > 0) : ?>
                        <h6 class="text-secondary font-weight-light"><s> Rp. <?= number_format($h["harga_normal"]); ?></s></h6>

                        <div class="row">
                            <div class="col-md-1">
                                <h5 class="badge badge-success"><?= $d["diskon_persen"]; ?> %</h5>
                            </div>
                            <div class="col-md-11">
                                <p class="text-secondary font-weight-light">diskon tersedia untuk <?= $d["total_produk"]; ?> produk</p>
                            </div>
                        </div>

                    <?php endif; ?>

                </div>
            </div>
            <hr>



            <div class="row">
                <div class="col-md-3">
                    <h4 class="text-dark card-text font-weight-bold">Info Produk</h4>
                </div>

                <div class="col-md-9">
                    <h3>
                        <small class="text-muted">tersedia</small>
                        <p class="badge badge-warning"><?= $p["stok_produk"]; ?></p>
                        <small class="text-muted">produk</small>
                    </h3>
                    <hr>

                    <h3>kategori</h3>
                    <div class="row">
                        <?php $maxCol = 3 ?>
                        <?php for ($i = 0; $i < $maxCol; $i++) : ?>
                            <?php $id_kategori = $k["id_kategori_" . ($i + 1)]; ?>
                            <?php if ($id_kategori  !== null && trim($id_kategori, "") !== "") : ?>
                                <?php foreach ($k_2 as $kategori) : ?>
                                    <?php if ($kategori['id_kategori'] == $id_kategori) : ?>
                                        <p class="col-md-2 badge badge-info ml-2 mr-2 pt-2 pb-2"><?= $kategori['nama_kategori']; ?></p>

                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                    <hr>


                    <h3>ukuran</h3>
                    <div class="row">
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
                    <hr>
                </div>
            </div>
            <hr>




        </div>
        <h4 class="font-weight-bold">Deskripsi Produk</h4>
        <p class="lead"><?= $p["deskripsi_produk"]; ?></p>
    </div>

    <?= $this->endSection(); ?>