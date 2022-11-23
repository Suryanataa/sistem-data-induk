<?php
include "koneksi.php";

// menangkap data dari form
$id_kelas = $_GET['id_kelas'];
$nisn = $_GET["nisn"];
mysqli_query($koneksi,"DELETE FROM peserta_didik WHERE nisn = '$nisn'");

header("Location: ../tablesPeserta.php?id_kelas=$id_kelas");

?>