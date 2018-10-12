<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="login.php" method="post">
      <input type="text" name="username" placeholder="Username">
      <br>
      <input type="password" name="password" placeholder="Password">
      <br>
      <input type="submit" name="submit" value="MASUK">
      <br><br>
      Belum Memiliki Akun?
      <a href="registrasi.php">Daftar</a>

    </form>
  </body>
</html>

<?php
session_start();
include 'koneksinya.php';
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  if(empty($username)){
      echo "Username masih kosong.<br>";
      $nama_err = "f";
      }else{
        $nama_err = "t";
      }
  if(empty($password)){
      echo "Password masih kosong.<br>";
      $nama_err = "f";
      }else{
        $nama_err = "t";
      }

if ($nama_err == "t") {

$data = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($data);

if($cek > 0){
  $_SESSION['username'] = $username;
  header("Location:home.php");
}
else {
  echo "<script>
alert('Login Gagal');
  </script>";
}
}else{echo "<br>GAGAL";}
}

 ?>