<?php
include "koneksi.php";
?>
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

        <div class="notifications-wrapper">
        </div>
    </nav>
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li>
                    <a href="#"> <strong> Muhammad Adam </strong></a>
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a>
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
                    <h1 class="page-head-line">Edit SubKriteria</h1>
                </div>
            </div>
            <?php
            $id_sub = $_GET['id_sub'];
            $result = mysqli_query($connect, "SELECT * FROM subkriteria WHERE id_sub='$id_sub'") or die(mysqli_error($connect));
            $dataku = mysqli_fetch_array($result);
            ?>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Form Edit SubKriteria
                    </div>
                    <div class="panel-body">
                        <form action="subkriteria_edit.php" method="post" name="form1">
                            <input type="hidden" name="id_sub" value="<?php echo $dataku['id_sub']; ?>">
                            <div class="form-group">
                                <label>Nama Kriteria</label>
                                <select name="id_kriteria" placeholder="Pilih Kriteria..." class="form-control">
                                    <option value='' selected>Pilih Kriteria...</option>
                                    <?php
                                    $query = "SELECT * FROM kriteria ORDER BY id_kriteria ASC";
                                    $hasil = mysqli_query($connect, $query);
                                    while ($data = mysqli_fetch_array($hasil)) {
                                        if ($dataku['id_kriteria'] == $data['id_kriteria']) {
                                            echo "<option value='$data[id_kriteria]' selected='selected'>".$data['nama_kriteria']."</option>";
                                        } else {
                                            echo "<option value='$data[id_kriteria]'>".$data['nama_kriteria']."</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" class="form-control" name="nama_sub" value="<?php echo $dataku['nama_sub']; ?>" placeholder="Nama SubKriteria" />
                            </div>
                            <div class="form-group">
                                <label>Nilai</label>
                                <input type="number" class="form-control" name="nilai" value="<?php echo $dataku['nilai']; ?>" placeholder="Nilai" />
                            </div>
                            <div class="form-group">
                                <label>Bobot</label>
                                <input type="text" class="form-control" name="keterangan" value="<?php echo $dataku['keterangan']; ?>" placeholder="Bobot" />
                            </div>
                            <tr>
                                <td></td>
                                <td><input type="submit" name="update" value="Update" class="btn btn-primary btn-sm"></td>
                                <td><a href="subkriteria.php" value="Cancel" class="btn btn-danger btn-sm">Cancel</a></td>
                            </tr>
                        </form>
                    </div>
                </div>
                <?php
                if (isset($_POST['update'])) {
                    $id_sub = $_POST['id_sub'];
                    $id = $_POST['id_kriteria'];
                    $ket = $_POST['nama_sub'];
                    $nilai = $_POST['nilai'];
                    $bobot = $_POST['keterangan'];

                    // Insert user data into table
                    $result = mysqli_query($connect, "UPDATE subkriteria SET id_kriteria='$id', nama_sub='$ket', nilai='$nilai', keterangan='$bobot' WHERE id_sub='$id_sub'") or die(mysqli_error($connect));
                    
                    // Redirect to subkriteria.php
                    echo "<script type='text/javascript'>
                            window.location.href='subkriteria.php';
                          </script>";
                }
                ?>
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
