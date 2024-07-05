<?php
include "koneksi.php";

// Check if form submitted, update form data in the `kriteria` table.
if (isset($_POST['update'])) {
    $id_normal = $_POST['id_normal'];
    $harga = $_POST['harga'];
    $performa = $_POST['performa'];
    $bahan_bakar = $_POST['bahan_bakar'];
    $kenyaman = $_POST['kenyaman'];
    $keamanan = $_POST['keamanan'];
    $desain = $_POST['desain'];
    
    // Update kriteria data in the table
    $result = mysqli_query($connect, "UPDATE normal SET bahan_bakar='$bahan_bakar', kenyaman='$kenyaman', desain='$desain', harga='$harga', performa='$performa' WHERE id_normal='$id_normal'");

    // Redirect to kriteria.php
    if ($result) {
        echo "<script type='text/javascript'>
                window.location.href='normalisasi.php';
              </script>";
    } else {
        echo "Error updating record: " . mysqli_error($connect);
    }
}
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
            <div class="notifications-wrapper"></div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li><a href="#"><strong>Kelompok Pengendali Layar</strong></a></li>
                    <li><a href="index.php"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                    <li><a href="alternatif.php"><i class="fa fa-venus"></i>Alternatif</a></li>
                    <li><a href="kriteria.php"><i class="fa fa-bolt"></i>Kriteria</a></li>
                    <li><a href="subkriteria.php"><i class="fa fa-code"></i>Sub Kriteria</a></li>
                    <li><a class="active-menu" href="normalisasi.php"><i class="fa fa-dashcube"></i>Normalisasi</a></li>
                    <li><a href="perhitungan.php"><i class="fa fa-dashcube"></i>Perhitungan</a></li>
                    <li><a href="kesimpulan.php"><i class="fa fa-dashcube"></i>Kesimpulan</a></li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Edit Kriteria</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Form Edit Kriteria</div>
                        <div class="panel-body">
                            <?php
                            $id_normal = $_GET['id_normal'];
                            $result = mysqli_query($connect, "SELECT * FROM normal WHERE id_normal='$id_normal'") or die(mysqli_error($connect));
                            $data = mysqli_fetch_array($result);
                            ?>
                            <form action="normalisasi_edit.php" method="post" name="form1">
                                <input type="hidden" name="id_normal" value="<?php echo $id_normal; ?>">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="text" class="form-control" name="harga" value="<?php echo $data['harga']; ?>" placeholder="harga" />
                                </div>
                                <div class="form-group">
                                    <label>Performa</label>
                                    <input type="text" class="form-control" name="performa" value="<?php echo $data['performa']; ?>" placeholder="performa" />
                                </div>
                                <div class="form-group">
                                    <label>Bahan Bakar</label>
                                    <input type="text" class="form-control" name="bahan_bakar" value="<?php echo $data['bahan_bakar']; ?>" placeholder="bahan_bakar" />
                                </div>
                                <div class="form-group">
                                    <label>Kenyamanan</label>
                                    <input type="text" class="form-control" name="kenyaman" value="<?php echo $data['kenyaman']; ?>" placeholder="kenyaman" />
                                </div>
                                <div class="form-group">
                                    <label>Keamanan</label>
                                    <input type="text" class="form-control" name="keamanan" value="<?php echo $data['keamanan']; ?>" placeholder="keamanan" />
                                </div>
                                <div class="form-group">
                                    <label>Desain</label>
                                    <input type="text" class="form-control" name="desain" value="<?php echo $data['desain']; ?>" placeholder="desain" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="update" value="Update" class="btn btn-primary btn-sm">
                                    <a href="normalisasi.php" class="btn btn-danger btn-sm">Cancel</a>
                                </div>
                            </form>
                        </div>
                        <!-- /. PAGE INNER  -->
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
