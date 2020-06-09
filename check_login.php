<?php 
//mengaktifkna session php
session_start();

//menghubungkan ke database
include 'koneksi_db.php';

//menangkap paramater yang dikirimkan dari form
$username = $_POST['username'];
$password = $_POST['password'];

//mencarin data username dan password yang sesuai dengan database
$data = mysqli_query($connection,"SELECT * FROM users WHERE username='$username' and password='$password'");

//menghitung jumlah data yang ditemukan
$count = mysqli_num_rows($data);

if ($count > 0) {
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	$_SESSION['status'] = "login";
	header("location:index.php");
} else {
	echo "username atau password salah";
	header("location:login.php?pesan=gagal");
}
?>