<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0){	
header('location:index.php');
}else{ 
?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title><?php echo $pagedesc;?></title>
	<link rel="shortcut icon" href="img/fav.png">

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
<script type="text/javascript">
function valid(theform){
		pola_nama=/^[a-zA-Z]*$/;
		if (!pola_nama.test(theform.vehicletitle.value)){
		alert ('Hanya huruf yang diperbolehkan ');
		theform.vehicletitle.focus();
		return false;
		}
		return (true);
}
</script>
</head>
<body>
	<?php include('includes/header-editor.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar-editor.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Unggah Foto</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading"></div>
									<div class="panel-body">
										<?php 
										$id=intval($_GET['id_trx']);
										$sql ="SELECT * FROM transaksi WHERE id_trx='$id'";
										$query = mysqli_query($koneksidb,$sql);
										$result = mysqli_fetch_array($query);
										?>

										<form method="post" class="form-horizontal" name="theform" action ="proses_tambah.php" onsubmit="return valid(this);" enctype="multipart/form-data">
										<div class="form-group">
											<label class="col-sm-2 control-label">ID TRANSAKSI<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" required>
												<input type="text" name="id_trx" class="form-control" value="<?php echo htmlentities($result['id_trx']);?>" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 control-label">Tanggal<span style="color:red">*</span></label>
											<div class="col-sm-4">
											<input type="text" name="tgl_take" class="form-control" value="<?php echo htmlentities($result['tgl_take']);?>" required>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-2 control-label">Status<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<select class="form-control" name="stt_trx" required>
														<?php
															$stt = $result['stt_trx'];
															echo "<option value='$stt' selected>".$stt."</option>";
								
															echo "<option value='Sudah Dibayar'>"."Sudah Dibayar"."</option>";
															echo "<option value='Selesai'>"."Selesai"."</option>";
															
														?>
												</select>
											</div>
										</div>

                                        <div class="form-group">
											<label class="col-sm-2 control-label">Link Google Drive<span style="color:red">*</span></label>
											<div class="col-sm-4">
												<input type="text" name="galery" class="form-control" value="<?php echo htmlentities($result['id_galery']);?>" required>
											</div>
										</div>
                                        <div class="form-group">
										
											<div class="col-sm-4">
												<input type="submit" name="update" class="form-control" value="update" >
											</div>
										</div>
                                        

									<div class="hr-dashed"></div>
										
									<div class="form-group">
										<!-- <div class="col-sm-4">
											<center>Gambar Paket<img src="gallery/<?php echo htmlentities($result['foto_paket']);?>" width="300" height="200" style="border:solid 1px #000">
											<br/>
											<br/>
											<a href="gambar_paket.php?imgid=<?php echo htmlentities($result['id_paket'])?>" class="btn btn-warning">&nbsp;&nbsp;Ganti Gambar&nbsp;&nbsp;</a></center>
										</div> -->
									</div>
									<div class="hr-dashed"></div>									
										
									</div>
								</div>
							</div>
						</div>
						
					<!-- <div class="row">
						<div class="col-md-12">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="form-group">
										<div class="col-sm-3">
											<div class="checkbox checkbox-inline">
												<button class="btn btn-primary" type="submit">Update</button>
												<a href="baju.php" class="btn btn-default">Batal</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div> -->

					</div>
				</div>
				</form>

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
<?php } ?>










<!-- 
<DOCTYPE html!>
<html>
<body>

<?php
// include database connection file
include_once("includes/config.php");
$no=1;
if(isset($_GET['id_trx'])){
    $id=$_GET['id_trx'];
}
 

$query="SELECT * FROM transaksi WHERE id_trx='$id'";
$queryupload = mysqli_query($koneksidb,$query);

while ($data = mysqli_fetch_array($queryupload)){
    ?>


    <h2>Upload Foto</h2>
    <form action="proses_update.php?id_trx=<?=$data['id_trx']?>" method="post" >
            <table>
                <input type="hidden" name="id_trx" value="<?php echo $data['id_trx']; ?>">
                <tr>
                    <td>Nama</td>
                    <td><input type=" text" name="nama_produk" value="<?php echo $data['id_trx']; ?>"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" value="<?php echo $data['tgl_trx']; ?>"></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="text" name="stok" value="<?php echo $data['stt_trx'];  ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi"><?php echo $data['id_galery']; ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Simpan"></td>
                </tr>
            </table>
        <?php } ?>
    </form>
</body>
</html>



<!-- 

<table>
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Stok</td>
                <td>Deskripsi</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['id_trx'] ?></td>
                <td><?php echo $data['id_paket'] ?></td>
                <td><?php echo $data['tgl_trx'] ?></td>
                <td><?php echo $data['stt_trx'] ?></td>
                <td><form action="proses_update.php?id_trx=<?=$result['id_trx']?>" method="post">
                <td>Stok</td>
                    <td><input type="text" name="upload" value="<?php echo $data['id_galery'];  ?>"></td>
                </td>
                <td><input type="submit" name="Simpan"></td>
               
                <td>
                </td>
            </tr>
        <?php ?>
    </table>
</body>
</html> --> -->
