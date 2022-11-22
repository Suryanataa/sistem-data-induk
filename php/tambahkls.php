<?php
include 'koneksi.php';

// tambah konsen
$id_ta = $_GET['id_ta'];
$id = $_POST['id_kelas'];
$kelas = $_POST['kelas'];
$nip = $_POST['nip'];
$kk = $_POST['id_kk'];
$ta = $_POST['id_ta'];

mysqli_query($koneksi,"INSERT INTO kelas VALUES ('$id','$kelas','$nip','$kk','$ta')");
// end of tambah program

header("Location: ../tablesSiswa.php?id_ta=$id_ta");