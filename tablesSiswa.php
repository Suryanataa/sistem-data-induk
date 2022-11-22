<?php
    include './php/koneksi.php';
    $id_ta = $_GET['id_ta'];
    
    $q = mysqli_query($koneksi,"SELECT * FROM tahun_ajaran WHERE id_ta = $id_ta");
    $angkatan = mysqli_fetch_object($q);
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
            <li class="nav-item ">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Interface</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
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
                        <?php
                        $q = mysqli_query($koneksi,"SELECT * FROM tahun_ajaran WHERE id_ta = $id_ta");
                        $angkatan = mysqli_fetch_object($q);
                        ?>
                        <h1 class="h3 mb-0 text-gray-800">Tahun Angkatan <?=$angkatan->tahun_angkatan?></h1>
                        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                            data-bs-target="#program">Tambah Kelas
                        </button>
                    </div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui officiis totam amet architecto
                        repudiandae harum rerum minus! Reiciendis, voluptatibus magnam asperiores modi illo quaerat
                        minus fugiat enim necessitatibus nulla, obcaecati a nobis? Unde impedit iste, error
                        repellendus in, porro assumenda deleniti, mollitia rem ut odit? Explicabo qui quasi placeat
                        quod.</p>
                    <!-- end of Page Heading -->
                    <!-- tabel bidang dan program keahlian -->
                    <div class="row mt-5 mb-5">
                        <?php
                        $no = 0;
                        $query = mysqli_query($koneksi,"SELECT * FROM Kelas JOIN pegawai ON kelas.nip = pegawai.nip WHERE id_ta = $id_ta");
                        while ($kelas = mysqli_fetch_object($query)) {
                            $no++;
                        ?>
                        <div class="col-3">
                            <div class="card" style="width: 19rem;">
                                <img src="./img/kelas.png" class="card-img-top" alt="ilustrasi kelas">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold"><?=$kelas->kelas?></h5>
                                    <p class="card-text me-auto mt-2">Wali Kelas: <?=$kelas->nama?></p>
                                    <div class="d-flex mt-4">
                                        <a href="tablesPeserta.php" class="btn btn-primary  me-auto">Lihat Peserta
                                            didik</a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                            <ul class="dropdown-menu">
                                                <a href="#" data-bs-toggle="modal"
                                                    data-bs-target="#edit<?=$kelas->id_kelas?>">
                                                    <li class="dropdown-item">
                                                        edit
                                                    </li>
                                                </a>
                                                <a
                                                    href="./php/hapuskls.php?id_kelas=<?=$kelas->id_kelas?>&id_ta=<?=$kelas->id_ta?>">
                                                    <li class="dropdown-item">
                                                        Hapus
                                                    </li>
                                                </a>
                                            </ul>
                                        </div>
                                        <div class="modal fade" id="edit<?=$kelas->id_kelas?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kelas
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="./php/editkls.php?id_ta=<?=$angkatan->id_ta?>"
                                                        method="post">
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">ID Kelas:</label>
                                                                <input type="text" class="form-control mb-4" id="nama"
                                                                    placeholder="Masuk id" name="id_kelas"
                                                                    value="<?=$kelas->id_kelas?>" />
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="nama" class="form-label">Nama Kelas:</label>
                                                                <input type="text" class="form-control mb-4" id="kelas"
                                                                    placeholder="Masuk kan Nama Program keahlian"
                                                                    name="kelas" value="<?=$kelas->kelas?>" />
                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="agama" class="form-label">Wali
                                                                    Kelas:</label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example" name="nip"
                                                                    id="agama">
                                                                    <option selected>Wali Kelas</option>
                                                                    <?php
                                                                    $no = 0;
                                                                    $qu = mysqli_query($koneksi,"SELECT * FROM pegawai");
                                                                    while ($da = mysqli_fetch_object($qu)) {
                                                                        $no++;
                                                                    ?>
                                                                    <option value="<?=$da->nip?>"
                                                                        <?= $kelas->nip == $da->nip?'selected':''?>>
                                                                        <?= $da->nama?>
                                                                    </option>
                                                                    <?php
										                            }
										                            ?>
                                                                </select>
                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="agama" class="form-label">konsentrasi
                                                                    keahlian:</label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example" name="id_kk"
                                                                    id="agama">
                                                                    <option selected>konsentrasi keahlian</option>
                                                                    <?php
                                                                    $no = 0;
                                                                    $que = mysqli_query($koneksi,"SELECT * FROM konsentrasi_keahlian ORDER BY `konsentrasi_keahlian`.`konsentrasi_keahlian` ASC");
                                                                    while ($dat = mysqli_fetch_object($que)) {
                                                                        $no++;
                                                                    ?>
                                                                    <option value="<?=$dat->id_kk?>"
                                                                        <?= $kelas->id_kk == $dat->id_kk?'selected':''?>>
                                                                        <?= $dat->konsentrasi_keahlian ?>
                                                                    </option>
                                                                    <?php
										                            }
										                            ?>
                                                                </select>
                                                            </div>
                                                            <div class=" mb-3">
                                                                <label for="agama" class="form-label">Tahun
                                                                    Ajaran:</label>
                                                                <select class="form-select"
                                                                    aria-label="Default select example" name="id_ta"
                                                                    id="agama">
                                                                    <option selected>Tahun Ajaran</option>
                                                                    <?php
                                                                    $no = 0;
                                                                    $quer = mysqli_query($koneksi,"SELECT * FROM tahun_ajaran");
                                                                    while ($datas = mysqli_fetch_object($quer)) {
                                                                        $no++;
                                                                    ?>
                                                                    <option value="<?=$datas->id_ta?>"
                                                                        <?= $kelas->id_ta == $datas->id_ta?'selected':''?>>
                                                                        <?= $datas->tahun_angkatan ?></option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <!-- End of Main Content -->

                <!-- modal Program keahlian -->
                <div class="modal fade" id="program" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kelas</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="./php/tambahkls.php?id_ta=<?=$angkatan->id_ta?>" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">ID Kelas:</label>
                                        <input type="text" class="form-control mb-4" id="nama" placeholder="Masuk id"
                                            name="id_kelas" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Kelas:</label>
                                        <input type="text" class="form-control mb-4" id="kelas"
                                            placeholder="Masuk kan Nama Program keahlian" name="kelas" />
                                    </div>
                                    <div class=" mb-3">
                                        <label for="agama" class="form-label">Wali Kelas:</label>
                                        <select class="form-select" aria-label="Default select example" name="nip"
                                            id="agama">
                                            <option selected>Wali Kelas</option>
                                            <?php
                                            $no = 0;
                                            $query = mysqli_query($koneksi,"SELECT * FROM pegawai");
                                            while ($data = mysqli_fetch_object($query)) {
                                                $no++;
                                            ?>
                                            <option value="<?=$data->nip?>"><?= $data->nama ?></option>
                                            <?php
										}
										?>
                                        </select>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="agama" class="form-label">konsentrasi keahlian:</label>
                                        <select class="form-select" aria-label="Default select example" name="id_kk"
                                            id="agama">
                                            <option selected>konsentrasi keahlian</option>
                                            <?php
                                            $no = 0;
                                            $query = mysqli_query($koneksi,"SELECT * FROM konsentrasi_keahlian ORDER BY `konsentrasi_keahlian`.`konsentrasi_keahlian` ASC");
                                            while ($data = mysqli_fetch_object($query)) {
                                                $no++;
                                                ?>
                                            <option value="<?=$data->id_kk?>"><?= $data->konsentrasi_keahlian ?>
                                            </option>
                                            <?php
										}
										?>
                                        </select>
                                    </div>
                                    <div class=" mb-3">
                                        <label for="agama" class="form-label">Tahun Ajaran:</label>
                                        <select class="form-select" aria-label="Default select example" name="id_ta"
                                            id="agama">
                                            <option selected>Tahun Ajaran</option>
                                            <?php
                                            $no = 0;
                                            $query = mysqli_query($koneksi,"SELECT * FROM tahun_ajaran");
                                            while ($data = mysqli_fetch_object($query)) {
                                                $no++;
                                            ?>
                                            <option value="<?=$data->id_ta?>"><?= $data->tahun_angkatan ?></option>
                                            <?php
                                        }
                                        ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- modal Konsentrasi keahlian -->

                <!-- Footer -->
                <!-- <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Ngawi Tech 2022</span>
                        </div>
                    </div>
                </footer> -->
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