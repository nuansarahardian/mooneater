<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "db_foto");


function query ($query) {
    global $conn;
    $result = mysqli_query ($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc ($result) ) { 
         $rows [] = $row;
    }
    return $rows;
}

 function tambah_paket($data) {
   global $conn;
   $nama = htmlspecialchars($data["nama"]); 
   $harga = htmlspecialchars($data["harga"]);
   $keterangan = htmlspecialchars($data["keterangan"]);

   $query = "INSERT INTO daftar_paket
              VALUES
              ('', '$nama', '$harga', '$keterangan')            
              ";
   mysqli_query($conn, $query);
   return mysqli_affected_rows ($conn);
 }
 function hapuspegawai ($id) {
   global $conn;
   mysqli_query ($conn, "DELETE FROM pegawai WHERE id_user = $id");

   return mysqli_affected_rows ($conn);
 }

 function hapus ($id) {
   global $conn;
   mysqli_query ($conn, "DELETE FROM daftar_paket WHERE id_paket = $id");

   return mysqli_affected_rows ($conn);
 }

 function ubah ($data){
  global $conn;
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama"]); 
  $harga = htmlspecialchars($data["harga"]);
  $keterangan = htmlspecialchars($data["keterangan"]);

  $query = "UPDATE daftar_paket SET
             nama = '$nama',
             harga = $harga,
             keterangan = '$keterangan'
             WHERE id_paket = $id      
             ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows ($conn);
 }

 function registrasi($data) {
  global $conn;
  $name = htmlspecialchars($data["name"]); 
  $alamat = htmlspecialchars($data["alamat"]);
  $noHp = htmlspecialchars($data["noHp"]);
  $email = htmlspecialchars($data["email"]);
  $username = strtolower (stripslashes ($data["username"]));
  $password = mysqli_real_escape_string ($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // cek username sudah ada atau belum
$result = mysqli_query ($conn, "SELECT username FROM user WHERE username = '$username'");
  if( mysqli_fetch_assoc ($result) ) {
    echo "<script>
           alert('username sudah terdaftar!')
          </script>";
    return false;
  }

 // cek konfirmasi password
  if( $password !== $password2 ) {
      echo "<script>
              alert('konfirmasi password tidak sesuai!');
            </script>";
      return false;
  }

  // enkripsi password
  $password = password_hash ($password, PASSWORD_DEFAULT);

  // tambahkan userbaru ke database
  mysqli_query ($conn, "INSERT INTO user VALUES ('', '$name','$alamat','$noHp','$email','$username','$password')");
  return mysqli_affected_rows ($conn);
 }

 function tambah_pegawai($data) {
  global $conn;
  $jabatan = htmlspecialchars($data["jabatan"]); 
  $name = htmlspecialchars($data["name"]); 
  $alamat = htmlspecialchars($data["alamat"]);
  $noHp = htmlspecialchars($data["noHp"]);
  $email = htmlspecialchars($data["email"]);
  $username = strtolower (stripslashes ($data["username"]));
  $password = mysqli_real_escape_string ($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  // cek username sudah ada atau belum
$result = mysqli_query ($conn, "SELECT username FROM pegawai WHERE username = '$username'");
  if( mysqli_fetch_assoc ($result) ) {
    echo "<script>
           alert('username sudah terdaftar!')
          </script>";
    return false;
  }

 // cek konfirmasi password
  if( $password !== $password2 ) {
      echo "<script>
              alert('konfirmasi password tidak sesuai!');
            </script>";
      return false;
  }

  // enkripsi password
  $password = password_hash ($password, PASSWORD_DEFAULT);

  // tambahkan userbaru ke database
  mysqli_query ($conn, "INSERT INTO pegawai VALUES ('', '$jabatan', '$name','$alamat','$noHp','$email','$username','$password')");
  return mysqli_affected_rows ($conn);
 }

 function tambah_order($data) {
  global $conn;
  $nama     = htmlspecialchars($data["name"]); 
  $id_paket = htmlspecialchars($data["namaPaket"]);
  $telf     = htmlspecialchars($data["noHp"]);
  $email    = htmlspecialchars($data["email"]);
  $alamat   = htmlspecialchars($data["alamat"]);
  $tanggal  = $data["tanggal"];
  $catatan  = htmlspecialchars($data["catatan"]);
  $tglorder = date("Y-m-d H:i:s");

  $query = "INSERT INTO order_list
             VALUES
             ('', '$id_paket', '$nama', '$telf', '$email', '$alamat', '$catatan', '$tanggal', '$tglorder')            
             ";
  mysqli_query($conn, $query);
  return mysqli_affected_rows ($conn);
}

?>