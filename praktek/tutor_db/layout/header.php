<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
date_default_timezone_set('Asia/Jakarta');
define('BASE_URL', 'http://localhost/ajar/BWP_2024/praktek/tutor_db');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <?php if (isset($_SESSION['yanglogin']) && $_SESSION['yanglogin']['pengguna_role'] == "admin") : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="admin/animedb/anime_view.php">Admin</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="d-flex" role="search">
                    <?php if (isset($_SESSION['yanglogin'])) : ?>
                        <a href="<?= BASE_URL . "/logout.php" ?>" class="btn btn-danger" type="submit">Logout</a>
                    <?php else : ?>
                        <a href="login.php" class="btn btn-success" type="submit">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>