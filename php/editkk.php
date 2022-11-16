<?php
// koneksi
include "koneksi.php";

// menangkap data dari form
$idkk = $_POST['id_kk'];
$idpk = $_POST['id_pk'];
$konsentrasi = $_POST['konsentrasi_keahlian'];
$tahun = $_POST['tahun_program'];

// kirim data ke db
mysqli_query($koneksi,"UPDATE konsentrasi_keahlian SET id_kk='$idkk', konsentrasi_keahlian='$konsentrasi',tahun_program='$tahun', id_pk='$idpk' WHERE konsentrasi_keahlian.id_kk='$idkk'");

header("Location: ../tables.php");
?>