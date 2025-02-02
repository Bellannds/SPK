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
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="#"> <strong>Kelompok Pengendali Layar</strong></a>
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
                        <a href="subkriteria.php"><i class="fa fa-code "></i>Sub Kriteria</a>
                    </li>
                    <li>
                        <a class="active-menu" href="normalisasi.php"><i class="fa fa-dashcube "></i>Normalisasi</a>
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
                        <h1 class="page-head-line">Tambah Normalisasi</h1>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Tambah Normalisasi
                        </div>
                        <div class="panel-body">
                            <form action="normalisasi_tambah.php" method="post" name="form1">
                                <table width="25%" border="0">
                                    <div class="form-group">
                                        <label>Merek Sepeda Motor (*masukkan id sepeda motor)</label>
                                        <div>
                                            <input type="text" name="idhp" required class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <div>
                                            <select name="harga" class="form-control">
                                                <option>Pilih Harga...</option>
                                                <?php
                                                $query = "SELECT * FROM subkriteria WHERE id_kriteria='1' ORDER BY id_sub asc";
                                                $hasil = mysqli_query($connect, $query);
                                                while ($data = mysqli_fetch_array($hasil)) {
                                                    echo "<option value='" . $data['nilai'] . "'>" . $data['nama_sub'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Performa</label>
                                        <div>
                                            <select name="performa" class="form-control">
                                                <option>Pilih Performa...</option>
                                                <?php
                                                $query = "SELECT * FROM subkriteria WHERE id_kriteria='2' ORDER BY id_sub asc";
                                                $hasil = mysqli_query($connect, $query);
                                                while ($data = mysqli_fetch_array($hasil)) {
                                                    echo "<option value='" . $data['nilai'] . "'>" . $data['nama_sub'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Bahan Bakar</label>
                                        <div>
                                            <select name="bahan_bakar" class="form-control">
                                                <option>Pilih Bahan Bakar...</option>
                                                <?php
                                                $query = "SELECT * FROM subkriteria WHERE id_kriteria='3' ORDER BY id_sub asc";
                                                $hasil = mysqli_query($connect, $query);
                                                while ($data = mysqli_fetch_array($hasil)) {
                                                    echo "<option value='" . $data['nilai'] . "'>" . $data['nama_sub'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Desain</label>
                                        <div>
                                            <select name="desain" class="form-control">
                                                <option>Pilih Desain...</option>
                                                <?php
                                                $query = "SELECT * FROM subkriteria WHERE id_kriteria='6' ORDER BY id_sub asc";
                                                $hasil = mysqli_query($connect, $query);
                                                while ($data = mysqli_fetch_array($hasil)) {
                                                    echo "<option value='" . $data['nilai'] . "'>" . $data['nama_sub'] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <tr>
                                        <td><input type="submit" name="Submit" value="Add" class="btn btn-primary btn-sm"></td>
                                        <td><input type="button" name="kembali" value="Kembali" onclick="javascript:history.back()" class="btn btn-sm"></td>
                                    </tr>
                                </table>
                            </form>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    var ac_config = {
                                        source: "alternatif_cari.php",
                                        select: function(event, ui) {
                                            $("#merk_hp").val(ui.item.merk_hp);
                                            $("#idhp").val(ui.item.idhp);
                                        },
                                        minLength: 1
                                    };
                                    $("#merk_hp").autocomplete(ac_config);
                                });
                            </script>
                        </div>
                        <?php

                        // Check If form submitted, insert form data into users table.
                        if (isset($_POST['Submit'])) {
                            $idhp = $_POST['idhp'];
                            $harga = $_POST['harga'];
                            $performa = $_POST['performa'];
                            $bahan_bakar = $_POST['bahan_bakar'];
                            $kenyaman = $_POST['kenyaman'];
                            $keamanan = $_POST['keamanan'];
                            $desain = $_POST['desain'];

                            // include database connection file
                            include_once("koneksi.php");

                            // Insert user data into table
                            $result = mysqli_query($connect, "INSERT INTO normal VALUES(' ','$idhp','$harga','$performa','$bahan_bakar','$kenyaman','$keamanan', '$desain')") or die(mysqli_error($connect));

                            // Show message when user added
                            echo "Data added successfully. <a href='normalisasi.php'>View Data</a>";
                        }
                        ?>
                        <!-- /. PAGE INNER  -->
                    </div>
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