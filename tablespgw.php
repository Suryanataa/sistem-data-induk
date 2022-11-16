<?php
    include './php/koneksi.php';
  
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
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Interface</div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseNav" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data</span>
                </a>
                <div id="collapseNav" class="collapse show" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">tables:</h6>
                        <a class="collapse-item active" href="tablespgw.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>data pegawai</span>
                        </a>
                        <a class="collapse-item " href="tablesSiswa.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>data siswa</span>
                        </a>
                        <a class="collapse-item" href="tables.php">
                            <i class="fas fa-fw fa-table"></i>
                            <span>data jurusan</span>
                        </a>
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
                        <h1 class="h3 mb-0 text-gray-800">Table Pegawai</h1>
                    </div>
                    <!-- end of Page Heading -->
                    <!-- tabel bidang dan program keahlian -->
                    <div class="row mt-5 mb-5">
                        <div class="col-12 mb-5">
                            <div class="card shadow-lg accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <div class="card-header">
                                        <h1 class="accordion-header" id="headingOne">
                                            <button class="accordion-button bg-light h4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">Pegawai</button>
                                        </h1>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-primary mb-4"
                                                    data-bs-toggle="modal" data-bs-target="#pegawai">Tambah Pegawai
                                                </button>

                                                <table id="example2" class="table table-striped" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>NIP (Nomor Induk Pegawai)</th>
                                                            <th>Nama</th>
                                                            <th>Jabatan</th>
                                                            <th>Status</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 0;
                                                        $query = mysqli_query($koneksi,"SELECT * FROM pegawai");
                                                        while ($pegawai = mysqli_fetch_object($query)) {
                                                            $no++;
                                                        ?>
                                                        <tr>
                                                            <td><?= $no ?></td>
                                                            <td><?= $pegawai->nip ?></td>
                                                            <td><?= $pegawai->nama ?></td>
                                                            <td><?= $pegawai->jabatan ?></td>
                                                            <td><?= $pegawai->status ?></td>
                                                            <td>
                                                                <!-- Example single danger button -->
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-bs-toggle="dropdown"
                                                                        aria-expanded="false">Action</button>
                                                                    <ul class="dropdown-menu">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#editpegawai<?=$pegawai->nip?>">
                                                                            <li class="dropdown-item">
                                                                                edit
                                                                            </li>
                                                                        </a>
                                                                        <a
                                                                            href="./php/hapuspgw.php?nip=<?=$pegawai->nip?>">
                                                                            <li class="dropdown-item">
                                                                                Hapus
                                                                            </li>
                                                                        </a>

                                                                    </ul>
                                                                </div>

                                                                <!-- modal edit bidang keahlian -->
                                                                <div class="modal fade"
                                                                    id="editpegawai<?=$pegawai->nip?>" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="exampleModalLabel">Edit Data
                                                                                    Pegawai</h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <form action="./php/editpgw.php"
                                                                                method="post">
                                                                                <div class="modal-body">
                                                                                    <div class="mb-3">
                                                                                        <label for="nama"
                                                                                            class="form-label">NIP
                                                                                            (Nomor Induk
                                                                                            Pegawai:</label>
                                                                                        <input type="text"
                                                                                            class="form-control mb-4"
                                                                                            id="nama"
                                                                                            placeholder="Masukan NIP (16 digit)"
                                                                                            name="nip" maxlength="16"
                                                                                            value="<?=$pegawai->nip?>" />
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="nama"
                                                                                            class="form-label">Nama:</label>
                                                                                        <input type="text"
                                                                                            class="form-control mb-4"
                                                                                            id="nama"
                                                                                            placeholder="Masuk kan Nama pegawai"
                                                                                            name="nama"
                                                                                            value="<?=$pegawai->nama?>" />
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="jabatan"
                                                                                            class="form-label">Jabatan:</label>
                                                                                        <div class="form-check">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="radio"
                                                                                                name="jabatan"
                                                                                                id="jabatan1"
                                                                                                value="Tenaga Pendidik"
                                                                                                <?= $pegawai->jabatan == 'Tenaga Pendidik'?'checked':''?>>
                                                                                            <label
                                                                                                class="form-check-label"
                                                                                                for="jabatan1">
                                                                                                Tenaga Pendidik
                                                                                            </label>
                                                                                        </div>
                                                                                        <div class="form-check">
                                                                                            <input
                                                                                                class="form-check-input"
                                                                                                type="radio"
                                                                                                name="jabatan"
                                                                                                id="jabatan2"
                                                                                                value="Tenaga Kependidikan"
                                                                                                <label
                                                                                                class="form-check-label"
                                                                                                for="jabatan2"
                                                                                                <?= $pegawai->jabatan == 'Tenaga Kependidikan'?'checked':''?>>
                                                                                            Tenaga Kependidikan
                                                                                            </label>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class=" mb-3">
                                                                                        <label for="agama"
                                                                                            class="form-label">Status:</label>
                                                                                        <select class="form-select"
                                                                                            aria-label="Default select example"
                                                                                            name="status" id="agama">
                                                                                            <option selected>Status
                                                                                                Pegawai</option>
                                                                                            <option value="Aktif"
                                                                                                <?= $pegawai->status == 'Aktif'?'selected':''?>>
                                                                                                Aktif
                                                                                            </option>
                                                                                            <option value="Tidak Aktif"
                                                                                                <?= $pegawai->status == 'Tidak Aktif'?'selected':''?>>
                                                                                                Tidak Aktif
                                                                                            </option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
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

                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
            <!-- modal pegawai -->
            <div class="modal fade" id="pegawai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah
                                Pegawai</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="./php/tambahpgw.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">NIP
                                        (Nomor Induk
                                        Pegawai:</label>
                                    <input type="text" class="form-control mb-4" id="nama"
                                        placeholder="Masukan NIP (16 digit)" name="nip" maxlength="16" />
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama:</label>
                                    <input type="text" class="form-control mb-4" id="nama"
                                        placeholder="Masuk kan Nama pegawai" name="nama" />
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan:</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jabatan" id="jabatan1"
                                            value="Tenaga Pendidik">
                                        <label class="form-check-label" for="jabatan1">
                                            Tenaga Pendidik
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jabatan" id="jabatan2"
                                            value="Tenaga Kependidikan" <label class="form-check-label" for="jabatan2">
                                        Tenaga Kependidikan
                                        </label>
                                    </div>
                                </div>
                                <div class=" mb-3">
                                    <label for="agama" class="form-label">Status:</label>
                                    <select class="form-select" aria-label="Default select example" name="status"
                                        id="agama">
                                        <option selected>Status
                                            Pegawai</option>
                                        <option value="Aktif">
                                            Aktif
                                        </option>
                                        <option value="Tidak Aktif">
                                            Tidak Aktif
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- modal Program keahlian -->
            <div class="modal fade" id="program" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah program keahlian</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="./php/tambahpk.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">ID Program keahlian:</label>
                                    <input type="text" class="form-control mb-4" id="nama" placeholder="Masuk id"
                                        name="id_pk" />
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">nama Program keahlian:</label>
                                    <input type="text" class="form-control mb-4" id="nama"
                                        placeholder="Masuk kan Nama Program keahlian" name="program_keahlian" />
                                </div>
                                <div class=" mb-3">
                                    <label for="agama" class="form-label">bidang keahlian:</label>
                                    <select class="form-select" aria-label="Default select example" name="id_bk"
                                        id="agama">
                                        <option selected>bidang keahlian</option>
                                        <?php
                                            $no = 0;
                                            $query = mysqli_query($koneksi,"SELECT * FROM bidang_keahlian");
                                            while ($data = mysqli_fetch_object($query)) {
                                                $no++;
                                            ?>
                                        <option value="<?=$data->id_bk?>"><?= $data->bidang_keahlian ?></option>
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

            <!-- modal Konsentrasi keahlian -->
            <div class="modal fade" id="konsentrasi" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah konsentrasi keahlian</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="./php/tambahkk.php" method="post">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">ID Konsentrasi Keahlian:</label>
                                    <input type="text" class="form-control mb-4" id="nama" placeholder="Masuk id"
                                        name="id_kk" />
                                </div>
                                <div class=" mb-3">
                                    <label for="agama" class="form-label">Program Keahlian:</label>
                                    <select class="form-select" aria-label="Default select example" name="id_pk"
                                        id="agama">
                                        <option selected>Program keahlian</option>
                                        <?php
                                            $no = 0;
                                            $query = mysqli_query($koneksi,"SELECT * FROM program_keahlian");
                                            while ($data = mysqli_fetch_object($query)) {
                                                $no++;
                                                ?>
                                        <option value="<?=$data->id_pk?>"><?= $data->program_keahlian ?></option>
                                        <?php
										}
										?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Konsentrasi Keahlian:</label>
                                    <input type="text" class="form-control mb-4" id="nama"
                                        placeholder="Masuk kan Nama konsentrasi keahlian" name="konsentrasi_keahlian" />
                                </div>
                                <div class=" mb-3">
                                    <label for="agama" class="form-label">Tahun Program:</label>
                                    <select class="form-select" aria-label="Default select example" name="tahun_program"
                                        id="agama">
                                        <option selected>Tahun Program</option>
                                        <option value="3">3 tahun</option>
                                        <option value="4">4 tahun</option>
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