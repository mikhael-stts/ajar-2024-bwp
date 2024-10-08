<?php
require_once __DIR__ . '/../../includes/connection.php';

// Handle adding or updating anime
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['anime_name'], $_POST['genre_id'], $_POST['anime_year'], $_POST['anime_image'], $_POST['anime_description'])) {
        $editIndex = isset($_POST['editIndex']) && $_POST['editIndex'] !== '' ? (int)$_POST['editIndex'] : -1;
        $animeData = [
            'anime_name' => $_POST['anime_name'],
            'genre_id' => $_POST['genre_id'],
            'anime_year' => $_POST['anime_year'],
            'anime_image' => $_POST['anime_image'],
            'anime_description' => $_POST['anime_description'],
        ];

        // If editing an existing anime
        if ($editIndex >= 0) {
            // Update the anime using $pdo
            $pdo->prepare('UPDATE anime SET anime_name = :anime_name, genre_id = :genre_id, anime_year = :anime_year, anime_image = :anime_image, anime_description = :anime_description WHERE anime_id = :editIndex')->execute(array_merge($animeData, ['editIndex' => $editIndex]));
        } else {
            // Otherwise, add new anime using $pdo
            $pdo->prepare('INSERT INTO anime (anime_name, genre_id, anime_year, anime_image, anime_description) VALUES (:anime_name, :genre_id, :anime_year, :anime_image, :anime_description)')->execute($animeData);
        }
    }
}

// Handle delete action
if (isset($_POST['deleteIndex'])) {
    $pdo->prepare('DELETE FROM anime WHERE anime_id = :deleteIndex')->execute(['deleteIndex' => $_POST['deleteIndex']]);
}

// Redirect back to the master page
header('Location: anime_view.php');
exit;
