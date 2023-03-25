<?php
include('includes/config.php');
error_reporting(0);
$name=$_POST['name'];
$username=$_POST['username'];
$password=$_POST['password'];
$jabatan=$_POST['jabatan'];

$str1 = substr($img1,-5);
$vimage1 = date('dmYHis').$str1;

$sql 	= "INSERT INTO admin (name,username,password,jabatan)VALUES ('$name','$username','$password','$jabatan')";
$query 	= mysqli_query($koneksidb,$sql);
if($query){
	
	echo "<script type='text/javascript'>
			alert('Berhasil tambah data.'); 
			document.location = 'paket.php'; 
		</script>";
}else {
			echo "No Error : ".mysqli_errno($koneksidb);
			echo "<br/>";
			echo "Pesan Error : ".mysqli_error($koneksidb);

	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'paket_tambah.php'; 
		</script>";
}
?>