<?php
session_start();

echo $_SESSION['mhs'];

foreach ($_SESSION['anime'] as $key => $value) {
    echo "Anime {$value}";
}
