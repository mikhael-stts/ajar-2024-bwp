<?php
require_once __DIR__ . '/../../includes/connection.php';

if (!isset($_SESSION['yanglogin']) || $_SESSION['yanglogin']['pengguna_role'] !== 'admin') {
    http_response_code(403);
    echo json_encode(["error" => "Unauthorized access"]);
    exit;
}

// Fetch anime data
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['edit'])) {
        $statement = $pdo->prepare('SELECT * FROM anime JOIN genre ON anime.genre_id = genre.genre_id where anime_id = :edit');
        $statement->execute(['edit' => $_GET['edit']]);
        $anime = $statement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($anime);
        exit;
    } elseif ($_GET['tipe'] === 'genres') {
        $statement = $pdo->prepare('SELECT * FROM genre');
        $statement->execute();
        $genreList = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($genreList);
        exit;
    } else {
        $statement = $pdo->prepare('SELECT * FROM anime JOIN genre ON anime.genre_id = genre.genre_id');
        $statement->execute();
        $animeList = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($animeList);
        exit;
    }
}

// Add or update anime
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['deleteIndex'])) {
        $deleteIndex = $_POST['deleteIndex'] ?? null;
        if ($deleteIndex) {
            $pdo->prepare('DELETE FROM anime WHERE anime_id = :deleteIndex')->execute(['deleteIndex' => $deleteIndex]);
            echo json_encode(["message" => "Anime deleted successfully"]);
        } else {
            echo json_encode(["error" => "Invalid delete request"]);
        }
        exit;
    } else {
        $animeData = [
            'anime_name' => $_POST['anime_name'],
            'genre_id' => $_POST['genre_id'],
            'anime_year' => $_POST['anime_year'],
            'anime_image' => $_POST['anime_image'],
            'anime_description' => $_POST['anime_description']
        ];

        $editIndex = isset($_POST['editIndex']) && $_POST['editIndex'] !== '' ? (int)$_POST['editIndex'] : -1;

        if ($editIndex >= 0) {
            // Update the anime
            $pdo->prepare('UPDATE anime SET anime_name = :anime_name, genre_id = :genre_id, anime_year = :anime_year, anime_image = :anime_image, anime_description = :anime_description WHERE anime_id = :editIndex')
                ->execute(array_merge($animeData, ['editIndex' => $editIndex]));
            echo json_encode(["message" => "Anime updated successfully"]);
        } else {
            // Add new anime
            $pdo->prepare('INSERT INTO anime (anime_name, genre_id, anime_year, anime_image, anime_description) VALUES (:anime_name, :genre_id, :anime_year, :anime_image, :anime_description)')
                ->execute($animeData);
            echo json_encode(["message" => "Anime added successfully"]);
        }
        exit;
    }
}
