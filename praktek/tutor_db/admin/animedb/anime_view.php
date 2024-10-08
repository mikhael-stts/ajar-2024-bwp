<?php
require_once __DIR__ . '/../../includes/connection.php';

// get genre data from database
$statement = $pdo->prepare('SELECT * FROM genre');
$statement->execute();
$genreList = $statement->fetchAll(PDO::FETCH_ASSOC);

// get anime data from database using pdo prepare statement
$statement = $pdo->prepare('SELECT * FROM anime JOIN genre ON anime.genre_id = genre.genre_id');
$statement->execute();
$animeList = $statement->fetchAll(PDO::FETCH_ASSOC);

// If editing, load the selected anime data
if (isset($_GET['edit'])) {
    $editIndex = $_GET['edit'];
    $statement = $pdo->prepare('SELECT * FROM anime JOIN genre ON anime.genre_id = genre.genre_id WHERE anime_id = :editIndex');
    $statement->execute(["editIndex" => $editIndex]);
    $animeToEdit = $statement->fetch(PDO::FETCH_ASSOC);
}

require_once __DIR__ . '/../../layout/header.php';
?>
<div class="container mt-5">
    <h1 class="mb-4">Master Anime Pakai Database</h1>
    <form action="anime_controller.php" method="post" class="mb-5">
        <input type="hidden" name="editIndex" value="<?= $editIndex ?? "" ?>">

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Anime</label>
            <input type="text" class="form-control" name="anime_name" value="<?= $animeToEdit['anime_name'] ?? '' ?>" required>
        </div>

        <!-- create select box with genreList as options -->
        <div class="mb-3">
            <label for="genre" class="form-label">Genre</label>
            <select class="form-select" name="genre_id" required>
                <?php foreach ($genreList as $genre): ?>
                    <option value="<?= $genre['genre_id'] ?>" <?= isset($animeToEdit) && $animeToEdit['genre_id'] == $genre['genre_id'] ? 'selected' : '' ?>><?= $genre['genre_name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="tanggal_rilis" class="form-label">Tanggal Rilis</label>
            <input type="text" class="form-control" name="anime_year" value="<?= $animeToEdit['anime_year'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">URL Gambar</label>
            <input type="url" class="form-control" name="anime_image" value="<?= $animeToEdit['anime_image'] ?? '' ?>" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="anime_description" rows="3" required><?= $animeToEdit['anime_description'] ?? '' ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <h2 class="mb-3">Anime List</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Genre</th>
                <th>Tanggal Rilis</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($animeList) && count($animeList) > 0): ?>
                <?php foreach ($animeList as $anime): ?>
                    <tr>
                        <td><?= $anime['anime_id'] ?></td>
                        <td><?= $anime['anime_name'] ?></td>
                        <td><?= $anime['genre_name'] ?></td>
                        <td><?= $anime['anime_year'] ?></td>
                        <td><img src="<?= $anime['anime_image'] ?>" alt="Gambar" width="100"></td>
                        <td><?= $anime['anime_description'] ?></td>
                        <td>
                            <a href="?edit=<?= $anime['anime_id'] ?>" class="btn btn-warning">Edit</a>
                            <form action="anime_controller.php" method="post" style="display:inline-block;">
                                <input type="hidden" name="deleteIndex" value="<?= $anime['anime_id'] ?>">
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
require_once __DIR__ . '/../../layout/footer.php';
?>