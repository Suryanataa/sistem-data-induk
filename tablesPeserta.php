<?php
    include './php/koneksi.php';
    $id_kelas = $_GET['id_kelas'];
    
    $q = mysqli_query($koneksi,"SELECT * FROM kelas WHERE id_kelas = '$id_kelas'");
    $kelas = mysqli_fetch_object($q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Ngawi Tech - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <link rel="stylesheet" href="dataTables.bootstrap5.min.css" />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">NGAWITECH Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Interface</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item ">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Jurusan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tablespgw.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pegawai</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseSide" aria-expanded="true"
                    aria-controls="collapseSide">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Kelas</span>
                </a>
                <div id="collapseSide" class="collapse show" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">tahun angkatan:</h6>
                        <?php
                            $agt = 0;
                            $q = mysqli_query($koneksi,"SELECT * FROM tahun_ajaran");
                            while ($angkatan = mysqli_fetch_object($q)) {
                            $agt++;
                            ?>
                        <a class="collapse-item" href="tablesSiswa.php?id_ta=<?=$angkatan->id_ta?>">
                            <i class="fas fa-fw fa-folder"></i>
                            <span><?= $angkatan->tahun_angkatan?></span>
                        </a>
                        <?php
							}
						?>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column pt-5">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Siswa Kelas <?=$kelas->kelas?></h1>
                    </div>
                    <!-- end of Page Heading -->
                    <div class="row mb-5 mt-5">
                        <div class="col-12">
                            <div class="card shadow-lg" style="width: 100%">
                                <div class="card-header">
                                    <h4 class="pt-3 text-primary">Peserta Didik</h4>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                        data-bs-target="#konsentrasi">Tambah Peserta Didik
                                    </button>
                                    <table id="example" class="table table-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NISN</th>
                                                <th>NIK </th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Kelas</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysqli_query($koneksi,"SELECT * FROM peserta_didik WHERE id_kelas = '$id_kelas'");
                                            while ($siswa = mysqli_fetch_object($query)) {
                                                $no++;
                                            ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $siswa->nisn ?></td>
                                                <td><?= $siswa->nik ?></td>
                                                <td><?= $siswa->nama ?></td>
                                                <td><?= $siswa->jk ?></td>
                                                <td><?= $siswa->tempat_lahir ?></td>
                                                <td><?= $siswa->tanggal_lahir ?></td>
                                                <td><?= $kelas->kelas ?></td>
                                                <td>
                                                    <!-- Example single danger button -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false">Action</button>
                                                        <ul class="dropdown-menu">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#kon<?=$kelas->id_kelas?>">
                                                                <li class="dropdown-item">
                                                                    edit
                                                                </li>
                                                            </a>
                                                            <a
                                                                href="./php/hapuspsr.php?nisn=<?=$siswa->nisn?>&id_kelas=<?=$kelas->id_kelas?>">
                                                                <li class="dropdown-item">
                                                                    Hapus
                                                                </li>
                                                            </a>

                                                        </ul>
                                                    </div>
                                                    <!-- modal Konsentrasi keahlian -->
                                                    <div class="modal fade" id="kon<?=$kelas->id_kelas?>" tabindex="-1"
                                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Tambah Peserta Didik</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form
                                                                    action="./php/editpsr.php?id_kelas=<?=$kelas->id_kelas?>&nisn=<?=$siswa->nisn?>"
                                                                    method="post">
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label for="nama"
                                                                                class="form-label">NISN:</label>
                                                                            <input type="text" class="form-control mb-4"
                                                                                id="nama" placeholder="Masuk NISN"
                                                                                name="nisn" maxlength="10"
                                                                                value="<?=$siswa->nisn?>" />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="nama"
                                                                                class="form-label">NIK:</label>
                                                                            <input type="text" class="form-control mb-4"
                                                                                id="nama" placeholder="Masuk NIK"
                                                                                name="nik" maxlength="16"
                                                                                value="<?=$siswa->nik?>" />
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="form-label">Nama
                                                                                Lengkap:</label>
                                                                            <input type="text" class="form-control mb-4"
                                                                                id="nama"
                                                                                placeholder="Masuk nama lengkap"
                                                                                name="nama" value="<?=$siswa->nama?>" />
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="mb-3">
                                                                                <label for="jk" class="form-label">Jenis
                                                                                    Kelamin:</label>
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="jk" id="jk1"
                                                                                        value="Laki-Laki"
                                                                                        <?= $siswa->jk == 'Laki-Laki'?'checked':''?>>
                                                                                    <label class="form-check-label"
                                                                                        for="jk1">
                                                                                        Laki-laki
                                                                                    </label>
                                                                                </div>
                                                                                <div class="form-check">
                                                                                    <input class="form-check-input"
                                                                                        type="radio" name="jk" id="jk2"
                                                                                        value="Perempuan"
                                                                                        <?= $siswa->jk == 'Perempuan'?'checked':''?>>
                                                                                    <label class="form-check-label"
                                                                                        for="jk2">
                                                                                        Perempuan
                                                                                    </label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="form-label">Tempat
                                                                                Tinggal:</label>
                                                                            <textarea class="form-control" id="pesan"
                                                                                name="tempat_lahir"
                                                                                rows="3"><?=$siswa->tempat_lahir?></textarea>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="form-label">Tanggal
                                                                                Tinggal:</label>
                                                                            <input type="date" class="form-control"
                                                                                id="pesan" name="tanggal_lahir" rows="3"
                                                                                value="<?=$siswa->tanggal_lahir?>" />
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <label for="agama"
                                                                                class="form-label">Kelas:</label>
                                                                            <select class="form-select"
                                                                                aria-label="Default select example"
                                                                                name="id_kelas" id="agama">
                                                                                <option selected>Kelas</option>
                                                                                <?php
                                            $no = 0;
                                            $query = mysqli_query($koneksi,"SELECT * FROM kelas");
                                            while ($data = mysqli_fetch_object($query)) {
                                                $no++;
                                            ?>
                                                                                <option value="<?=$data->id_kelas?>"
                                                                                    <?= $siswa->id_kelas == $data->id_kelas?'selected':''?>>
                                                                                    <?= $data->kelas ?></option>
                                                                                <?php
										}
										?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Save
                                                                            changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->


            <!-- modal Konsentrasi keahlian -->
            <div class="modal fade" id="konsentrasi" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Peserta Didik</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="./php/tambahpsr.php?id_kelas=<?=$kelas->id_kelas?>" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">NISN:</label>
                                    <input type="text" class="form-control mb-4" id="nama" placeholder="Masuk NISN"
                                        name="nisn" maxlength="10" />
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">NIK:</label>
                                    <input type="text" class="form-control mb-4" id="nama" placeholder="Masuk NIK"
                                        name="nik" maxlength="16" />
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Lengkap:</label>
                                    <input type="text" class="form-control mb-4" id="nama"
                                        placeholder="Masuk nama lengkap" name="nama" />
                                </div>
                                <div class=" mb-3">
                                    <div class="mb-3">
                                        <label for="jk" class="form-label">Jenis Kelamin:</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jk" id="jk1"
                                                value="Laki-Laki">
                                            <label class="form-check-label" for="jk1">
                                                Laki-laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jk" id="jk2"
                                                value="Perempuan">
                                            <label class="form-check-label" for="jk2">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Tempat Tinggal:</label>
                                    <textarea class="form-control" id="pesan" name="tempat_lahir" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Tanggal Tinggal:</label>
                                    <input type="date" class="form-control" id="pesan" name="tanggal_lahir" rows="3" />
                                </div>
                                <div class=" mb-3">
                                    <label for="agama" class="form-label">Kelas:</label>
                                    <select class="form-select" aria-label="Default select example" name="id_kelas"
                                        id="agama">
                                        <option selected>Kelas</option>
                                        <?php
                                            $no = 0;
                                            $query = mysqli_query($koneksi,"SELECT * FROM kelas");
                                            while ($data = mysqli_fetch_object($query)) {
                                                $no++;
                                            ?>
                                        <option value="<?=$data->id_kelas?>"><?= $data->kelas ?></option>
                                        <?php
										}
										?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Ngawi Tech 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="jquery.dataTables.min.js"></script>
    <script src="dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script>
    $(document).ready(function() {
        $("#example").DataTable();
    });
    $(document).ready(function() {
        $("#example2").DataTable();
    });
    $(document).ready(function() {
        $("#example3").DataTable();
    });
    </script>
</body>

</html>