<?php
include 'koneksi.php';

// tambah konsen
$id_kelas = $_GET['id_kelas'];
$ni = $_GET['nisn'];
$nisn = $_POST['nisn'];
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$tmp = $_POST['tempat_lahir'];
$tgl = $_POST['tanggal_lahir'];
$id = $_POST['id_kelas'];

mysqli_query($koneksi,"UPDATE peserta_didik SET nisn='$nisn', nik='$nik', nama='$nama', jk='$jk', tempat_lahir='$tmp', tanggal_lahir='$tgl', id_kelas='$id' WHERE nisn='$ni'");
// end of tambah program

header("Location: ../tablesPeserta.php?id_kelas=$id_kelas");