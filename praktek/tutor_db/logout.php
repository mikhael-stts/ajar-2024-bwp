<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
unset($_SESSION['yanglogin']);
header("Location: login.php");
exit;
