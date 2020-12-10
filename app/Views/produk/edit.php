<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>


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


<div class="container">
    <form action="/produk/save/<?= $p['id_produk']; ?>" method="POST">
        <?= csrf_field(); ?>
        <div class="form-group row">
            <label for="gambar_1" class="col-sm-2 col-form-label">Gambar 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('gambar_1')) ? 'is-invalid' : ''; ?>" id="gambar_1" name="gambar_1" value="<?= (old('gambar_1')) ?? $g['gambar_1']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('gambar_1'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="gambar_2" class="col-sm-2 col-form-label">Gambar 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="gambar_2" name="gambar_2" value="<?= (old('gambar_2')) ?? $g['gambar_2']; ?>">
            </div>
        </div>

        <div class=" form-group row">
            <label for="gambar_3" class="col-sm-2 col-form-label">Gambar 3</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="gambar_3" name="gambar_3" value="<?= (old('gambar_3')) ?? $g['gambar_3']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="gambar_4" class="col-sm-2 col-form-label">Gambar 4</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="gambar_4" name="gambar_4" value="<?= (old('gambar_4')) ?? $g['gambar_4']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="gambar_5" class="col-sm-2 col-form-label">Gambar 5</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="gambar_5" name="gambar_5" value="<?= (old('gambar_5')) ?? $g['gambar_5']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= old('nama') ?? $p['nama_produk']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('nama'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi Produk</label>
            <div class="col-sm-10">
                <textarea class="form-control <?= ($validation->hasError('deskripsi')) ? 'is-invalid' : ''; ?>" id="deskripsi" rows="5" name="deskripsi"><?= old('deskripsi') ?? $p['deskripsi_produk']; ?></textarea>
                <div class="invalid-feedback">
                    <?= $validation->getError('deskripsi'); ?>
                </div>
            </div>
        </div>


        <div class="form-group row">
            <label for="stok" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                <input type="number" class="form-control <?= ($validation->hasError('stok')) ? 'is-invalid' : ''; ?>" id="stok" name="stok" value="<?= old('stok') ?? $p['stok_produk']; ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('stok'); ?>
                </div>
            </div>
        </div>


        <div class="form-group row">
            <input type="hidden" class="form-control <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>" id="harga" name="harga" value="<?= $h['harga_normal']; ?>">
        </div>



        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Jenis</legend>
                <div class="col-sm-10">
                    <?php if ($validation->hasError('jenis')) : ?>
                        <p class="text-danger"> <?= $validation->getError('jenis'); ?></p>
                    <?php endif; ?>
                    <?php foreach ($jenis as $j) : ?>
                        <?php $idJenis = (old('jenis') ?? $p['id_jenis']);  ?>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="jenis" id="jenis_<?= $j['id_jenis']; ?>" value="<?= $j['id_jenis']; ?>" <?= ($idJenis == $j['id_jenis']) ? "checked" : ""; ?>>
                            <label class="form-check-label" for="jenis_<?= $j['id_jenis']; ?>">
                                <?= $j['nama_jenis']; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </fieldset>




        <div class="form-group row">
            <div class="col-sm-2">Kategori</div>
            <div class="col-sm-10">
                <?php if ($validation->hasError('kategori')) : ?>
                    <p class="text-danger"> <?= $validation->getError('kategori'); ?></p>
                <?php endif; ?>

                <?php $i = 0;
                foreach ($kategori as $k) :

                    $idNow = $k['id_kategori'];
                    $checked = false;

                    if (old('kategori') != null) {
                        foreach (old('kategori') as $id) {
                            if ($id == $idNow) {
                                $checked = true;
                                break;
                            }
                        }
                    } else {
                        $ks = $data['kategori'];
                        for ($i = 0; $i < 3; $i++) {
                            $key = "id_kategori_" . ($i + 1);
                            if ($ks[$key] == $idNow) {
                                $checked = true;
                                break;
                            }
                        }
                    }
                ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="kategori[]" value=<?= $k['id_kategori']; ?> <?= ($checked) ? "checked" : ""; ?>>
                        <label class="form-check-label" for="kategori">
                            <?= $k['nama_kategori']; ?>
                        </label>

                    </div>
                <?php $i++;
                endforeach; ?>
            </div>
        </div>



        <div class="form-group row">
            <div class="col-sm-2">Ukuran</div>
            <div class="col-sm-10">
                <?php $i = 0;
                foreach ($ukuran as $u) :


                    $idNow = $u['id_ukuran'];
                    $checked = false;

                    if (old('ukuran') != null) {
                        foreach (old('ukuran') as $id) {
                            if ($id == $idNow) {
                                $checked = true;
                                break;
                            }
                        }
                    } else {
                        $us = $data['ukuran'];
                        for ($i = 0; $i < 6; $i++) {
                            $key = "id_ukuran_" . ($i + 1);
                            if ($us[$key] == $idNow) {
                                $checked = true;
                                break;
                            }
                        }
                    }


                ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="ukuran[]" value=<?= $u['id_ukuran']; ?> <?= ($checked) ? "checked" : ""; ?>>
                        <label class="form-check-label" for="ukuran">
                            <?= $u['nama_ukuran']; ?>
                        </label>
                    </div>
                <?php $i++;
                endforeach; ?>
            </div>
        </div>






        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-warning">Ubah</button>
            </div>
        </div>
    </form>
</div>


<?= $this->endSection(); ?>