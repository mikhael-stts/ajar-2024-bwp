<?php


// Class adalah cetak biru. Object adalah hasil pembuatan (instance) class.
class Mahasiswa
{
    private string $nim;
    private string $nama;
    private float $nilai;

    public function __construct(string $nim, string $nama, float $nilai)
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->nilai = $nilai;
    }

    public function tampilkanData(): void
    {
        echo "NIM: {$this->nim}<br>";
        echo "Nama: {$this->nama}<br>";
        echo "Nilai: {$this->nilai}<br>";
        echo 'Status: ' . $this->getStatusKelulusan() . '<br>';
    }

    public function getStatusKelulusan(): string
    {
        return $this->nilai >= 70 ? 'Lulus' : 'Tidak lulus';
    }
}
