<?php
include 'koneksi.php';

// tambah program
$id_pk = $_POST['id_pk'];
$program = $_POST['program_keahlian'];
$idbk = $_POST['id_bk'];

mysqli_query($koneksi,"INSERT INTO program_keahlian VALUES ('$id_pk','$program', '$idbk')");
// end of tambah program

header("Location: ../tables.php");