<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {
  if( registrasi($_POST) > 0 ) {
       echo "<script>
                 alert('user baru berhasil ditambahkan!');
              </script>";
              header ("Location: login.php");
    } else {
       echo mysqli_error ($conn);
    }
  }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/register.css" />
    <title>Precies - Register</title>
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #1089FF" data-aos="fade-down" data-aos-offset="1370" data-aos-once="false">
      <div class="container">
        <a class="navbar-brand" href="#">Precise</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Register -->
    <section class="login-register">
      <div class="container">
        <div id="card">
          <div id="card-content">
            <div id="card-title">
              <h2>REGISTER</h2>
              <div class="underline-title"></div>
            </div>
            <form method="post" class="form">
              <label for="user-name" style="padding-top: 13px">&nbsp; Name </label>
              <input id="user-name" class="form-content" type="text" name="name" autocomplete="on" required />
              <div class="form-border"></div>

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

              <button id="submit-btn" type="submit" name="register">REGISTER</button>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- Akhir register -->

    <!-- Footer -->
    <footer></footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  </body>
</html>
