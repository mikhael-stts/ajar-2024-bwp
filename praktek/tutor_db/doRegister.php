<?php
require __DIR__ . "/includes/connection.php";

if (isset($_POST['pengguna_nama'], $_POST['pengguna_username'], $_POST['pengguna_password'])) {
    $statement = $pdo->prepare("INSERT INTO pengguna (pengguna_nama, pengguna_username, pengguna_password,pengguna_role) VALUES (:nama, :username, :password,:role)");
    $statement->execute([
        'nama' => $_POST['pengguna_nama'],
        'username' => $_POST['pengguna_username'],
        'password' => password_hash($_POST['pengguna_password'], PASSWORD_DEFAULT),
        'role' => 'pengguna'
    ]);
    $_SESSION['pesan']['tipe'] = "sukses";
    $_SESSION['pesan']['isi'] = "Berhasil Register";
    header("Location: register.php");
    exit;
}
