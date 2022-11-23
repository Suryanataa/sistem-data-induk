<?php
include 'koneksi.php';

// tambah konsen
$id_kelas = $_GET['id_kelas'];
$nisn = $_POST['nisn'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$tmp = $_POST['tempat_lahir'];
$tgl = $_POST['tanggal_lahir'];
$id = $_POST['id_kelas'];

mysqli_query($koneksi,"INSERT INTO peserta_didik VALUES ('$nisn','$nik','$nama','$jk','$tmp','$tgl','$id')");
// end of tambah program

header("Location: ../tablesPeserta.php?id_kelas=$id_kelas");