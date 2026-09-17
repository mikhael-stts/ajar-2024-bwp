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
<div class="row">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['anime'])) {
                    foreach ($_SESSION['anime'] as $key => $value) {
                ?>
                        <tr>
                            <td><?= $key ?></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['gambar'] ?></td>
                            <td><?= $value['deskripsi'] ?></td>
                            <td>
                                <form action="anime_controller.php" method="post">
                                    <input type="hidden" name="deleteIndex" value="<?= $key ?>">
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr class="text-center">
                        <td colspan="5">Session Anime Belum di Set Isi datanya lewat form diatas</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
if (isset($_SESSION['anime'])) {
    var_dump($_SESSION['anime']);
} else {
    echo "Session Anime Belum di Set Isi datanya lewat form diatas";
}
require_once __DIR__ . '/../layout/footer.php';
?>