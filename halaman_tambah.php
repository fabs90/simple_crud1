<?php
require "connection.php";

// Cek apakah sudah ada session atau blom saat start ke halaman ini
session_start();
// Kl blom di set suruh balik ke login
if (!isset($_SESSION["username"])) {
    header("location:form.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah</title>
</head>
<body>
<center><h1>CREATE ADD DATA PAGE USING PHP AND MYSQL</h1></center>
<form method="post" action="function_tambah.php">
    <input type="text" name="nama" placeholder="Nama">
    <input type="text" name="npm" placeholder="Npm">
    <input type="text" name="kelas" placeholder="Kelas">
    <input type="text" name="alamat" placeholder="Alamat">
    <input type="submit" name="kirim">
  </form>
  <br/>

  <table border="1" bgcolor="white">
		<tr>
			<th>NO</th>
			<th>Nama</th>
			<th>NPM</th>
			<th>KELAS</th>
			<th>ALAMAT</th>
			<th>OPTIONS</th>
		</tr>

            <?php
$no = 1;
$sql = mysqli_query($conn, "SELECT * FROM data_mhs");
while ($data = mysqli_fetch_assoc($sql)) {
    ?>
    <tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['npm']; ?></td>
				<td><?php echo $data['kelas']; ?></td>
				<td><?php echo $data['alamat']; ?></td>
                <td>
                <!-- CARA UPDATE/DELETE MEREKA BUTUH ID DARI URL MAKANYA KASIH MASUKAN DI href nya!!-->
               <?php
echo "<a href='halaman_update.php?id=" . $data['id'] . "'>Edit</a> | ";
    echo "<a href='function_hapus.php?id=" . $data['id'] . "' name='hapus'>Hapus</a>  ";
    ?>
                </td>
    </tr>
<?php
}
?>

  <p><a href="main.php">Back to home</a> | <a href="logout.php">logout</a></p>

  <!-- Show jumlah total data -->
  <p>Total Data : <?=mysqli_num_rows($sql);?></p>
</body>
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
            h2 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
}
        h1 {
    color: indigo;
    font-family: verdana;
    font-size: 100%;
}

table {
  border-collapse: collapse;
}

td, th {
  border: 1px solid #999;
  padding: 0.5rem;
  text-align: left;
}
    </style>
</html>

<?php

?>
