<?php
require_once 'data.php';
require_once "layout/header.php";
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center my-3">Web Anime Saya</h1>
        </div>
    </div>
    <div class="row">
        <h3>Most Popular Anime</h3>
        <?php foreach ($anime as $a) : ?>
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <img src="<?= $a['gambar'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $a['nama'] ?> (<?= strlen($a['nama']) ?> Karakter )</h5>
                        <p class="card-text"><?= $a['deskripsi'] ?></p>
                    </div>
                    <div class="card-body">
                        <?php if ($a['tanggal_rilis'] >= 1990 && $a['tanggal_rilis'] < 2000) : ?>
                            <span class="badge rounded-pill bg-secondary">Anime Lama</span>
                        <?php elseif ($a['tanggal_rilis'] >= 2000 && $a['tanggal_rilis'] < 2010) : ?>
                            <span class="badge rounded-pill bg-success">Anime Baru</span>
                        <?php elseif ($a['tanggal_rilis'] >= 2010) : ?>
                            <span class="badge rounded-pill bg-warning">Anime Baru Sekali</span>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        Dirilis pada <?= sudahBerapaTahun($a['tanggal_rilis']) ?> tahun yang lalu
                    </div>
                    <div class="card-body">
                        <a href="detail.php?nama=<?= $a['nama'] ?>" class="card-link">Detail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <h3>Cek Data</h3>
        <div class="col">
        </div>
    </div>
</div>

<?php
require_once "layout/footer.php";
?>