<?php
// koneksi
include "koneksi.php";

// menangkap data dari form
$id = $_GET['id_pk'];
$idpk = $_POST['id_pk'];
$program = $_POST['program_keahlian'];
$idbk = $_POST['id_bk'];

// kirim data ke db
mysqli_query($koneksi,"UPDATE program_keahlian SET id_pk='$idpk', program_keahlian='$program', id_bk='$idbk' WHERE id_pk='$id'");

header("Location: ../tables.php");
?>