<?php
session_start();

// session_start() WAJIB DIBUAT SETIAP MAU PAKAI SESSION, DAN HARUS PALING ATAS

$_SESSION['mhs'] = 'mimi';
$_SESSION['anime'] = ['jojo1', 'jojo2', 'jojo3'];

// $_SESSION["namabarang"] = $_GET["namabarang"];
// $_SESSION["namabarang"] = $_POST["namabarang"];

var_dump($_SESSION);

echo $_SESSION['mhs'];
