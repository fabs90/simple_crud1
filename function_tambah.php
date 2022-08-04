<?php
// Sambungkan dengan koneksi db di halaman connection
require_once "connection.php";

// cek apakah tombol button kirim sudah diklik
if (isset($_POST["kirim"])) {
    $form_nama = $_POST["nama"];
    $form_npm = $_POST["npm"];
    $form_kelas = $_POST["kelas"];
    $form_alamat = $_POST["alamat"];

    $result = mysqli_query($conn, "SELECT * from data_mhs where nama = '$form_nama' and npm = '$form_npm'");

    // Cek apakah ada data yg sama
    $numrows = mysqli_num_rows($result);

    // Kalau tidak ada data yang sama
    if ($numrows == 0) {
        $query_insert = mysqli_query($conn, "INSERT INTO data_mhs(nama, npm, kelas, alamat) VALUES ('$form_nama', '$form_npm', '$form_kelas', '$form_alamat')") or die(mysqli_error($conn));

        if ($query_insert) {
            echo "<script type='text/javascript'> alert('Data Successfully Added!'); document.location.href='halaman_tambah.php';</script>";
        }

    } else {
        echo "<script type='text/javascript'> alert('Data Sudah Ada!'); document.location.href='halaman_tambah.php';</script>";
        exit();
    }

}
