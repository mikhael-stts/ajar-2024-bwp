<?php
$now = date('d F Y H:i:s');
$year = date('Y');
$namadepan = "Kujo";
$namabelakang = "Jotaro";
?>

<div class="bg-dark text-white p-3 mt-3">
    <div class="text-center">Copyright &copy; <?= $year ?> - Web Anime Saya - <?= "$namadepan $namabelakang" ?></div>
    <div class="text-center">Hari ini tanggal : <?= $now ?></div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>