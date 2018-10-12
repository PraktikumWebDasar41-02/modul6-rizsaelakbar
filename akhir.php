<?php
include('koneksinya.php');
session_start();
$user = $_SESSION['username'];
$result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$user'");
$row = mysqli_fetch_array($result);
echo "Nama : ";
printf("%s",$row['nama']);
echo "<br>";
echo "NIM : ";
printf("%s",$row['nim']);
echo "<br>";
echo "Kelas : ";
printf("%s",$row['kelas']);
echo "<br>";
echo "Jenis Kelamin : ";
printf("%s",$row['jk']);
echo "<br>";
echo "hobi : ";
printf("%s",$row['hobi']);
echo "<br>";
echo "Fakultas : ";
printf("%s",$row['fakultas']);
echo "<br>";
echo "alamat : ";
printf("%s",$row['alamat']);

?>
<br>
<a href="login.php">LOG OUT</a> OR <a href="home.php">EDIT</a>