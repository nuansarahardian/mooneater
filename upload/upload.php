<?php
session_start();

if(strlen($_SESSION['ulogin'])==0){ 
  header ("Location: ../login.php");
   exit;
}

require 'fungsiupload.php';
if (isset ($email) || isset ($transaksi)) {
$username = $_SESSION ["user_nama"];
$id_user = $_GET["id_user"];
if (row){

  $transaksi = query("SELECT * FROM ((transaksi INNER JOIN paket ON transaksi.id_paket = paket.id_paket) INNER JOIN status ON transaksi.stt_trx=status.stt_trx WHERE transaksi.id_trx = $id_trx")[0];
}

$foto = query("SELECT * FROM galery")[0];

}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/dropzone.css" />
    <link rel="stylesheet" href="../../css/dashboard.css" />
    <script type="text/javascript" src="js/dropzone.js"></script>
    <title>Upload - Precies</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #1089ff" data-aos="fade-down" data-aos-offset="1370" data-aos-once="false">
      <div class="container">
        <a class="navbar-brand" href="#">Precies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
          <a class="nav-link " aria-current="page" href="../2.dashboard/dashboard admin.php">Dashboard</a>
            <a class="nav-link"  href="../3.daftar paket/daftar paket.php">Package List </a>
            <a class="nav-link"  href="../5.order list/order list - ad.php">Order List</a>
            <a class="nav-link active"  href="pilihupload.php">Upload Photos</a>
            <a class="nav-link" href="../2.dashboard/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <section id="dashboard" data-aos="fade-up">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up">
          <div class="col text-center">
            <h1>Upload Foto</h1>

            <div class="underline-title"></div>
          </div>
        </div>
        <div class="row mt-5 justify-content-center">
          <!-- Content -->
          <h4>Detail Order</h4>
          <div class="mr-3">
            <table class="table-borderless">
              <tr>
                <th>Id Order</th>
                <td>:</td>
                <td><?php=$transaksi["id_trx"]?></td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>:</td>
                <td><?php=$transaksi["name"]?></td>
              </tr>
     
            </table>
            <br>
          </div>
          <form action="proses.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="formFileMultiple" class="form-label"><h4>Pilih foto-foto yang akan diupload</h4></label>
              <input type="hidden" name="orderid" value="<?=$id_trx;?>" />
              <input class="form-control" type="file" name="gbr[]" id="formFileMultiple" multiple />
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
          </form>
          <!-- Akhir Content -->
        </div>
      </div>
    </section>
    <!-- Footer -->
    <footer style="background-color: #1089ff" class="text-center text-light">
      <p>© Copyright Precies. All Right Reserved</p>
    </footer>
    <!-- Footer -->
  </body>
</html>
