<?php
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

if(!empty($_FILES)){
	$namaFile = $_FILES['file']['name'];
  $ukuranFile = $_FILES['file']['size'];
  $error = $_FILES['file']['error'];
  $tmpName = $_FILES ['file']['tmp_name'];

  //cek apakah ada gambar
  if( $error === 4 ) {
    echo "<script>
              alert('pilih gambar terlebih dahulu!');
            </script>";
    return false;
  }
  

  //cek file gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode ('.', $namaFile);
  $ekstensiGambar = strtolower (end ($ekstensiGambar)); 
  if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
      echo "<script>
              alert('yang anda upload bukan gambar!');
            </script>";
      return false;
  }

  $namaFileBaru = uniqid(); 
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'upload/' . $namaFileBaru);

  global $conn;
  $query = "INSERT INTO galery  
  VALUES ('','', '','$namaFileBaru')";
	mysqli_query($conn, $query);
}
?>