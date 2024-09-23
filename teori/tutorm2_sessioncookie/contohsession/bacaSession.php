<?php
session_start();

echo $_SESSION["mhs"] ?? "tidak ada mhs";

if (isset($_SESSION["anime"])) {
    foreach ($_SESSION["anime"] as $key => $value) {
        echo "Anime ke $key bernama $value";
    }
} else {
    echo "tidak ada anime";
}
