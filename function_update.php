<?php
// sambungkan ke koneksi db
include "connection.php";

// Cek apakah tombol kirim sudah di klik
if (isset($_POST["kirim"])) {

    // Mengambil data dari form data ubah
    $form_id = $_POST['id'];
    $form_nama = $_POST["nama"];
    $form_npm = $_POST["npm"];
    $form_kelas = $_POST["kelas"];
    $form_alamat = $_POST["alamat"];

    // Query update data
    $result = mysqli_query($conn, "UPDATE data_mhs SET nama='$form_nama', npm='$form_npm', kelas='$form_kelas', alamat='$form_alamat' WHERE id='$form_id'");

    if ($result) {
        echo "<script type='text/javascript'> alert('Data Successfully Update!'); document.location.href='halaman_tambah.php';</script>";
    } else {
        echo "<script type='text/javascript'> alert('Data Failed to be Update!'); document.location.href='halaman_tambah.php';</script>";
        exit();
    }

}
