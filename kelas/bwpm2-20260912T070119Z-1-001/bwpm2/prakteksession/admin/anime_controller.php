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
if (isset($_POST['deleteIndex'])) {
    $deleteIndex = (int)$_POST['deleteIndex']; // wajib convert jadi integer ya!
    unset($_SESSION['anime'][$deleteIndex]);
    $_SESSION['anime'] = array_values($_SESSION['anime']); // array_values supaya bisa rapi
}


header('Location: anime_view.php');
exit;
