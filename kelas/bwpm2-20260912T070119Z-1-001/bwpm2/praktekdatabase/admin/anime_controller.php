<?php

session_start();

// if (isset($_POST['nama']) && isset($_POST['gambar']) && isset($_POST['deskripsi'])) {
if (isset($_POST['nama'], $_POST['gambar'], $_POST['deskripsi'])) {
    // ubah dulu jadi array assosiatif data baru
    $databaru = [
        'nama' => $_POST['nama'],
        'gambar' => $_POST['gambar'],
        'deskripsi' => $_POST['deskripsi'],
    ];
    // insert ke session
    $_SESSION['anime'][] = $databaru;
}


header('Location: anime_view.php');
exit;
