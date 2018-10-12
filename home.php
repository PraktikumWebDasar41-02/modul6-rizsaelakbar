<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" action="">
<input type="text" name="nama" placeholder="Nama">
<br>
<input type="text" name="nim" placeholder="NIM">
<br>
Hobi : <br>
	 <input type="radio" name="kelas" value="D3MI4101">D3MI4101<br/>  
	 <input type="radio" name="kelas" value="D3MI4102">D3MI4102<br/>  
	 <input type="radio" name="kelas" value="D3MI4103">D3MI4103<br/>  
	 <input type="radio" name="kelas" value="null" checked hidden><br/>  
Jenis Kelamin : <br>
	<input type="radio" name="jk" value="Laki-Laki"> Laki-Laki<br>
	<input type="radio" name="jk" value="Perempuan"> Perempuan<br>
	<input type="radio" name="jk" value="null" checked hidden><br>
Jenis Kelamin : <br>
	<input type="checkbox" name="hobi[]" value="Makan">Makan<br>
	<input type="checkbox" name="hobi[]" value="Tidur">Tidur<br>
	<input type="checkbox" name="hobi[]" value="Nonton">Nonton<br>
	<input type="checkbox" name="hobi[]" value="Kuliah">Kuliah<br>
	<br>
	Masukkan Fakultas
	<select name="fakultas">
		  <option value="null">Pilih..</option>
		  <option value="FIT">FIT</option>
		  <option value="FEB">FEB</option>
		  <option value="FKB">FKB</option>
		  <option value="FIK">FIK</option>
	</select>
	<br>
<input type="textarea" name="alamat" placeholder="Alamat...">
	<br>
<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
<?php
include('koneksinya.php');
	if (isset($_POST['submit'])) {
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];
		$kelas = $_POST['kelas'];
		$jk = $_POST['jk'];
		$hobi = $_POST['hobi'];
		$fakultas = $_POST['fakultas'];
		$alamat = $_POST['alamat'];

			if (strlen($nama)>=35) {
				echo "<br>";
				$nama_err = "f";
				echo "Nama Maksimal 35 Karakter";
			}else{
				$nama_err = "t";
			}
			if(empty($nama)){
			echo "Nama masih kosong.<br>";
			$nama_err = "f";
			}else{
				$nama_err = "t";
			}

			if (strlen($nim)==10) {
				echo "<br>";
				$nim_err = "t";
			}else{
				$nim_err = "f";
				echo "NIM Maksimal Minimal 10 Karakter";
			}

			if (!is_numeric($nim)) {
				echo "<br>";
				$nim_err = "f";
				echo "NIM Harus Angka";
			}else{
				$nim_err = "t";
			}

			if (isset($hobi)) {
			$tampung = "";
		for ($i=0; $i < count($hobi) ; $i++) { 
			$tampung .= "$hobi[$i] ";
			}
		}
		if(empty($tampung)){
			echo "Nama masih kosong.<br>";
			$nama_err = "f";
			}else{
				$nama_err = "t";
			}
		if(empty($alamat)){
			echo "Nama masih kosong.<br>";
			$nama_err = "f";
			}else{
				$nama_err = "t";
			}	
		if ($fakultas == 'null') {
			echo "<br>";
			$nama_err = "f";
			echo "Isilah Fakultas";
		}else{
			$nama_err = "t";
		}
		if ($kelas == 'null') {
			echo "<br>";
			$nama_err = "f";
			echo "Isilah Fakultas";
		}else{
			$nama_err = "t";
		}
		if ($jk == 'null') {
			echo "<br>";
			$nama_err = "f";
			echo "Isilah Fakultas";
		}else{
			$nama_err = "t";
		}
echo "$tampung";
		if ($nama_err == "t" && $nim_err == "t") {
			session_start();
			$user = $_SESSION['username'];

	$sql = "UPDATE akun SET nama='$nama',nim='$nim',kelas='$kelas',jk='$jk',hobi='$tampung',fakultas='$fakultas',alamat='$alamat' WHERE username='$user'";

if ($conn->query($sql) === TRUE) {
	echo "<br>";
    echo "New record created successfully";
    header("Location: akhir.php");
} else {
	echo "<br>";
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}else{
  echo "<script>
alert('Login Gagal');
  </script>";
	echo "<br>";
	echo "GAGAL";
}
$conn->close();
}
?>