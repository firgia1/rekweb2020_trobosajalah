<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">

    <?php if ($pesanan == null) {
        echo "<h3>Tidak ada data</h3>";
        die();
    } ?>

    <div class="row">
        <div class="col">
            <h3>Daftar Pesanan Masuk</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Pemesan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($pesanan as $data) : ?>
                        <tr>
                            <th scope="row"><?= $data['id_pesanan']; ?></th>
                            <td><?= $data['nama_penerima']; ?></td>
                            <td><?= $data['tanggal_pemesanan']; ?></td>
                            <td><?= $data['total_pembayaran']; ?></td>
                            <td><a class="btn btn-primary" href="">Detail</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>