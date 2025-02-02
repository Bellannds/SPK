<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Pendukung Keputusan SAW dan WP</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">MOTORCYCLE CHOICER</a>
        </div>
        <div class="notifications-wrapper"></div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a href="#"><strong>Kelompok Pengendali Layar</strong></a>
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-dashboard "></i>Homepage</a>
                </li>
                <li>
                    <a href="alternatif.php"><i class="fa fa-venus "></i>Alternatif</a>
                </li>
                <li>
                    <a href="kriteria.php"><i class="fa fa-bolt "></i>Kriteria</a>
                </li>
                <li>
                    <a class="active-menu" href="subkriteria.php"><i class="fa fa-code "></i>Sub Kriteria</a>
                </li>
                <li>
                    <a href="normalisasi.php"><i class="fa fa-dashcube "></i>Normalisasi</a>
                </li>
                <li>
                    <a href="perhitungan.php"><i class="fa fa-dashcube "></i>Perhitungan</a>
                </li>
                <li>
                    <a href="kesimpulan.php"><i class="fa fa-dashcube "></i>Kesimpulan</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="page-wrapper-cls">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">SubKriteria</h1>
                </div>
            </div>
            <!-- /. PAGE INNER  -->
            <div class="row">
                <div class="col-md-16">
                    <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tabel SubKriteria
                            <a href="subkriteria_tambah.php"><input type="submit" value="Tambah" class="btn btn-primary btn-sm"></a>
                            <?php
                            include "koneksi.php";
                            $id_sub = @$_GET['id_sub'];
                            $aksi = @$_GET['aksi'];
                            if (($aksi <> "") and ($id_sub <> "")) {
                                mysqli_query($connect, "DELETE FROM subkriteria WHERE id_sub='$id_sub'") or die(mysqli_error($connect));
                                echo "<script type='text/javascript'>
                                    window.location.href='subkriteria.php';
                                    </script>";
                            }
                            ?>
                        </div>
                        <div class="panel-body">
                            <div class="datatable table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kriteria</th>
                                            <th>Keterangan</th>
                                            <th>Nilai</th>
                                            <th>Bobot</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 0;
                                        $result = mysqli_query($connect, "SELECT * FROM subkriteria, kriteria WHERE subkriteria.id_kriteria=kriteria.id_kriteria ORDER BY subkriteria.id_sub ASC") or die(mysqli_error($connect));
                                        while ($data = mysqli_fetch_array($result)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $nomor = $nomor + 1; ?></td>
                                                <td><?php echo $data['nama_kriteria']; ?></td>
                                                <td><?php echo $data['nama_sub']; ?></td>
                                                <td><?php echo $data['nilai']; ?></td>
                                                <td><?php echo $data['keterangan']; ?></td>
                                                <td>
                                                    <a href="subkriteria_edit.php?id_sub=<?php echo $data['id_sub']; ?>" title="Edit"><i class='fa fa-edit' title="Edit"></i>Edit</a>
                                                    <a href="subkriteria_delete.php?id_sub=<?php echo $data['id_sub']; ?>"><i class='glyphicon glyphicon-ban-circle' title="Delete"></i>Delete</a>
                                                </td>
                                            </tr>
                                        <?php }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End  Kitchen Sink -->
            </div>
        </div>
    </div>
</div>
<footer>
    &copy; 2024 SPK | By : <a href="#" target="_blank">Kelompok Pengendali Layar</a>
</footer>
<script src="assets/js/jquery-1.11.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/jquery.metisMenu.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>
