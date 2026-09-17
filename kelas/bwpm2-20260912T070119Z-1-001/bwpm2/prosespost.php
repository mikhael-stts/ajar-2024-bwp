<?php
var_dump($_POST);


if (isset($_POST['namaku'])) {
    echo $_POST['namaku'];
} else {
    echo "Kosong";
}

// biasanya yang dilakukan disini adalah masukkan data ke database

// kalau sudah selesai semua proses, kita bisa REDIRECT ke halaman sebelumnya
// Hati2 jangan sampai salah tulis
header('Location: tutorformpost.php');
exit;
