<?php
include('includes/config.php');

error_reporting(0);
session_start();
if (isset($_POST['update'])){
    $id       = $_POST['id_trx'];
    $email    = $_POST['email'];
    $id_paket = $_POST['id_paket'];
    $tgl_take  = $_POST['tgl_take'];
    $status = $_POST['stt_trx'];
    $id_galery  = $_POST['galery'];

  
    $sql 	= "UPDATE transaksi SET tgl_take='$tgl_take', stt_trx='$status', id_galery='$id_galery' WHERE id_trx='$id'";
    $query 	= mysqli_query($koneksidb,$sql);
    // print_r($sql);exit;

    if($query){
        echo "<script type='text/javascript'>
                alert('Berhasil ubah data.'); 
                document.location = 'data-booking-editor.php'; 
            </script>";
    }else {
                echo "No Error : ".mysqli_errno($koneksidb);
                echo "<br/>";
                echo "Pesan Error : ".mysqli_error($koneksidb);
    
        echo "<script type='text/javascript'>
                alert('Terjadi kesalahan, silahkan coba lagi!.'); 
                document.location = 'tambah_foto.php?id_trx=$id'; 
            </script>";
    }



}



?>




<!-- 
<?php
include("includes/config.php");
$id       = $_POST['id_trx'];

$tgl_trx  = $_POST['tanggal'];
$stt_trx  = $_POST['status'];
$id_galery  = $_POST['galery'];
echo $id,$email,$id_paket,$tgl_trx,$stt_trx,$id_galery;
mysqli_query($koneksidb, "UPDATE transaksi SET id_galery='$id_galery' WHERE id_trx ='$id'");
    // header("location:trx.php");
    echo "berhasil ditambahkan"

?>  -->

