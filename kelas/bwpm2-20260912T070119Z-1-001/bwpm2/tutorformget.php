<form action="" method="get">
    <input type="text" name="search" id="">
    <input type="submit" value="Cari">
</form>

<h1>Hasil Pencarian</h1>
<h2>
    <!-- ?? adalah cek apakah undefined, kalau ya, maka tampilkan yang dikanannya -->
    <?= $_GET['search'] ?? "Masukkan pencarian dulu ya (singkat)" ?>
</h2>

<h2>
    <?php
    if (isset($_GET['search'])) {
        echo $_GET['search'];
    } else {
        echo "Masukkan pencarian dulu yaa";
    }
    ?>
</h2>

<!-- BOLEH PAKAI $_REQUEST untuk ambil GET dan POST -->