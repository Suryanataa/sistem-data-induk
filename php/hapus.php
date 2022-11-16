<?php
include "koneksi.php";

// menangkap data dari form
$id_kk = $_GET["id_kk"];
mysqli_query($koneksi,"DELETE FROM konsentrasi_keahlian WHERE konsentrasi_keahlian.id_kk = '$id_kk'");

$id_pk = $_GET["id_pk"];
mysqli_query($koneksi,"DELETE FROM program_keahlian WHERE program_keahlian.id_pk = '$id_pk'");

$id_bk = $_GET["id_bk"];
mysqli_query($koneksi,"DELETE FROM bidang_keahlian WHERE bidang_keahlian.id_bk = '$id_bk'");


header("Location: ../tables.php");

?>