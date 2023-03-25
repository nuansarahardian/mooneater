<?php
session_start();

if( !isset($_SESSION ["username"]) ) {
  header ("Location: ../1.login registrasi/login.php");
   exit;
}

require 'fungsiupload.php';

$id = $_GET["id"];
$order = query("SELECT * FROM ((order_list INNER JOIN daftar_paket ON order_list.id_paket = daftar_paket.id_paket) INNER JOIN status ON order_list.id_status = status.id_status) WHERE order_list.id_order = $id")[0];
$foto = query("SELECT * FROM tbgambar INNER JOIN order_list ON tbgambar.id_order = order_list.id_order WHERE tbgambar.id_order = $id");
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
    <title>MyPhoto - Precise</title>
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

    <section id="dashboard" style="height: 855px" data-aos="fade-up">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up">
          <div class="col text-center">
            <h1>My Photos</h1>

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
                <td><?=$order["id_order"]?></td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>:</td>
                <td><?=$order["name"]?></td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>:</td>
                <td><?=$order["alamat"]?></td>
              </tr>
              <tr>
                <th>Tanggal Order</th>
                <td>:</td>
                <td><?=$order["tanggal_order"]?></td>
              </tr>
            </table>
            <br />
          </div>
          <h4>Photos :</h4>
          <?php $i = 1; ?>
          <?php while ($i < 7) : ?>
          <div class="row">
            <?php foreach ( $foto as $row) : ?>
            <div class="col-2 mb-3">
              <a target="_blank" href="upload/<?= $row["nama_file"];?>"><img width="200px" src="upload/<?= $row["nama_file"];?>" alt=""></a>
              <div class="mt-2 mb-2 text-center">
                <button type="button" class="btn me-2 btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#foto-<?= $row["idgambar"];?>">View</button>                      
                
                <a href="hapusfoto.php?id=<?= $row["idgambar"];?>" onclick="return confirm('Foto Akan DIHAPUS!!')"><button class="btn btn-sm btn-outline-danger">Delete</button></a>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="foto-<?= $row["idgambar"];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Photo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-center">
                    <img height="100%" src="upload/<?= $row["nama_file"];?>" alt="">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>            
            <?php $i++;?>
            <?php endforeach;?>
          </div>
          <?php endwhile;?>
          <!-- Akhir Content -->
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
      var myModal = document.getElementById('myModal')
      var myInput = document.getElementById('myInput')

      myModal.addEventListener('shown.bs.modal', function () {
        myInput.focus()
      })
    </script>

  </body>
</html>
