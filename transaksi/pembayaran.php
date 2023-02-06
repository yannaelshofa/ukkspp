<h3>Pembayaran</h3>
<?php
include "koneksi.php";
$id_petugas=$_SESSION['id_petugas'];
$nis=$_GET['nis'];
$query=mysqli_query($koneksi,"select * from siswa where nis='$nis'");
$data=mysqli_fetch_array($query);
echo "Nama : ".$data['nama']."<br>";
echo "Kelas : ".$data['kelasok']."<br>";
?>
<form action="" method="post">
    Pembayaran :
    <select name="id_bayar" id="">
        <?php
        $query=mysqli_query($koneksi,"select * from bayar");
        while($bayar=mysqli_fetch_array($query)){
            ?>
        <option value="<?php echo $bayar['id_bayar'] ?>"><?php echo $bayar['nama_bayar'] ?></option>
        <?php
        }
    ?>
    </select>
    <button name="simpan">Simpan</button>
</form>
<?php
if(isset($_POST['simpan'])){

//   Cek Data Pembayaran
$id_bayar=$_POST['id_bayar'];
$cek=mysqli_query($koneksi,"select * from pembayaran where nis='$nis' and id_bayar='$id_bayar'");

if(mysqli_num_rows($cek)>0){
    echo "data double";
}
else{
  
    $query=mysqli_query($koneksi,"insert into pembayaran(nis,id_bayar,id_petugas) values('$nis','$id_bayar','$id_petugas')");
    echo "Data Berhasil Ditambahkan";
}
    
}
?>
<!-- Tampil Data -->
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Pembayaran</th>
        <th>Nominal</th>
        <th>Aksi</th>
    </tr>
    <?php
    $i=1;
$query=mysqli_query($koneksi,"SELECT pembayaran.id,bayar.nama_bayar,bayar.nominal from pembayaran,bayar WHERE bayar.id_bayar=pembayaran.id_bayar AND pembayaran.status='0' AND pembayaran.nis='$nis'");
while($data=mysqli_fetch_array($query)){
    ?>
    <tr>
        <td><?= $i++ ?></td>
        <td><?= $data['nama_bayar']?></td>
        <td><?= $data['nominal']?></td>
        <td><a href="?page=transaksi/hapus&id=<?= $data['id']   ?>" class="btn btn-danger">
                Hapus</a></td>
    </tr>
    <?php
}
    ?>
</table>