<?php
include 'koneksi.php';

// tambah konsen
$id_kk = $_POST['id_kk'];
$konsentrasi = $_POST['konsentrasi_keahlian'];
$idpk = $_POST['id_pk'];
$tahun = $_POST['tahun_program'];

mysqli_query($koneksi,"INSERT INTO konsentrasi_keahlian VALUES ('$id_kk','$konsentrasi', '$tahun','$idpk ')");
// end of tambah program

header("Location: ../tables.php");