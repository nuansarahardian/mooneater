<?php
session_start();

if( !isset($_SESSION ["username"]) ) {
  header ("Location: login.php");
   exit;
}

require 'functions.php';
$akun = query("SELECT * FROM pegawai");

if( isset($_POST["submit-add"]) ) {
  if( tambah_pegawai ($_POST) > 0 ) {
    echo "
    <script>
    alert('data berhasil ditambahkan!');
    document.location.href = 'akunpegawai.php' ;
    </script>
    ";
  }else {
    echo "
    <script>
    alert('data gagal ditambahkan!');
    document.location.href = 'akunpegawai.php' ;
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
    <link rel="stylesheet" href="../../css/style.css" />
    <title>Kelola Pegawai - Precies</title>
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
            <a class="nav-link"  href="daftar paket.php">Package List </a>
            <a class="nav-link"  href="../5.order list/order list - ad.php">Order List</a>
            <a class="nav-link"  href="../6.upload/pilihupload.php">Upload Photos</a>
            <a class="nav-link" href="../2.dashboard/logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <section id="sesion" style="height: 855px;" data-aos="fade-up">
      <div class="container" data-aos="fade-up">
        <div class="row" data-aos="fade-up">
          <div class="col text-center">
            <h1>Daftar Pegawai</h1>
            <div class="underline-title"></div><br>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>                
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <?php $i = 1; ?>
            <?php foreach ( $akun as $row) : ?>
            <tr>
              <td><?= $i;?></td>
              <td><?= $row["name"];?></td>
              <td><?= $row["jabatan"];?></td>              
              <td>
              <a href="hapuspegawai.php?id=<?= $row["id_pegawai"];?>" onclick="return confirm('Data Akan DIHAPUS!!')"><button type="button" class="btn btn-danger">Delete</button></a>
              </td>
            </tr>
            <?php $i++;?>
            <?php endforeach;?>
          </table>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
          <b>+ Tambah Pegawai</b>
          </button>          
        </div>        
      </div>

    <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form method="post" class="form">
                <label for="user-name" style="padding-top: 13px">&nbsp; Name </label>
                <input id="user-name" class="form-content" type="text" name="name" autocomplete="on" required />
                <div class="form-border"></div>

                <label for="jabatan" style="padding-top: 13px">&nbsp; Jabatan </label>                
                <select style="width: 180PX;" id="jabatan" name="jabatan" class="form-select" aria-label="Default select example" required>
                  <option value="">Pilih Jabatan</option>                  
                  <option value="Admin">Admin</option>                  
                  <option value="Fotografer">Fotografer</option>                                   
                </select>
                

                <label for="user-address" style="padding-top: 13px">&nbsp; Address </label>
                <input id="user-address" class="form-content" type="text" name="alamat" autocomplete="on" required />
                <div class="form-border"></div>
  
                <label for="user-phone" style="padding-top: 13px">&nbsp; Phone </label>
                <input id="user-phone" class="form-content" type="tel" name="noHp" autocomplete="on" required />
                <div class="form-border"></div>
  
                <label for="user-email" style="padding-top: 13px">&nbsp; Email </label>
                <input id="user-email" class="form-content" type="email" name="email" autocomplete="on" required />
                <div class="form-border"></div>
  
                <label for="user-username" style="padding-top: 13px">&nbsp; Username </label>
                <input id="user-username" class="form-content" type="text" name="username" autocomplete="on" required />
                <div class="form-border"></div>
  
                <label for="user-password" style="padding-top: 22px">&nbsp; Password </label>
                <input id="user-password" class="form-content" type="password" name="password" required />
                <div class="form-border"></div>
  
                <label for="user-password2" style="padding-top: 22px">&nbsp; Konfirmasi Password </label>
                <input id="user-password2" class="form-content" type="password" name="password2" required />
                <div class="form-border"></div>
  
                <button id="submit-btn" type="submit" name="submit-add">+ Tambah Pegawai</button>
              </form>
            </div>            
          </div>
        </div>
      </div>

    </section>
    <!-- Footer -->
    <footer style="background-color: #1089ff" class="text-center text-light">
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
