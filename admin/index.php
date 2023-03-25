<?php
session_start();
include('includes/config.php');
if(isset($_POST['login']))
{
	
	$username=$_POST['username'];
$password=$_POST['password'];
$login = ("SELECT * FROM admin WHERE username='$username' AND password='$password'");
$query = mysqli_query($koneksidb,$login);

$cek = mysqli_num_rows($query);


if($cek>0)
{
	$results = mysqli_fetch_assoc($query);
	// var_dump($results);
	if($results['jabatan']=="Admin"){
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "Admin";
		$_SESSION['login'] = $username;
	
		echo "<script type='text/javascript'> document.location = 'dashboard-admin.php'; </script>";


	}else if($results['jabatan']=="Owner"){
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "Owner";
		$_SESSION['login'] = $username;
		echo "<script type='text/javascript'> document.location = 'dashboard-owner.php'; </script>";
	

	}else if($results['jabatan']=="Editor"){
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = "Editor";
		$_SESSION['login'] = $username;
		echo "masuk";
		echo "<script type='text/javascript'> document.location = 'dashboard-editor.php'; </script>";
	}	else{
 
			// alihkan ke halaman login kembali
			header("location:index.php?error=1");
		}	
	}else{
		header("location:index.php?error=1");
	}
	
// }if($results['jabatan']=="CS"){
// 	$_SESSION['username'] = $username;
// 	$_SESSION['jabatan'] = "CS";
// 	$_SESSION['login'] = $username;
// 	echo "masuk";
// 	echo "<script type='text/javascript'> document.location = 'dashboard-CS.php'; </script>";
	
// // }else{
// // 	header("location:login.php?error=1");
	
// // }
// }
}



// require 'functions.php';

// if( isset($_POST["login"])) {
//   $username = $_POST["username"];
//   $password = $_POST["password"];
//   $result   = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$email'");
//   $jabatan = mysqli_query($conn, "SELECT jabatan FROM admin WHERE username = '$email'");
//   // cek username
//   if( mysqli_num_rows($result) === 1) {
//     // cek password
//     $row = mysqli_fetch_array($result);
//     $jabatan = mysqli_fetch_array($jab);
//     if( password_verify($password, $row["password"]) ) {
//       // set session
      
//       $_SESSION["username"] = $row["username"];      
//       if($jabatan["jabatan"] === 'Admin'){
// 		echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
//         exit;
//       }
//      else if($jabatan["jabatan"] === 'Fotografer'){        
//         header("Location:Fotografer.php");
//         exit;
//       }
//       else if($jabatan["jabatan"] === 'Owner'){
//         header("Location:Owner.php");
//         exit;
//       }      
//     }

//   }

//   $error = true;

// }
?>

<!doctype html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title><?php echo $pagedesc;?></title>
	<link rel="shortcut icon" href="img/fav.png">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	
	<div class="login-page bk-img" style="background-image: url(img/bg.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Login Pegawai</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
									<label for="" class="text-uppercase text-sm">Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb">
									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">
							<?php		if(isset($_GET['error'])==1){
	echo '<font color="black"><p align="center">Username atau Password tidak sesuai!</p></font>';
 
}?>
									<button class="btn btn-primary btn-block" name="login" type="submit" style="font-family:Poppins; font-weight:bold; color:white; font-size: 15px;">LOGIN</button>
								</form> <br>
							<a text-align="center" href="../index.php">kembali ke menu utama </a>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>

</body>

</html>