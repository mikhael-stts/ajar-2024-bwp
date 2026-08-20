<?php

declare(strict_types=1);

// Contoh salah lokasi
// include('./teori/tutorm1_basic/myprocedure.php');
// include_once('./teori/tutorm1_basic/myprocedure.php');
// require('./teori/tutorm1_basic/myprocedure.php');
// require_once('./teori/tutorm1_basic/myprocedure.php');

require_once __DIR__ . '/myprocedure.php';
require_once __DIR__ . '/myclass/mahasiswa.php';

/*
 * MATERI DASAR PHP
 *
 * Cakupan:
 * 1. Basic PHP
 * 2. Tiga konstruksi fundamental: urutan, percabangan, dan perulangan
 * 3. Array
 * 4. Procedure dan function
 * 5. Class dan object
 *
 * Jalankan file ini melalui web server agar tag HTML <br> ditampilkan
 * sebagai baris baru di browser.
 */

echo '<h1>Materi Dasar PHP</h1>';

// ================================================================
// 1. BASIC PHP
// ================================================================
echo '<h2>1. Basic PHP</h2>';

// Variabel diawali tanda $. PHP menentukan tipe data secara dinamis.
$nama = 'Jojo';          // string
$umur = 20;              // integer
$tinggi = 170.5;         // float
$mahasiswaAktif = true;  // boolean

// Konstanta menyimpan nilai yang tidak berubah selama program berjalan.
const NAMA_KAMPUS = 'Universitas Contoh';

echo 'Nama: ' . $nama . '<br>';
echo "Umur: {$umur} tahun<br>";
echo 'Tinggi: ' . $tinggi . ' cm<br>';
echo 'Status: ' . ($mahasiswaAktif ? 'Aktif' : 'Tidak aktif') . '<br>';
echo 'Status: ' . ($mahasiswaAktif ? 'Aktif' : 'Tidak aktif') . '<br>';
// echo "Status {$mahasiswaAktif ? 'Aktif' : 'Tidak aktif'} <br>";
// echo "Status {($mahasiswaAktif ? 'Aktif' : 'Tidak aktif')} <br>";
echo 'Kampus: ' . NAMA_KAMPUS . '<br>';

// Operator aritmatika dan perbandingan.
$nilaiTugas = 80;
$nilaiUjian = 90;
$nilaiAkhir = ($nilaiTugas * 0.4) + ($nilaiUjian * 0.6);

echo "Nilai akhir: {$nilaiAkhir}<br>";

// ================================================================
// 2. TIGA KONSTRUKSI FUNDAMENTAL PEMROGRAMAN
// ================================================================
echo '<h2>2. Tiga Konstruksi Fundamental</h2>';

// A. URUTAN (sequence)
// Instruksi dijalankan dari atas ke bawah secara berurutan.
$panjang = 10;
$lebar = 5;
$luasPersegiPanjang = $panjang * $lebar;

echo '<h3>A. Urutan</h3>';
echo "Luas persegi panjang: {$luasPersegiPanjang}<br>";

// B. PERCABANGAN (selection)
// Program memilih blok kode berdasarkan suatu kondisi.
echo '<h3>B. Percabangan</h3>';

if ($nilaiAkhir >= 85) {
    $grade = 'A';
} elseif ($nilaiAkhir >= 70) {
    $grade = 'B';
} elseif ($nilaiAkhir >= 60) {
    $grade = 'C';
} else {
    $grade = 'D';
}

echo "Grade: {$grade}<br>";

$hari = 2;

switch ($hari) {
    case 1:
        $namaHari = 'Senin';
        break;
    case 2:
        $namaHari = 'Selasa';
        break;
    default:
        $namaHari = 'Hari tidak diketahui';
}

echo "Hari ke-{$hari}: {$namaHari}<br>";

// C. PERULANGAN (iteration)
// Program menjalankan blok kode berulang kali.
echo '<h3>C. Perulangan</h3>';

echo '<strong>Perulangan for:</strong><br>';
for ($i = 1; $i <= 3; $i++) {
    echo "Perulangan ke-{$i}<br>";
}

echo '<strong>Perulangan while:</strong><br>';
$i = 1;
while ($i <= 3) {
    echo "Nilai i: {$i}<br>";
    $i++;
}

// ================================================================
// 3. ARRAY
// ================================================================
echo '<h2>3. Array</h2>';

// Array terindeks: setiap elemen menggunakan indeks angka mulai dari 0.
$buah = ['Apel', 'Mangga', 'Jeruk'];
echo 'Buah pertama: ' . $buah[0] . '<br>';

echo '<strong>Semua buah:</strong><br>';
foreach ($buah as $index => $namaBuah) {
    echo ($index + 1) . ". {$namaBuah}<br>";
}

// Array asosiatif: setiap elemen menggunakan key yang kita tentukan.
$mahasiswa = [
    'nim' => 'A001',
    'nama' => 'Giorno',
    'prodi' => 'Informatika',
];

echo '<strong>Data mahasiswa:</strong><br>';
echo "NIM: {$mahasiswa['nim']}<br>";
echo "Nama: {$mahasiswa['nama']}<br>";
echo "Program studi: {$mahasiswa['prodi']}";

// Array multidimensi: array yang elemen-elemennya juga berupa array.
$daftarMahasiswa = [
    ['nim' => 'A001', 'nama' => 'Giorno', 'nilai' => 88],
    ['nim' => 'A002', 'nama' => 'Andi', 'nilai' => 75],
    ['nim' => 'A003', 'nama' => 'Jojo', 'nilai' => 75],
];

echo '<strong>Daftar nilai:</strong><br>';
?>

<table border=1>
    <thead>
        <tr>
            <th>NRP</th>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($daftarMahasiswa as $data) {
            echo "<tr>
                <td>{$data['nim']}</td>
                <td>{$data['nama']}</td>
                <td>{$data['nilai']}</td>
            </tr>";
        } ?>
    </tbody>
</table>

<?php
// ================================================================
// 4. PROCEDURE DAN FUNCTION
// ================================================================
echo '<h2>4. Procedure dan Function</h2>';

// Function menerima input, memprosesnya, lalu mengembalikan nilai.
function hitungLuasPersegiPanjang(float $panjang, float $lebar): float
{
    return $panjang * $lebar;
}

function tentukanKelulusan(float $nilai, float $batasLulus = 70): string
{
    return $nilai >= $batasLulus ? 'Lulus' : 'Tidak lulus';
}

tampilkanSalam('Giorno');

$luas = hitungLuasPersegiPanjang(8, 4);
echo "Hasil function hitung luas: {$luas}<br>";
echo 'Status kelulusan: ' . tentukanKelulusan(82) . '<br>';

// ================================================================
// 5. CLASS DAN OBJECT
// ================================================================
echo '<h2>5. Class dan Object</h2>';


// Membuat object dengan keyword new.
$mahasiswaPertama = new Mahasiswa('A003', 'Rina', 86);
$mahasiswaPertama->tampilkanData();
