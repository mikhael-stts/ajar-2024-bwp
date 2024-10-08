<?php
require_once __DIR__ . "/data.php";
require_once __DIR__ . "/layout/header.php";
require_once __DIR__ . "/includes/connection.php";

if (isset($_GET['search'], $_GET['tahun_awal'], $_GET['tahun_akhir'])) {
    $search = $_GET['search'];
    $awal = $_GET['tahun_awal'];
    $akhir = $_GET['tahun_akhir'];
    $statement = $pdo->prepare("SELECT * FROM anime join genre on anime.genre_id = genre.genre_id WHERE anime_name LIKE ? AND anime_year BETWEEN ? AND ?");
    $statement->execute(["%$search%", $awal, $akhir]);
    $anime = $statement->fetchAll(PDO::FETCH_ASSOC);
} else {
    // get all anime using $pdo
    $statement = $pdo->prepare("SELECT * FROM anime join genre on anime.genre_id = genre.genre_id");
    $statement->execute();
    $anime = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center my-3">Web Anime Saya</h1>
        </div>
    </div>
    <div class="row">
        <h3>Most Popular Anime</h3>

        <form action="" method="get">
            <div class="mb-3">
                <label class="form-label">Nama Anime</label>
                <input type="text" class="form-control" placeholder="Masukkan nama anime" name="search">
            </div>
            <div class="mb-3">
                <label>Tahun Anime</label>
                <input type="number" class="form-control" placeholder="Masukkan tahun awal" name="tahun_awal"> sampai dengan
                <input type="number" class="form-control" placeholder="Masukkan tahun akhir" name="tahun_akhir">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <?php foreach ($anime as $a) : ?>
            <div class="col-sm-4 mb-3">
                <div class="card">
                    <img src="<?= $a['anime_image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $a['anime_name'] ?> (<?= strlen($a['anime_name']) ?> Karakter )</h5>
                        <p class="card-text"><?= $a['anime_description'] ?></p>
                    </div>
                    <div class="card-body">
                        <?php if ($a['anime_year'] >= 1990 && $a['anime_year'] < 2000) : ?>
                            <span class="badge rounded-pill bg-secondary">Anime Lama</span>
                        <?php elseif ($a['anime_year'] >= 2000 && $a['anime_year'] < 2010) : ?>
                            <span class="badge rounded-pill bg-success">Anime Baru</span>
                        <?php elseif ($a['anime_year'] >= 2010) : ?>
                            <span class="badge rounded-pill bg-warning">Anime Baru Sekali</span>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        Dirilis pada <?= $a['anime_year'] ?>
                    </div>
                    <div class="card-body">
                        Bergenre <?= $a['genre_name'] ?>
                    </div>
                    <div class="card-body">
                        <a href="detail.php?nama=<?= $a['anime_name'] ?>" class="card-link">Detail</a>
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
require_once __DIR__ . "/layout/footer.php";
?>