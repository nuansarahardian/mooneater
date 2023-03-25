<?php
session_start();

if(strlen($_SESSION['ulogin'])==0){ 
  header ("Location:../index.php");
   exit;
}

require 'functions.php';
$id_user = $_GET["id_user"];
$username = $_SESSION ["username"];
$user= query("SELECT id_user FROM user WHERE username = '$username'")[0];
$order = query("SELECT * FROM ((order_list INNER JOIN daftar_paket ON order_list.id_paket = daftar_paket.id_paket) INNER JOIN status ON order_list.id_status = status.id_status) WHERE order_list.id_user = $id AND order_list.id_status = 3");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/dashboard.css" />
    <title>Lihat Foto</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #1089FF;">
      <div class="container">
        <a class="navbar-brand" href="#">Precies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link" aria-current="page" href="../homepage.php">Home</a>
            <a class="nav-link" target="_blank" href="../4.pemesanan/pemesanan.php?id=<?=$user["id_user"];?>">Order Service</a>
            <a class="nav-link" target="_blank" href="../5.order list/ordercustomer.php?id=<?=$user["id_user"];?>">My Order</a>
            <a class="nav-link active" target="_blank" href="lihatfoto.php?id=<?=$user["id_user"];?>">My Photos</a>
            <a class="nav-link" href="../2.dashboard/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <section id="dashboard" style="height: 855px;" data-aos="fade-up">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up">
          <div class="col text-center">
            <h1>Choose Order</h1>
            <div class="underline-title"></div><br>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Date & Time</th>
                <th scope="col">Location</th>
                <th scope="col">Package</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr></tr>

              <tr>
                <?php $i = 1; ?>
                <?php foreach ( $order as $row) : ?>
              </tr>

              <tr>
                <td><?= $i;?></td>
                <td><?= $row["name"];?></td>
                <td><?= $row["tanggal_foto"];?></td>
                <td><?= $row["alamat"];?></td>
                <td><?= $row["nama"];?></td>
                <td><?= $row["status"];?></td>
                <td>
                <a href="lihatfotoku.php?id=<?= $row["id_order"];?>"><button type="button" class="btn btn-primary btn-sm">See Photos</button></a>
              </td>
              </tr>
              <?php $i++;?>
              <?php endforeach;?>
            </tbody>
          </table>
          
        </div>
      </div>
    </section>
    <!-- Footer -->
    <footer style="background-color: #1089FF" class="text-center text-light">
      <p>© Copyright Precies. All Right Reserved</p>
    </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      var myModal = document.getElementById("myModal");
      var myInput = document.getElementById("myInput");

      myModal.addEventListener("shown.bs.modal", function () {
        myInput.focus();
      });
    </script>
  </body>
</html>
