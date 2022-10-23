<?php
// Sambungkan dengan koneksi db di halaman connection
require "connection.php";

// Jika apakah tombol button kirim sudah di klik
if (isset($_POST["kirim"])) {
    if (!empty($_POST["username"]) and !empty($_POST["password"])) {

        // Memberi nilai var username dan password sesuai yg kita input di textbox form
        $username = $_POST["username"];
        $password = $_POST["password"];

        // Query sql
        $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'") or die(mysqli_error($conn));

        // Cek apakah ada data di SQL
        $numrows = mysqli_num_rows($result);

        // Jika ada data yg sama maka,
        if ($numrows != 0) {

            // Ubah data yg ada di db menjadi assoc array
            while ($row = mysqli_fetch_array($result)) {
                $dbUsername = $row["username"];
                $dbPassword = $row["password"];
            }

            // Cek apakah username form sm dengan username db
            if ($username === $dbUsername && password_verify($password, $dbPassword)) {
                session_start();
                $_SESSION["username"] = $username;
                header("Location:main.php");

            } else {
                echo "<script type='text/javascript'> alert('Wrong username/Password!'); document.location.href='form.php';</script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('Wrong username/Password!'); document.location.href='form.php';</script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('All fields are required!'); document.location.href='form.php';</script>";
    }
}
