<?php
// include database connection file
include_once("includes/config.php");
$no=1;
if(isset($_GET['id_trx'])){
    $id=$_GET['id_trx'];
}
 

$query=mysqli_query($koneksidb, "SELECT * FROM transaksi WHERE id_trx='$id'"); // query select produk di dalam php
$data = mysqli_fetch_array($query)
    ?>

<DOCTYPE html!>
<html>
<table>
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Harga</td>
                <td>Stok</td>
                <td>Deskripsi</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $data['id_trx'] ?></td>
                <td><?php echo $data['id_paket'] ?></td>
                <td><?php echo $data['tgl_trx'] ?></td>
                <td><?php echo $data['stt_trx'] ?></td>
                <td><?php echo $data['id_galery'] ?></td>
                <td><a href="update_foto.php">Kembali</a></td>
                <td><form action="proses_update.php" method="post">
                <td>Stok</td>
                    <td><input type="text" name="upload" value="<?php echo $data['id_galery'];  ?>"></td>
                </td>
                <td><input type="submit" name="Simpan"></td>
            </tr>
        <?php ?>
    </table>
    
</body>
</html>
