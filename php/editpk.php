<?php
// koneksi
include "koneksi.php";

// menangkap data dari form
$idpk = $_POST['id_pk'];
$program = $_POST['program_keahlian'];
$idbk = $_POST['id_bk'];

// kirim data ke db
mysqli_query($koneksi,"UPDATE program_keahlian SET id_pk='$idpk', program_keahlian='$program', id_bk='$idbk' WHERE id_pk='$idpk'");

header("Location: ../tables.php");
?>