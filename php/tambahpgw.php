<?php
include 'koneksi.php';

// tambah konsen
$nip = $_POST['nip'];
$nama = $_POST['nama'];
$jabatan = $_POST['jabatan'];
$status = $_POST['status'];

mysqli_query($koneksi,"INSERT INTO pegawai VALUES ('$nip','$nama','$jabatan','$status')");
// end of tambah program

header("Location: ../tablespgw.php");