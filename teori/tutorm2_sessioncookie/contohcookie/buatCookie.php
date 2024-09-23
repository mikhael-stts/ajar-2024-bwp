<?php
session_start();

echo "buat cookie <br>";
$durasi = 60 * 60 * 24 * 30; //60 detik * 60 menit * 24 jam * 30 hari
setcookie("dosen", "mimi", time() + $durasi);

$anime = ['Stardust Crusader', 'Diamond Unbreakable', 'Golden Wind'];
var_dump($anime);
echo "<br>";
$stringAnime = json_encode($anime);
var_dump($stringAnime);

setcookie("anime", $stringAnime, time() + $durasi);


echo "<hr>";
echo "<h1>Hati-hati cookie tidak bisa langsung di baca, harus sampai dulu ke browser</h1>";
var_dump($_COOKIE);
echo "<h1>Berbeda dengan session yang bisa langsung di baca karena server yang menyimpan</h1>";
$_SESSION["ini"] = "ini bukti sesssion langsung bisa di baca";
echo $_SESSION["ini"];
