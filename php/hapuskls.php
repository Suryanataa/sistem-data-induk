<?php
include "koneksi.php";

// menangkap data dari form
$id_ta = $_GET["id_ta"];
$id = $_GET["id_kelas"];
mysqli_query($koneksi,"DELETE FROM kelas WHERE id_kelas = '$id'");

header("Location: ../tablesSiswa.php?id_ta=$id_ta");

?>