
<DOCTYPE html!>
<html>
<body>

<?php
// include database connection file
include_once("includes/config.php");
$no=1;
if(isset($_GET['id_trx'])){
    $id=$_GET['id_trx'];
}
 

$query="SELECT * FROM transaksi WHERE id_trx='$id'";
$queryupload = mysqli_query($koneksidb,$query);

while ($data = mysqli_fetch_array($queryupload)){
    ?>


    <h2>Upload Foto</h2>
    <form action="proses_update.php?id_trx=<?=$data['id_trx']?>" method="post">
            <table>
                <input type="hidden" name="id_trx" value="<?php echo $data['id_trx']; ?>">
                <tr>
                    <td>Nama</td>
                    <td><input type=" text" name="nama_produk" value="<?php echo $data['id_trx']; ?>"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" value="<?php echo $data['tgl_trx']; ?>"></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="text" name="stok" value="<?php echo $data['stt_trx'];  ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi"><?php echo $data['id_galery']; ?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="Simpan"></td>
                </tr>
            </table>
        <?php } ?>
    </form>
</body>
</html>



<!-- 

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
                <td><form action="proses_update.php?id_trx=<?=$result['id_trx']?>" method="post">
                <td>Stok</td>
                    <td><input type="text" name="upload" value="<?php echo $data['id_galery'];  ?>"></td>
                </td>
                <td><input type="submit" name="Simpan"></td>
               
                <td>
                </td>
            </tr>
        <?php ?>
    </table>
</body>
</html> -->
