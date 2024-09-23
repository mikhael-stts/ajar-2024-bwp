<?php

echo $_COOKIE['dosen'] ?? "dosennya tidak ada";
echo "<br>";

if (isset($_COOKIE['anime'])) {
    $arranime = json_decode($_COOKIE['anime']);

    foreach ($arranime as $key => $value) {
        echo "$key. bernama $value <br>";
    }
} else {
    echo "tidak ada anime";
}
