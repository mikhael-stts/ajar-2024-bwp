<?php

echo $_COOKIE['dosen'] . "<hr>";

var_dump($_COOKIE);


// json decode mengubah string jadi array
$decoded = json_decode($_COOKIE['anime']);
foreach ($decoded as $key => $value) {
    echo "Anime {$value} <br/>";
}
