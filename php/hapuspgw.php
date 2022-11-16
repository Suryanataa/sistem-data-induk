<?php
include "koneksi.php";

// menangkap data dari form
$nip = $_GET["nip"];
mysqli_query($koneksi,"DELETE FROM pegawai WHERE pegawai.nip = '$nip'");

header("Location: ../tablespgw.php");

?>