<?php

session_start();

unset($_SESSION['mhs']);

echo "berhasil menghapus";

// $_SESSION bentuknya itu array
session_unset(); // $_SESSION jadi []
session_destroy(); // $_SESSION jadi null