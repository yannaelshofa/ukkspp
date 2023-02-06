<?php
include "koneksi.php";

?>

<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nis</th>
                            <th>Nama</th>

                            <th>Kelas</th>
                            <th>Bayar</th>

                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nis</th>
                            <th>Nama</th>

                            <th>Kelas</th>
                            <th>Bayar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $query=mysqli_query($koneksi,"select * from siswa");
                        while($data=mysqli_fetch_array($query)){
                            ?>
                        <tr>
                            <td><?php echo $data['nis']  ?></td>
                            <td><?php echo $data['nama']  ?></td>
                            <td><?php echo $data['kelasok']  ?></td>
                            <td><a href="?page=transaksi/pembayaran&nis=<?= $data['nis']   ?>" class="btn btn-primary">
                                    Proses</a></td>
                        </tr>
                        <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>