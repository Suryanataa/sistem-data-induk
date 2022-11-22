<?php
// koneksi
include "koneksi.php";

// menangkap data dari form
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$statuspgw = $_POST['status_pegawai'];
$status = $_POST['status'];

// kirim data ke db
mysqli_query($koneksi,"UPDATE pegawai SET nip='$nip', nama='$nama', jabatan='$jabatan', status_pegawai='$statuspgw', status='$status' WHERE nip='$nip'");

header("Location: ../tablespgw.php");
?>