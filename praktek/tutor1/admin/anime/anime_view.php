<?php
// Start the session
session_start();

// Initialize session data if not already set
if (!isset($_SESSION['anime'])) {
    $_SESSION['anime'] = [
        [
            'nama' => 'Attack on Titan',
            'tanggal_rilis' => '2013',
            'gambar' => 'https://i.pinimg.com/originals/7a/0d/c2/7a0dc24f568b81a39ba1ce797f65d355.jpg',
            'deskripsi' => 'Attack on Titan adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Hajime Isayama.'
        ],
        [
            'nama' => 'My Hero Academia',
            'tanggal_rilis' => '2016',
            'gambar' => 'https://wallpapers.com/images/featured/my-hero-academia-pictures-otjtzn3d4q78f6kx.jpg',
            'deskripsi' => 'My Hero Academia adalah serial anime Jepun yang diadaptasi dari manga berjudul sama karya Kohei Horikoshi.'
        ],
    ];
}

// If editing, load the selected anime data
$editIndex = isset($_GET['edit']) ? $_GET['edit'] : -1;
$animeToEdit = $editIndex >= 0 ? $_SESSION['anime'][$editIndex] : null;

require_once '../../layout/header.php';
?>
<div class="container mt-5">
    <h1 class="mb-4">Master Anime</h1>
    <form action="anime_controller.php" method="post" class="mb-5">
        <input type="hidden" name="editIndex" value="<?= $editIndex ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anime</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $animeToEdit['nama'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
            <input type="text" class="form-control" id="tanggal_rilis" name="tanggal_rilis" value="<?= $animeToEdit['tanggal_rilis'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">URL Gambar</label>
            <input type="url" class="form-control" id="gambar" name="gambar" value="<?= $animeToEdit['gambar'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required><?= $animeToEdit['deskripsi'] ?? '' ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h2 class="mb-3">Anime List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal Rilis</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($_SESSION['anime']) && count($_SESSION['anime']) > 0): ?>
                <?php foreach ($_SESSION['anime'] as $index => $anime): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $anime['nama'] ?></td>
                        <td><?= $anime['tanggal_rilis'] ?></td>
                        <td><img src="<?= $anime['gambar'] ?>" alt="Gambar" width="100"></td>
                        <td><?= $anime['deskripsi'] ?></td>
                        <td>
                            <a href="?edit=<?= $index ?>" class="btn btn-warning">Edit</a>
                            <form action="anime_controller.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="deleteIndex" value="<?= $index ?>">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No anime data available.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
require_once '../../layout/footer.php';
?>