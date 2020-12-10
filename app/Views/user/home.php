<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?= $this->include('layout/navbar_user'); ?>
<div class="container">
    <div class="row">
        <?php if ($produk == null) : ?>
            <h1>Data Tidak Di temukan</h1>
        <?php else : ?>
            <?php foreach ($produk as $data) : ?>

                <?php
                $p = $data["produk"];
                $h = $data["harga"];
                $d = $data["diskon"];
                $r = $data["rating"];
                ?>

                <div class="col-md-4">
                    <div class="card" style="width: 20rem;">
                        <img src="/img/<?= $p["gambar"]; ?>" class="card-img-top">
                        <div class="card-body">
                            <p class="card-title"><?= $p["nama_produk"]; ?></p>
                            <h5 class="card-text font-weight-bolder">Rp. <?= $h["harga_normal"]; ?></h5>
                            <a href="/produk/<?= $p["id_produk"]; ?>" class="btn btn-primary">detail</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>


            <?php foreach ($produk as $data) : ?>

                <?php
                $p = $data["produk"];
                $h = $data["harga"];
                $d = $data["diskon"];
                $r = $data["rating"];
                ?>

                <div class="col-md-4">
                    <div class="card" style="width: 20rem;">
                        <img src="/img/<?= $p["gambar"]; ?>" class="card-img-top">
                        <div class="card-body">
                            <p class="card-title"><?= $p["nama_produk"]; ?></p>
                            <h5 class="card-text font-weight-bolder">Rp. <?= $h["harga_normal"]; ?></h5>
                            <a href="/produk/<?= $p["id_produk"]; ?>" class="btn btn-primary">detail</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        <?php endif ?> </div>
</div>
<?= $this->endSection(); ?>