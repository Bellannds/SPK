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

            <div class="notifications-wrapper"></div>
        </nav>
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="#"> <strong>Kelompok Pengendali Layar</strong></a>
                    </li>
                    <li><a href="index.php"><i class="fa fa-dashboard "></i>Dashboard</a></li>
                    <li><a href="alternatif.php"><i class="fa fa-venus "></i>Alternatif</a></li>
                    <li><a href="kriteria.php"><i class="fa fa-bolt "></i>Kriteria</a></li>
                    <li><a href="subkriteria.php"><i class="fa fa-code "></i>Sub Kriteria</a></li>
                    <li><a href="normalisasi.php"><i class="fa fa-dashcube "></i>Normalisasi</a></li>
                    <li><a href="perhitungan.php"><i class="fa fa-dashcube "></i>Perhitungan</a></li>
                    <li><a class="active-menu" href="kesimpulan.php"><i class="fa fa-dashcube "></i>Kesimpulan</a></li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="page-wrapper-cls">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line"> Hasil Perhitungan</h1>
                    </div>
                </div>

                <div class="col-md-16">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div>
                                <tr>
                                    <th></th>
                                    <th>Bobot : </th>
                                    <th><?php echo "(" . $_POST['bobot_harga'] . ")"; ?></th>
                                    <th><?php echo "(" . $_POST['bobot_performa'] . ")"; ?></th>
                                    <th><?php echo "(" . $_POST['bobot_bahan_bakar'] . ")"; ?></th>
                                    <th><?php echo "(" . $_POST['bobot_desain'] . ")"; ?></th>
                                </tr>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="datatable table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>C1. Harga (juta)</th>
                                            <th>C2. Performa</th>
                                            <th>C3. Bahan Bakar</th>
                                            <th>C4. Desain</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nomor = 0;
                                        $hasil = mysqli_query($connect, "SELECT * FROM normal, alternatifhp WHERE normal.idhp = alternatifhp.idhp");
                                        while ($dataku = mysqli_fetch_array($hasil)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $nomor = $nomor + 1; ?></td>
                                                <td><?php echo $dataku['merk_hp']; ?></td>
                                                <td><?php echo $dataku['harga']; ?></td>
                                                <td><?php echo $dataku['performa']; ?></td>
                                                <td><?php echo $dataku['bahan_bakar']; ?></td>
                                                <td><?php echo $dataku['desain']; ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <?php
                    # Cari nilai maksimal dan minimal
                    $carimax = mysqli_query($connect, "SELECT max(harga) as max1, max(performa) as max2, max(bahan_bakar) as max3, max(desain) as max6 FROM normal");
                    $max = mysqli_fetch_array($carimax);

                    $carimin = mysqli_query($connect, "SELECT min(harga) as min1, min(performa) as min2, min(bahan_bakar) as min3, min(desain) as min6 FROM normal");
                    $min = mysqli_fetch_array($carimin);
                    ?>
                    <div class="col-md-16">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div>
                                    Normalisasi Data
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>C1. Harga</th>
                                                <th>C2. Performa</th>
                                                <th>C3. Bahan Bakar</th>
                                                <th>C4. Desain</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $nomor = 0;
                                            $hasil = mysqli_query($connect, "SELECT * FROM normal, alternatifhp WHERE normal.idhp = alternatifhp.idhp");
                                            while ($dataku = mysqli_fetch_array($hasil)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $nomor = $nomor + 1; ?></td>
                                                    <td><?php echo $dataku['merk_hp']; ?></td>
                                                    <td><?php echo round($min['min1'] / $dataku['harga'], 2); ?></td>
                                                    <td><?php echo round($dataku['performa'] / $max['max2'], 2); ?></td>
                                                    <td><?php echo round($dataku['bahan_bakar'] / $max['max3'], 2); ?></td>
                                                    <td><?php echo round($dataku['desain'] / $max['max6'], 2); ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                        # Fetch bobot from POST
                        $bobot_harga = $_POST['bobot_harga'];
                        $bobot_performa = $_POST['bobot_performa'];
                        $bobot_bahan_bakar = $_POST['bobot_bahan_bakar'];
                        $bobot_desain = $_POST['bobot_desain'];

                        # Fetch data alternatif yang dinormalisasi
                        $nomor = 0;
                        $hasil = mysqli_query($connect, "SELECT * FROM normal, alternatifhp WHERE normal.idhp = alternatifhp.idhp");
                        $hasil_wp = array();
                        while ($dataku = mysqli_fetch_array($hasil)) {
                            // Normalisasi
                            $normalized_harga = round($min['min1'] / $dataku['harga'], 2);
                            $normalized_performa = round($dataku['performa'] / $max['max2'], 2);
                            $normalized_bahan_bakar = round($dataku['bahan_bakar'] / $max['max3'], 2);
                            $normalized_desain = round($dataku['desain'] / $max['max6'], 2);

                            // Perhitungan WP
                            $hasil_akhir_wp = pow($dataku['harga'], -$bobot_harga) *
                                              pow($dataku['performa'], $bobot_performa) *
                                              pow($dataku['bahan_bakar'], $bobot_bahan_bakar) *
                                              pow($dataku['desain'], $bobot_desain);
                            $hasil_wp[] = $hasil_akhir_wp;
                        }

                        // Total nilai WP
                        $total_wp = array_sum($hasil_wp);

                        // Normalisasi nilai WP
                        $nomor = 0;
                        $hasil = mysqli_query($connect, "SELECT * FROM normal, alternatifhp WHERE normal.idhp = alternatifhp.idhp");
                        ?>
                        <div class="col-md-16">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div>
                                        Perhitungan SAW dan WP
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="datatable table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Hasil Akhir (SAW)</th>
                                                    <th>Hasil Akhir (WP)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($dataku = mysqli_fetch_array($hasil)) {
                                                    $normalized_harga = round($min['min1'] / $dataku['harga'], 2);
                                                    $normalized_performa = round($dataku['performa'] / $max['max2'], 2);
                                                    $normalized_bahan_bakar = round($dataku['bahan_bakar'] / $max['max3'], 2);
                                                    $normalized_desain = round($dataku['desain'] / $max['max6'], 2);

                                                    // Perhitungan SAW
                                                    $hasil_akhir_saw = ($normalized_harga * $bobot_harga) +
                                                        ($normalized_performa * $bobot_performa) +
                                                        ($normalized_bahan_bakar * $bobot_bahan_bakar) +
                                                        ($normalized_desain * $bobot_desain);

                                                    // Perhitungan WP
                                                    $hasil_akhir_wp = pow($dataku['harga'], -$bobot_harga) *
                                                    pow($dataku['performa'], $bobot_performa) *
                                                    pow($dataku['bahan_bakar'], $bobot_bahan_bakar) *
                                                    pow($dataku['desain'], $bobot_desain);
                                                    
                                                    $nilai_V = $hasil_akhir_wp / $total_wp;
                                                    
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $nomor = $nomor + 1; ?></td>
                                                        <td><?php echo $dataku['merk_hp']; ?></td>
                                                        <td><?php echo round($hasil_akhir_saw, 2); ?></td>
                                                        <td><?php echo round($nilai_V, 2); ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <footer>
                                <div class="footer">
                                    <div class="row">
                                        <div class="col-lg-12">&copy; 2024 by Kelompok Pengendali Layar</div>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery-1.11.1.js"></script>
        <script src="assets/js/bootstrap.js"></script>
    </div>

</body>
</html>