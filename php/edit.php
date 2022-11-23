<?php
// koneksi
include "koneksi.php";

// menangkap data dari form
$id = $_GET['id_bk'];
$idbk = $_POST['id_bk'];
$bidang = $_POST['bidang_keahlian'];

// kirim data ke db
mysqli_query($koneksi,"UPDATE bidang_keahlian SET id_bk='$idbk', bidang_keahlian='$bidang' WHERE id_bk='$id'");

header("Location: ../tables.php");
?>