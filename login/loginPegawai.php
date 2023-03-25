<?php 
session_start();

// if (isset($_SESSION['username'])) {
  
//       if( $_SESSION['username'] === 'owner'){
//         header("Location: ../2.dashboard/dashboard.php");
//         exit;
//       }
//       if( $_SESSION['username'] === 'admin'){
//         header("Location: ../2.dashboard/dashboard admin.php");
//         exit;
//       }
//       if( $_SESSION['username'] === 'fotografer'){
//         header("Location: ../2.dashboard/dashboard fotografer.php");
//         exit;
//       }
//       header("Location: ../2.dashboard/logout.php");
//       exit;
//     }

require 'functions.php';

if( isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $result   = mysqli_query($conn, "SELECT * FROM pegawai WHERE username = '$username'");
  $jab  = mysqli_query($conn, "SELECT jabatan FROM pegawai WHERE username = '$username'");
  // cek username
  if( mysqli_num_rows($result) === 1) {
    // cek password
    $row = mysqli_fetch_assoc($result);
    $jabatan = mysqli_fetch_assoc($jab);
    if( password_verify($password, $row["password"]) ) {
      // set session
      
      $_SESSION["username"] = $row["username"];      
      if($jabatan["jabatan"] === 'Owner'){
        header("Location: ../2.dashboard/dashboard.php");
        exit;
      }
      if($jabatan["jabatan"] === 'Admin'){        
        header("Location: ../2.dashboard/dashboard admin.php");
        exit;
      }
      if($jabatan["jabatan"] === 'Fotografer'){
        header("Location: ../2.dashboard/dashboard fotografer.php");
        exit;
      }      
    }

  }

  $error = true;

}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../../css/loginPegawai.css" />
    <title>Precies - Login</title>
  </head>
  <body>

      <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #1089FF;">
      <div class="container">
        <a class="navbar-brand" href="#">Precise</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link fw-bold" href="login.php"><button type="button" class="btn btn-light">Login Customer</button></a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar -->
    </div>

    <!-- Login -->
    <section class="login-register">
        <div class="container">

            <div id="card">
                <div id="card-content">
                  <div id="card-title">
                    <h2>Login Pegawai</h2>
                                      
                    <div class="underline-title">
          
                    </div>
                    
                  </div>
                  <div class="text-center">
                    <?php if( isset($error) ) : ?>
                    <p style="color: #F05454;">Username atau Password Salah</p>
                    <?php endif; ?>
                  </div>
                  <form action="" method="post" class="form">
                    <label for="user-username" style="padding-top: 13px">&nbsp;Username</label>
                    <input id="user-username" class="form-content" type="text" name="username" autocomplete="on" required/>
                    <div class="form-border"></div>
                    
                    <label for="user-password" style="padding-top: 22px">&nbsp; Password</label>
                    <input id="user-password" class="form-content" type="password" name="password" required/>
                    <div class="form-border"></div>
          
                    <button id="submit-btn" type="submit" name="login">Login</button>

                  </form>
                                       
                </div>
              </div>
        </div>
    </section>
    <!-- Akhir login -->

    <!-- Register -->
    <!-- Akhir Register -->

    <!-- Footer -->
    <footer>
    </footer>
    <!-- Akhir Footer -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script> 
  </body>
</html>
