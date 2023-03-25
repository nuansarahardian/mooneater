<?php

require 'functions.php';

$id = $_GET["id"]; 
if(hapusfoto($id) > 0 ) {
     echo "
          <script>
                alert('Foto berhasil dihapus!');
                document.location.href = 'lihatfotocustomer.php';
          </script>
     ";
 } else {
    echo "
          <script>
                alert('Foto gagal dihapus!');
                document.location.href = 'lihatfotocustomer.php';
          </script>
     ";
 }
?>