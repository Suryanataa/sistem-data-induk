<?php
// koneksi
include "koneksi.php";

// menangkap data dari form
$id_ta = $_GET['id_ta'];
$id = $_POST['id_kelas'];
$kelas = $_POST['kelas'];
$nip = $_POST['nip'];
$kk = $_POST['id_kk'];
$ta = $_POST['id_ta'];

// kirim data ke db
mysqli_query($koneksi,"UPDATE kelas SET id_kelas='$id', kelas='$kelas', nip='$nip', id_kk='$kk', id_ta='$ta' WHERE id_kelas='$id'");

header("Location: ../tablesSiswa.php?id_ta=$id_ta");
?>