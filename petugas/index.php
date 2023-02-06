<?php

if($_SESSION['level']!="1"){
   ?>
<script>
    window.location.href = 'index.php';
    alert("Anda tidak berhak akses halaman ini");
</script>
<?php 
}
?>
<h1> Halaman Pegawai</h1>