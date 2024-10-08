<?php
require_once __DIR__ . "/layout/header.php";
?>
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1>Welcome, to Web Anime Saya</h1>
            <h5>Untuk Login, silakan masukkan username dan password anda</h5>
            <form method="post" action="cekLogin.php">
                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="pengguna_username" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="pengguna_password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <?php
            if (isset($_SESSION["pesan"])) {
                $tipe = $_SESSION["pesan"]["tipe"];
                $isi = $_SESSION["pesan"]["isi"];
            ?>
                <div class="mt-3 alert <?= ($tipe == "sukses" ? "alert-success" : "alert-danger") ?>">
                    <?= $isi ?>
                </div>
            <?php
                unset($_SESSION["pesan"]);
            }
            ?>
        </div>
    </div>
</div>
<?php
require_once __DIR__ . "/layout/footer.php";
?>