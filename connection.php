<?php
// (Mulai sekarang kita connect ke db kita pisah folder nya)]
// Buat connect antar file pake : require_once "namafile.php"
// Connect ke database
$hostname = 'localhost';
$nameSql = 'root';
$passwordSql = '';
$namaDatabase = 'db_loginForm_php';

$conn = mysqli_connect($hostname, $nameSql, $passwordSql, $namaDatabase) or die(mysqli_error($conn));
