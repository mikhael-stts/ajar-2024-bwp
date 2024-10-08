<?php
// Start session
session_start();

// Handle adding or updating anime
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nama'], $_POST['tanggal_rilis'], $_POST['gambar'], $_POST['deskripsi'])) {
        $nama = $_POST['nama'];
        $tanggal_rilis = $_POST['tanggal_rilis'];
        $gambar = $_POST['gambar'];
        $deskripsi = $_POST['deskripsi'];
        $editIndex = isset($_POST['editIndex']) && $_POST['editIndex'] !== '' ? (int)$_POST['editIndex'] : -1;

        $animeData = [
            'nama' => $nama,
            'tanggal_rilis' => $tanggal_rilis,
            'gambar' => $gambar,
            'deskripsi' => $deskripsi,
        ];

        // If editing an existing anime
        if ($editIndex >= 0) {
            $_SESSION['anime'][$editIndex] = $animeData;
        } else {
            // Otherwise, add new anime
            $_SESSION['anime'][] = $animeData;
        }
    }
}

// Handle delete action
if (isset($_POST['deleteIndex'])) {
    $deleteIndex = (int)$_POST['deleteIndex'];
    unset($_SESSION['anime'][$deleteIndex]);
    $_SESSION['anime'] = array_values($_SESSION['anime']); // Re-index array
}

// Redirect back to the master page
header('Location: anime_view.php');
exit;
