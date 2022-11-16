<?php
include 'koneksi.php';

// tambah bidang
$id = $_POST['id_bk'];
$bidang = $_POST['bidang_keahlian'];

mysqli_query($koneksi,"INSERT INTO bidang_keahlian VALUES ('$id','$bidang')");
// end of tambah bidang

header("Location: ../tables.php");
?>