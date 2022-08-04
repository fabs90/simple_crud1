<?php

require "connection.php";
// Cek apakah sudah ada session atau blom saat start ke halaman ini
session_start();
// Kl blom di set suruh balik ke login
if (!isset($_SESSION["username"])) {
    header("location:form.php");
}

// kalau tidak ada id di query string
if (!isset($_GET['id'])) {
    header('Location: halaman_tambah.php');
}

// menangkap data id yang di kirim dari url
$id = $_GET['id'];

// Buat Query ambil data yg dipilih dengan parameter id yg dikirim di url
$result = mysqli_query($conn, "SELECT * FROM data_mhs where id='$id'");
$data = mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit</title>
</head>

<body>
    <header>
        <h3>Formulir Edit </h3>
    </header>

    <form action="function_update.php" method="POST">

        <fieldset>
            <!-- ID kita hide aja biar gabisa diliat karena penting buat manipulasi data -->
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />

        <p>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" value="<?php echo $data['nama'] ?>" />
        </p>
        <p>
            <label for="nama">NPM: </label>
            <input type="text" name="npm" value="<?php echo $data['npm'] ?>" />
        </p>
        <p>
            <label for="nama">Kelas: </label>
            <input type="text" name="kelas" value="<?php echo $data['kelas'] ?>" />
        </p>
        <p>
            <label for="alamat">Alamat: </label>
            <textarea name="alamat"><?php echo $data['alamat'] ?></textarea>
        </p>
        <p>
            <input type="submit"  name="kirim" />
        </p>

        </fieldset>


    </form>
    <a href="halaman_tambah.php">Balik ke halaman tambah</a>

    </body>
</html>