<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/navbar_user'); ?>
<div class="container">


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
        <div class="col-sm-4 mx-auto">


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
            <h5 class="font-weight-bold"><?= $p["nama_produk"]; ?></h5>
            <h5>rating : <?= $r["total_rating"]; ?></h5>
            <h5>terjual : <?= $p["total_pesanan"]; ?></h5>
            <div class="divider"></div>

            <?php if ($d["diskon_persen"] !== null && $d["diskon_persen"] !== 0) : ?>
                <h5>diskon : <?= $d["diskon_persen"]; ?> %</h5>
                <h5>sisa diskon : untuk <?= $d["total_produk"]; ?> produk</h5>
                <h5>harga normal : <?= $h["harga_normal"]; ?></h5>

            <?php endif ?>

            <h5>harga : <?= $h["harga_saat_ini"]; ?></h5>

            <h5>terjual : <?= $p["total_pesanan"]; ?></h5>

            <h5>stok : <?= $p["stok_produk"]; ?></h5>
            <h5>deskripsi : <?= $p["deskripsi_produk"]; ?></h5>
            <h5>jenis : <?= $p["jenis"]; ?></h5>



            <h3>ukuran</h3>
            <ul>
                <?php
                $maxCol = 6;
                for ($i = 0; $i < $maxCol; $i++) {
                    $id_ukuran = $u["id_ukuran_" . ($i + 1)];
                    if ($id_ukuran  !== null && trim($id_ukuran, "") !== "") {
                        foreach ($u_2 as $ukuran) {
                            if ($ukuran['id_ukuran'] == $id_ukuran) { ?>
                                <li>
                                    <h5><?= $ukuran['nama_ukuran']; ?></h5>
                                </li>
                <?php }
                        }
                    }
                } ?>
            </ul>

            <h3>kategori</h3>
            <ul>
                <?php
                $maxCol = 3;
                for ($i = 0; $i < $maxCol; $i++) {
                    $id_kategori = $k["id_kategori_" . ($i + 1)];
                    if ($id_kategori  !== null && trim($id_kategori, "") !== "") {
                        foreach ($k_2 as $kategori) {
                            if ($kategori['id_kategori'] == $id_kategori) { ?>
                                <li>
                                    <h5><?= $kategori['nama_kategori']; ?></h5>
                                </li>
                <?php }
                        }
                    }
                } ?>
            </ul>
        </div>

    </div>

    <?= $this->endSection(); ?>