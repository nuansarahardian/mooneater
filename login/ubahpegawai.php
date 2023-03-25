<?php
session_start();

if( !isset($_SESSION ["username"]) ) {
  header ("Location: ../1.login registrasi/login.php");
   exit;
}

require 'functions.php';
$id = $_GET["id"];
$paket = query("SELECT * FROM daftar_paket");
$editPaket = query("SELECT * FROM daftar_paket WHERE id_paket = $id")[0];

if( isset($_POST["submit-edit"]) ) {
  if( ubah ($_POST) > 0 ) {
    echo "
    <script>
    alert('data berhasil diubah!');
    document.location.href = 'daftar paket.php' ;
    </script>
    ";
  }else {
    echo "
    <script>
    alert('data gagal diubah!');
    document.location.href = 'daftar paket.php' ;
    </script>
    ";
}
     
};

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/dashboard.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Dashboard - Precies</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #00002d" data-aos="fade-down" data-aos-offset="1370" data-aos-once="false">
      <div class="container">
        <a class="navbar-brand" href="#">Precies</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="index.html">Dashboard</a>
            <a class="nav-link" href="#aboutme">About Me</a>
            <a class="nav-link" href="#resume">Resume</a>
            <a class="nav-link" href="#portofolio">Portofolio</a>
            <a class="nav-link" href="#contact">Contact</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <section id="portofolio" data-aos="fade-up">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up">
          <div class="col text-center">
            <h1>Daftar Paket</h1>
            <div class="underline-title"></div><br>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <?php $i = 1; ?>
            <?php foreach ( $paket as $row) : ?>
            <tr>
              <td><?= $i;?></td>
              <td><?= $row["nama"];?></td>
              <td><?= $row["harga"];?></td>
              <td><?= $row["keterangan"];?></td>
              <td>
                <button type="button" class="btn btn-warning me-3">Edit</button>
                <button type="button" class="btn btn-danger">Delete</button>
              </td>
            </tr>
            <?php $i++;?>
            <?php endforeach;?>
          </table>
          <div class="col">
          <button type="button" class="btn btn-primary">Tambah Paket</button>
          </div>
        </div>
        
            <!-- Modal Edit -->
            <div class="modal fade" id="myModal" data-bs-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ubah Paket</h5>
                            <a href="daftar paket.php"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <input type="hidden" name="id" value="<?= $editPaket["id_paket"];?>">
                                <div class="mb-3">
                                <label for="namapaket" class="form-label">Nama Paket</label>
                                <input type="text" name="nama" class="form-control" id="namapaket" required value="<?= $editPaket["nama"];?>">
                                </div>
                                <div class="mb-3">
                                <label for="hargapaket" class="form-label">Harga Paket</label>
                                <input type="text" name="harga" class="form-control" id="hargapaket" required value="<?= $editPaket["harga"];?>">
                                </div>
                                <div class="mb-3">
                                <label for="ketpaket" class="form-label">Keterangan Paket</label>
                                <input type="text" name="keterangan" class="form-control" id="ketpaket" required value="<?= $editPaket["keterangan"];?>">
                                </div>
                                <button type="submit" name="submit-edit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                        <a href="daftar paket.php"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></a>
                        </div>
                    </div>
                </div>
            </div>
        
          <!-- Akhir Modal Edit -->
      </div>
    </section>
    <!-- Footer -->
    <footer style="background-color: #00002d" class="text-center text-light">
      <p>© Copyright Precies. All Right Reserved</p>
    </footer>
    <!-- Footer -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      var myModal = document.getElementById("editModal");
      var myInput = document.getElementById("myInput");
      $(window).on('load', function() {
                $('#myModal').modal('show');
        });      
      myModal.addEventListener("shown.bs.modal", function () {
        myInput.focus();
      });
    </script>
  </body>
</html>
