<?php
require_once __DIR__ . '/../layout/header.php';
?>

<h1>
    Master Anime
</h1>
<div class="row">
    <div class="col">
        <form action="./anime_controller.php" method="post">
            <div class="mb-3">
                <label class="form-label">Nama Anime</label>
                <input type="text" class="form-control" name="nama" />
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar Anime</label>
                <input type="text" class="form-control" name="gambar" />
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi Anime</label>
                <input type="text" class="form-control" name="deskripsi" />
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<?php
var_dump($_SESSION['anime']);
require_once __DIR__ . '/../layout/footer.php';
?>