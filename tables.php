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
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider" />

            <!-- Heading -->
            <div class="sidebar-heading">Interface</div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="tables.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Jurusan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tablespgw.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pegawai</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Kelas</span>
                </a>
                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">tahun angkatan:</h6>
                        <?php
                            $agt = 0;
                            $q = mysqli_query($koneksi,"SELECT tahun_ajaran.tahun_angkatan FROM tahun_ajaran");
                            while ($angkatan = mysqli_fetch_object($q)) {
                            $agt++;
                            ?>
                        <a class="collapse-item" href="tablesSiswa.php">
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
                        <h1 class="h3 mb-0 text-gray-800">Table Jurusan</h1>
                    </div>
                    <!-- end of Page Heading -->
                    <!-- tabel bidang dan program keahlian -->
                    <div class="row mt-5 mb-5">
                        <div class="col-6">
                            <div class="card shadow-lg accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <div class="card-header">
                                        <h1 class="accordion-header" id="headingOne">
                                            <button class="accordion-button bg-light h4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne">Bidang
                                                Keahlian</button>
                                        </h1>
                                    </div>
                                    <div id="collapseOne" class="accordion-collapse collapse show"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-primary mb-4 h4"
                                                    data-bs-toggle="modal" data-bs-target="#bidang">Tambah Bidang
                                                    Keahlian
                                                </button>

                                                <table id="example2" class="table table-striped" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>ID</th>
                                                            <th>bidang keahlian</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 0;
                                                        $query = mysqli_query($koneksi,"SELECT * FROM bidang_keahlian");
                                                        while ($data = mysqli_fetch_object($query)) {
                                                            $no++;
                                                        ?>
                                                        <tr>
                                                            <td><?= $no ?></td>
                                                            <td><?= $data->id_bk ?></td>
                                                            <td><?= $data->bidang_keahlian ?></td>
                                                            <td>
                                                                <!-- Example single danger button -->
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-bs-toggle="dropdown"
                                                                        aria-expanded="false">Action</button>
                                                                    <ul class="dropdown-menu">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#editbidang<?=$data->id_bk?>">
                                                                            <li class="dropdown-item">
                                                                                edit
                                                                            </li>
                                                                        </a>
                                                                        <a
                                                                            href="./php/hapus.php?id_bk=<?=$data->id_bk?>">
                                                                            <li class="dropdown-item">
                                                                                Hapus
                                                                            </li>
                                                                        </a>

                                                                    </ul>
                                                                </div>
                                                                <!-- modal bidang keahlian -->
                                                                <div class="modal fade" id="bidang" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="exampleModalLabel">Tambah bidang
                                                                                    keahlian</h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <form action="./php/tambah.php"
                                                                                method="post">
                                                                                <div class="modal-body">
                                                                                    <div class="mb-3">
                                                                                        <label for="nama"
                                                                                            class="form-label">ID bidang
                                                                                            keahlian:</label>
                                                                                        <input type="text"
                                                                                            class="form-control mb-4"
                                                                                            id="nama"
                                                                                            placeholder="Masuk id"
                                                                                            name="id_bk" />
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="nama"
                                                                                            class="form-label">nama
                                                                                            bidang keahlian:</label>
                                                                                        <input type="text"
                                                                                            class="form-control mb-4"
                                                                                            id="nama"
                                                                                            placeholder="Masuk kan Nama bidang keahlian"
                                                                                            name="bidang_keahlian" />
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
                                                                <!-- modal edit bidang keahlian -->
                                                                <div class="modal fade" id="editbidang<?=$data->id_bk?>"
                                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="exampleModalLabel">edit bidang
                                                                                    keahlian</h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <form action="./php/edit.php" method="post">
                                                                                <div class="modal-body">
                                                                                    <div class="mb-3">
                                                                                        <label for="nama"
                                                                                            class="form-label">ID bidang
                                                                                            keahlian:</label>
                                                                                        <input type="text"
                                                                                            class="form-control mb-4"
                                                                                            id="nama"
                                                                                            placeholder="Masuk id"
                                                                                            name="id_bk"
                                                                                            value="<?=$data->id_bk?>" />
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="nama"
                                                                                            class="form-label">nama
                                                                                            bidang keahlian:</label>
                                                                                        <input type="text"
                                                                                            class="form-control mb-4"
                                                                                            id="nama"
                                                                                            placeholder="Masuk kan Nama bidang keahlian"
                                                                                            name="bidang_keahlian"
                                                                                            value="<?=$data->bidang_keahlian?>" />
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
                        <div class="col-6">
                            <div class="card shadow-lg accordion" id="accordionExample2">
                                <div class="accordion-item">
                                    <div class="card-header">
                                        <h1 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button bg-light h4" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                                aria-expanded="true" aria-controls="collapseTwo">Program
                                                Keahlian</button>
                                        </h1>
                                    </div>
                                    <div id="collapseTwo" class="accordion-collapse collapse show"
                                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample2">
                                        <div class="accordion-body">
                                            <div class="card-body">
                                                <button type="button" class="btn btn-primary mb-4 h4"
                                                    data-bs-toggle="modal" data-bs-target="#program">Tambah Program
                                                    Keahlian
                                                </button>
                                                <table id="example3" class="table table-striped" style="width: 100%">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>ID</th>
                                                            <th>Program keahlian</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 0;
                                                        $query = mysqli_query($koneksi,"SELECT program_keahlian.id_pk, program_keahlian.program_keahlian, program_keahlian.id_bk, bidang_keahlian.id_bk FROM program_keahlian JOIN bidang_keahlian ON program_keahlian.id_bk = bidang_keahlian.id_bk");
                                                        while ($data = mysqli_fetch_object($query)) {
                                                        $no++;
                                                        ?>
                                                        <tr>
                                                            <td><?= $no ?></td>
                                                            <td><?= $data->id_pk ?></td>
                                                            <td><?= $data->program_keahlian ?></td>
                                                            <td>
                                                                <!-- Example single danger button -->
                                                                <div class="btn-group">
                                                                    <button type="button"
                                                                        class="btn btn-primary dropdown-toggle"
                                                                        data-bs-toggle="dropdown"
                                                                        aria-expanded="false">Action</button>
                                                                    <ul class="dropdown-menu">
                                                                        <a href="#" data-bs-toggle="modal"
                                                                            data-bs-target="#editProgram<?=$data->id_pk?>">
                                                                            <li class="dropdown-item">
                                                                                edit
                                                                            </li>
                                                                        </a>
                                                                        <a
                                                                            href="./php/hapus.php?id_pk=<?=$data->id_pk?>">
                                                                            <li class="dropdown-item">
                                                                                Hapus
                                                                            </li>
                                                                        </a>

                                                                    </ul>
                                                                </div>
                                                                <!-- modal Program keahlian -->
                                                                <div class="modal fade"
                                                                    id="editProgram<?=$data->id_pk?>" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="exampleModalLabel">Tambah
                                                                                    program keahlian</h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <form action="./php/editpk.php"
                                                                                method="post">
                                                                                <div class="modal-body">
                                                                                    <div class="mb-3">
                                                                                        <label for="nama"
                                                                                            class="form-label">ID
                                                                                            Program keahlian:</label>
                                                                                        <input type="text"
                                                                                            class="form-control mb-4"
                                                                                            id="nama"
                                                                                            placeholder="Masuk id"
                                                                                            name="id_pk"
                                                                                            value="<?=$data->id_pk?>" />
                                                                                    </div>
                                                                                    <div class="mb-3">
                                                                                        <label for="nama"
                                                                                            class="form-label">nama
                                                                                            Program keahlian:</label>
                                                                                        <input type="text"
                                                                                            class="form-control mb-4"
                                                                                            id="nama"
                                                                                            placeholder="Masuk kan Nama Program keahlian"
                                                                                            name="program_keahlian"
                                                                                            value="<?=$data->program_keahlian?>" />
                                                                                    </div>
                                                                                    <div class=" mb-3">
                                                                                        <label for="agama"
                                                                                            class="form-label">bidang
                                                                                            keahlian:</label>
                                                                                        <select class="form-select"
                                                                                            aria-label="Default select example"
                                                                                            name="id_bk" id="agama">
                                                                                            <option selected>bidang
                                                                                                keahlian</option>
                                                                                            <?php
                                                                                            $n = 0;
                                                                                            $querypk = mysqli_query($koneksi,"SELECT * FROM bidang_keahlian");
                                                                                            while ($datapk = mysqli_fetch_object($querypk)) {
                                                                                            $n++;
                                                                                            ?>
                                                                                            <option
                                                                                                <?= $data->id_bk == $datapk->id_bk ? "selected" : "" ?>
                                                                                                value="<?=$datapk->id_bk?>">
                                                                                                <?= $datapk->bidang_keahlian ?>
                                                                                            </option>
                                                                                            <?php
										                                                    }
										                                                    ?>
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
                    <!-- table bidang,program,and konsentrasi -->
                    <div class="row mb-5 mt-5">
                        <div class="col-12">
                            <div class="card shadow-lg" style="width: 100%">
                                <div class="card-header">
                                    <h4 class="pt-3 text-primary ">konsentrasi keahlian</h4>
                                </div>
                                <div class="card-body">
                                    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal"
                                        data-bs-target="#konsentrasi">Tambah Konsentrasi
                                        Keahlian
                                    </button>
                                    <table id="example" class="table table-striped" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>bidang keahlian</th>
                                                <th>Program keahlian</th>
                                                <th>konsentrasi keahlian</th>
                                                <th>Tahun Program</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 0;
                                            $query = mysqli_query($koneksi,"SELECT konsentrasi_keahlian.id_pk, konsentrasi_keahlian.id_kk, bidang_keahlian.bidang_keahlian, program_keahlian.program_keahlian, program_keahlian.id_pk,konsentrasi_keahlian.konsentrasi_keahlian, konsentrasi_keahlian.tahun_program FROM bidang_keahlian INNER JOIN program_keahlian ON bidang_keahlian.id_bk = program_keahlian.id_bk JOIN konsentrasi_keahlian ON program_keahlian.id_pk = konsentrasi_keahlian.id_pk ORDER BY `konsentrasi_keahlian`.`id_kk` ASC");
                                            while ($data = mysqli_fetch_object($query)) {
                                                $no++;
                                            ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $data->id_kk ?></td>
                                                <td><?= $data->bidang_keahlian ?></td>
                                                <td><?= $data->program_keahlian ?></td>
                                                <td><?= $data->konsentrasi_keahlian ?></td>
                                                <td><?= $data->tahun_program ?> Tahun</td>
                                                <td>
                                                    <!-- Example single danger button -->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary dropdown-toggle"
                                                            data-bs-toggle="dropdown"
                                                            aria-expanded="false">Action</button>
                                                        <ul class="dropdown-menu">
                                                            <a href="#" data-bs-toggle="modal"
                                                                data-bs-target="#editKonsentrasi<?=$data->id_kk?>">
                                                                <li class="dropdown-item">
                                                                    edit
                                                                </li>
                                                            </a>
                                                            <a href="./php/hapus.php?id_kk=<?=$data->id_kk?>">
                                                                <li class="dropdown-item">
                                                                    Hapus
                                                                </li>
                                                            </a>

                                                        </ul>
                                                    </div>
                                                    <!-- modal Konsentrasi keahlian -->
                                                    <div class="modal fade" id="editKonsentrasi<?=$data->id_kk?>"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        edit konsentrasi keahlian</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <form action="./php/editkk.php" method="post">
                                                                    <div class="modal-body">
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="form-label">ID
                                                                                Konsentrasi Keahlian:</label>
                                                                            <input type="text" class="form-control mb-4"
                                                                                id="nama" placeholder="Masuk id"
                                                                                name="id_kk"
                                                                                value="<?=$data->id_kk?>" />
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <label for="agama"
                                                                                class="form-label">Program
                                                                                Keahlian:</label>
                                                                            <select class="form-select"
                                                                                aria-label="Default select example"
                                                                                name="id_pk" id="agama">
                                                                                <option selected>Program keahlian
                                                                                </option>
                                                                                <?php
                                                                                $o = 0;
                                                                                $querykk = mysqli_query($koneksi,"SELECT * FROM program_keahlian");
                                                                                while ($datakk = mysqli_fetch_object($querykk)) {
                                                                                $o++;
                                                                                ?>
                                                                                <option
                                                                                    <?= $data->id_pk == $datakk->id_pk ? "selected" : "" ?>
                                                                                    value="<?=$datakk->id_pk?>">
                                                                                    <?= $datakk->program_keahlian ?>
                                                                                </option>
                                                                                <?php
										                                        }
										                                        ?>
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="nama" class="form-label">Nama
                                                                                Konsentrasi Keahlian:</label>
                                                                            <input type="text" class="form-control mb-4"
                                                                                id="nama"
                                                                                placeholder="Masuk kan Nama konsentrasi keahlian"
                                                                                name="konsentrasi_keahlian"
                                                                                value="<?=$data->konsentrasi_keahlian?>" />
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <label for="agama" class="form-label">Tahun
                                                                                Program:</label>
                                                                            <select class="form-select"
                                                                                aria-label="Default select example"
                                                                                name="tahun_program" id="agama">
                                                                                <option selected>Tahun Program</option>
                                                                                <option value="3"
                                                                                    <?= $data->tahun_program == "3" ? "selected" : "" ?>>
                                                                                    3 tahun</option>
                                                                                <option value="4"
                                                                                    <?= $data->tahun_program == "4" ? "selected" : "" ?>>
                                                                                    4 tahun</option>
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