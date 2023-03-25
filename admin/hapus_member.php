<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0){	
header('location:index.php');
}
else{
if(isset($_GET['id_user'])){
	$id_user	= $_GET['id_user'];
	$mySql	= "DELETE FROM member WHERE id_user='$id_user'";
	$myQry	= mysqli_query($koneksidb, $mySql);
	echo "<script type='text/javascript'>
			alert('Data berhasil dihapus.'); 
			document.location = 'reg-users-admin.php'; 
		</script>";
}else {
	echo "<script type='text/javascript'>
			alert('Terjadi kesalahan, silahkan coba lagi!.'); 
			document.location = 'reg-users-admin.php'; 
		</script>";
}
}
?>