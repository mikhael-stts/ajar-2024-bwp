# Daftar ISI
- [Daftar ISI](#daftar-isi)
- [Installation](#installation)
- [VSCODE extension](#vscode-extension)
- [Apa yang baru di laravel 11?](#apa-yang-baru-di-laravel-11)
- [Error umum pada saat pertama kali create project/pull project dari GIT](#error-umum-pada-saat-pertama-kali-create-projectpull-project-dari-git)
- [Konfigurasi awal](#konfigurasi-awal)
- [TLDR](#tldr)


# Installation
- Pastikan versi PHP sudah sesuai syarat, cek <a href="https://laravel.com/docs/11.x/deployment#server-requirements">System Requirements</a>
  - Bisa coba cek versi php dengan menjalankan ```php -v``` di terminal
  - Kalau versi php tidak cocok, sangat disarankan untuk install ulang xampp / laragon / PHP, **jangan lupa backup dulu kodingan dan database kalian**
- Pastikan composer sudah terinstall, cek <a href="https://getcomposer.org/download/">Download Composer</a>
  - Install yang versi windows installer
  - Bisa coba cek versi composer dengan menjalankan ```composer -v``` di terminal
- Untuk create project laravel :
  - Buat folder baru, lalu Buka terminal
  - Jalankan ```composer create-project laravel/laravel . ```
- Untuk menjalankan :
  - Jalankan ```php artisan serve```

# VSCODE extension
- Laravel Extension Pack punya Winnie Lin

# Apa yang baru di laravel 11?
- Secara default semua persiapan seperti tabel user, tabel session, dibuat di dalam file database/database.sqlite
- Ketika create project pertama kali, laravel melakukan migration ke dalam database.sqlite ini, dengan SQLite, kita sebenarnya tidak perlu mysql/mariadb, karena database kita disimpan dalam file .sqlite
  - Untuk buka local file database (sqlite), kita bisa buka pakai extension database pada vscode seperti DevDB
- Selain itu, laravel 11 banyak sekali melakukan "pengurangan kompleksitas framework", sebagai contoh, dulu app\Providers punya banyak sekali file kayak RouteServiceProvider, Eventserviceprovider dll, tapi sekarang sisa 1 file yaitu RouteServiceProvider

# Error umum pada saat pertama kali create project/pull project dari GIT
- No application encryption key has been specified.
  - Menandakan bahwa pada .env ```APP_KEY=```  masih kosong
  - Solve dengan jalankan ```php artisan key:generate``` pada terminal
- Fatal error: Failed opening required '...\vendor\laravel\framework\....'
  - Tampilan website seperti error PHP, bukan error laravel
  - Solve dengan cek apakah folder vendor ada atau tidak, kalau tidak ada, jalankan ```composer install```
- 500 server error, padahal barusan create project / pull project dari GIT
  - cek file storage/logs/laravel.log, bagian paling atas, pada error paling bawah
  - Bila error nya bertuliskan ```production.ERROR: No application encryption key has been specified.```, berarti .env tidak punya ```APP_KEY``` atau bahkan kalian tidak punya file .env
  - Solve dengan membuat secara manual file .env, lalu mengisikan isinya berdasarkan .env.example
- Could not open input file: artisan
  - Error ini cukup jelas, bahwa pada saat menjalankan perintah php artisan, laravel tidak dapat menemukan file artisan
  - Solve dengan memastikan kalian menjalankan perintah php artisan pada folder yang ada file artisannya, atau even better, buka project laravel dengan melakukan **Open With Code**

# Konfigurasi awal
- **Bagian ini hanya untuk ketika pertama kali belajar laravel, tidak berlaku kalau kalian sudah jago laravel**
- Pada bagian ini, untuk pertama kali belajar, kita coba akan melakukan beberapa konfigurasi awal, supaya kita bisa belajar, tapi nanti kalau kalian sudah jago laravel, tentu saja kalian bisa atur sesuai kemauan kalian
- **Untuk permulaan** kita akan simpan session dengan driver file, nanti kalau kita sudah sampai database, dan kalian sudah paham apa itu migration, sangat boleh menggunakan session dengan driver database
  - Untuk permulaan, Ubah ```SESSION_DRIVER=database``` menjadi ```SESSION_DRIVER=file``` pada .env

# TLDR
- Baca lagi ya, jangan di-skip read me yang ini
