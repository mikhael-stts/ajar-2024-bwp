<?php
session_start();

$_SESSION['mhs'] = "jojo";
$_SESSION['anime'] = ["jojo1", "jojo2", "jojo3"];

echo "berhasil buat session";
echo $_SESSION['mhs'];
