<?php

echo "Buat Cookie<br/>";

// cookie dalam detik, konfigurasi dibawah 60 detik -> 1 jam -> 24 jam -> 30 hari 
$durasi = 60 * 60 * 24 * 30;
setcookie("dosen", "mimi", time() + $durasi);

// cookie menyimpan WAJIB STRING
// json_encode mengubah array menjadi string
$anime = ["Stardust crusader", "Diamond unbreakable", "Golden wind"];
setcookie('anime', json_encode($anime), time() + $durasi);


// TIDAK BISA DIBACA LANGSUNG PERTAMA KALI, 
//KENAPA? KARENA PADA REQUEST PERTAMA, TIDAK ADA COOKIE DI BROWSER KITA

// coba langsung baca data cookie nya, bisa tidak
echo $_COOKIE['dosen'];
