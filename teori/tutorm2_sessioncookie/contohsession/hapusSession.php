<?php

session_start();

unset($_SESSION["mhs"]);

echo "menghapus session";

// untuk menghapus session session sekaligus
// contohnya pada saat logout
session_unset(); // []
session_destroy(); // null