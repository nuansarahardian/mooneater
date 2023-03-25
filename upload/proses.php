<?php
 $con = new mysqli('localhost','root','','db_foto');
 $path = 'upload/';
 $a = $_FILES['gbr']['name'];
 $jml = count($a);
 for ($i=0; $i < $jml ; $i++) {
   $b = $a[$i];
   $c = $_FILES['gbr']['tmp_name'][$i];
   $id = $_POST['orderid'];
   move_uploaded_file($c,$path.$b);
   $sql  = $con->query("INSERT INTO galery VALUES ('',$id,'$b')");
   $sql1 = $con->query("UPDATE transaksi SET stt_trx = 3 WHERE id_trx = $id_trx");
  }
    if($sql & $sql1){
        echo "
        <script>
        alert('Upload Berhasil!');
        document.location.href = 'pilihupload.php';
        </script>
        ";
      }else {
        echo "
        <script>
        alert('Upload GAGAL. Ulangi Proses Upload!');
        document.location.href = 'pilihupload.php';
        </script>
        ";
    }
 ?>
