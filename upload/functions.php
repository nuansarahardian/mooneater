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


 function hapusfoto ($id_user) {
   global $conn;
   mysqli_query ($conn, "DELETE FROM tbgambar WHERE idgambar = $id");

   return mysqli_affected_rows ($conn);
 }

 function ubah ($data){
  global $conn;
  $id = $data["id_order"];
  $id_status = $data["status"];
  
  $query = "UPDATE order_list SET
            id_status = 2
            WHERE id_order = $id
            ";  
  mysqli_query($conn, $query);
  return mysqli_affected_rows ($conn);
 }

?>