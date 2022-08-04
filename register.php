<!doctype html>
<html>
<head>
<title>Register</title>
    <style>
        body{
    margin-top: 100px;
    margin-bottom: 100px;
    margin-right: 150px;
    margin-left: 80px;
    background-color: azure ;
    color: palevioletred;
    font-family: verdana;
    font-size: 100%

        }
            h1 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
}
         h2 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
}</style>
</head>
<body>

    <center><h1>CREATE REGISTRATION AND LOGIN FORM USING PHP AND MYSQL</h1></center>
    <p><a href="form.php">Back to login</a></p>
    <center><h2>Registration Form</h2></center>
<form action="" method="POST">
    <legend>
    <fieldset>

Username: <input type="text" name="username"><br />
Password: <input type="password" name="password"><br />
<input type="submit" value="Register" name="tombolKirim" />
        </fieldset>
        </legend>
</form>

<?php
// Sambungkan dengan koneksi db di halaman connection
require_once "connection.php";

if (isset($_POST["tombolKirim"])) {
    if (!empty($_POST["username"]) and !empty($_POST["password"])) {

        // Memberi nilai var username dan password sesuai yg kita input di textbox form
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

        // Cek apakah ada data di SQL yg data nya sama kek di input
        $numrows = mysqli_num_rows($result);

        // Kalo gaada data yg sama/blom ada
        if ($numrows == 0) {

            $password = password_hash($password, PASSWORD_BCRYPT);

            // Query Sql insert data ke table
            $sql = mysqli_query($conn, "INSERT INTO login(username, password) VALUES('$username', '$password')");

            if ($sql) {
                echo "<script type='text/javascript'> alert('Account Successfully created'); document.location.href='register.php';</script>";
            } else {
                echo "<script type='text/javascript'> alert('Failed to create account'); document.location.href='register.php';</script>";
            }

        } else {
            echo "<script type='text/javascript'> alert('That username/password already exists! Please try again with another.'); document.location.href='register.php';</script>";
            exit();
        }
    } else {
        echo "<script type='text/javascript'> alert('All fields are required!'); document.location.href='register.php';</script>";
    }
}
?>
