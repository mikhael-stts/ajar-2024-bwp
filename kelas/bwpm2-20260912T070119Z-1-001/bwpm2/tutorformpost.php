<h1>Tutor form</h1>

<!-- 
Tutor membuat form untuk mengisi sesuatu:
    1. Harus ada element form, tentukan METHODNYA, dan ACTIONnya (data mau dikirim ke file apa? Kalau kosong ke halaman itu sendiri)
    2. Input-nya WAJIB ada name dan value
    3. Harus ada submit
-->
<form action="prosespost.php" method="post">
    Nama : <input type="text" name="namaku">
    <!-- password, input angka umur, jenis kelamin radiobutton(pria/wanita), checkbox 3 makanan fav -->
    <br>
    Password : <input type="password" name="passwordku">
    <br>
    Umur: <input type="number" name="umurku">
    <br>
    Jenis Kelamin:
    <input type="radio" name="jk" value="Pria"> Pria
    <input type="radio" name="jk" value="Wanita"> Wanita
    <br>
    Makanan Favorit:
    <input type="checkbox" name="makananfav" value="Pizza">Pizza
    <input type="checkbox" name="makananfav" value="Penyetan">Penyetan
    <input type="checkbox" name="makananfav" value="Dubai Chewy Cookie">Dubai Chewy Cookie
    <br>
    Tempat Lahir:
    <select name="tempatlahir">
        <option value="sby">Surabaya</option>
        <option value="jkt">Jakarta</option>
    </select>
    <br>
    <input type="submit" value="Register Diri Kalian">
</form>