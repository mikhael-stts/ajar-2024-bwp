<?php
require __DIR__ . "/includes/connection.php";

if (isset($_POST['pengguna_username'], $_POST['pengguna_password'])) {
    $statement = $pdo->prepare("SELECT pengguna_id, pengguna_password FROM pengguna WHERE pengguna_username = ?");
    $statement->execute([$_POST['pengguna_username']]);
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_POST['pengguna_password'], $user['pengguna_password'])) {
        // Session fixation attack protection
        // baca ini https://ms-official5878.medium.com/session-fixation-530ff0348ee4
        session_regenerate_id();
        $statement = $pdo->prepare("SELECT pengguna_id,pengguna_nama, pengguna_username, pengguna_role FROM pengguna WHERE pengguna_id = ?");
        $statement->execute([$user['pengguna_id']]);
        $userData = $statement->fetch(PDO::FETCH_ASSOC);
        $_SESSION['yanglogin'] = $userData;
        header("Location: index.php");
        exit;
    } else {
        $_SESSION['pesan']['tipe'] = "gagal";
        $_SESSION['pesan']['isi'] = "Gagal Login, coba lagi broo";
        header("Location: login.php");
        exit;
    }
}
