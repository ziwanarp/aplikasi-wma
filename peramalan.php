<?php
session_start();

include "kns.php";
$koneksi = $kns;

$querysum = "SELECT SUM(jml_penjualan) FROM tb_penjualan";
$querytampil = "SELECT SUM(jml_penjualan), SUBSTR(tgl_penjualan, 6, 2) AS bulan, SUBSTR(tgl_penjualan, 1, 4) AS tahun FROM tb_penjualan GROUP BY bulan , tahun ORDER BY tahun, bulan;";



$n_alpha;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon1.png">
    <title>UD. RAJABAWANG</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div> -->
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="admin.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->

                            <!-- Light Logo icon -->
                            <img src="assets/images/logo1.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>

                            <!-- Light Logo text -->
                            <img src="assets/images/text1.png?v=1" class="light-logo" alt="homepage" /></span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->

                        <h4 class="text-white card-title align-self-center col-md-12 col-12">SISTEM INFORMASI PERAMALAN PERSEDIAAN
                            UD. RAJABAWANG</h4>

                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->

                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <?php include 'navbar.php'; ?>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->


        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Perhitungan Peramalan Penjualan</h3>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <a href="logout.php" class="btn waves-effect waves-light btn-danger pull-right">Logout</a>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-block">
                                <a class="btn btn-success" href="peramalan.php">Peramalan Penjualan</a>
                                <a class="btn btn-warning" href="peramalan_produksi.php">Peramalan Produksi</a>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-block">

                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bulan/Tahun</th>
                                            <th>Data Aktual</th>
                                            <th>Data Perkiraan</th>
                                            <th>Error</th>
                                            <th>MAD <small>(Rata - rata penyimpangan absolut)</small></th>
                                            <th>MSE <small> (Rata - rata kuadrat kesalahan) </small></th>
                                            <th>MAPE <small>(Rata-rata persentase kesalahan)</small></th>
                                        </tr>
                                    </thead>



                                    <tbody>
                                        <?php
                                        //untuk menentukan nilai peramalan pertama
                                        $resultquery = mysqli_query($koneksi, $querysum);
                                        $hasilsum = mysqli_fetch_row($resultquery);

                                        $resultquery = mysqli_query($koneksi, $querytampil);

                                        $d_perkiraan = "";
                                        $count = mysqli_num_rows($resultquery);
                                        $loop = 0;
                                        $sum_abs_err = 0;
                                        $sum_abs_err2 = 0;
                                        $sum_abs_err_percent = 0;
                                        $hitung = 0;
                                        $data1 = 0;
                                        $data2 = 0;
                                        $data3 = 0;
                                        $n_alpha = 2 / ($count + 1);


                                        while ($row = mysqli_fetch_row($resultquery)) {
                                            // masukan 3 data pertama ke dalam array
                                            if ($data1 == 0) {
                                                $data1 = $row[0];

                                                if ($data2 != 0 && $data3 != 0) {
                                                    $d3 = $data3 * 2;
                                                    $d2 = $data2;
                                                    $d1 = $data1 * 3;

                                                    $perkiraan_bulan = ($d1 + $d2 + $d3) / 6;

                                                    $data2 = 0;
                                                }
                                            } else if ($data2 == 0) {
                                                $data2 = $row[0];

                                                if ($data1 != 0 && $data3 != 0) {
                                                    $d3 = $data3;
                                                    $d2 = $data2 * 3;
                                                    $d1 = $data1 * 2;

                                                    $perkiraan_bulan = ($d1 + $d2 + $d3) / 6;

                                                    $data3 = 0;
                                                }
                                            } else if ($data3 == 0) {
                                                $data3 = $row[0];

                                                $d3 = $data3 * 3;
                                                $d2 = $data2 * 2;
                                                $d1 = $data1;

                                                $perkiraan_bulan = ($d1 + $d2 + $d3) / 6;

                                                $data1 = 0;
                                            }

                                            //inisiasi data perkiraan pertama
                                            if ($d_perkiraan === "") {
                                                $d_perkiraan = $hasilsum[0] / $count;
                                            } else {
                                                $d_perkiraan = $h_perkiraan;
                                            }

                                            $array_perkiraan[] = $d_perkiraan;

                                            //rumus error
                                            $error = $row[0] - $d_perkiraan;


                                            //rumus absolute error
                                            $abs_err = abs($error);
                                            $sum_abs_err = $sum_abs_err + $abs_err;

                                            //rumus absolute error pangkat 2
                                            $abs_err2 = pow($error, 2);
                                            $sum_abs_err2 = $sum_abs_err2 + $abs_err2;

                                            //rumus absolute error %
                                            $abs_err_percent = abs((($data_aktual - $d_perkiraan) / $data_aktual) * 100 / $count);
                                            $sum_abs_err_percent = $sum_abs_err_percent + $abs_err_percent;

                                            if ($row[1] == '01') {
                                                $row[1] = "Januari";
                                            } else if ($row[1] == '02') {
                                                $row[1] = "Pebruari";
                                            } else if ($row[1] == '03') {
                                                $row[1] = "Maret";
                                            } else if ($row[1] == '04') {
                                                $row[1] = "April";
                                            } else if ($row[1] == '05') {
                                                $row[1] = "Mei";
                                            } else if ($row[1] == '06') {
                                                $row[1] = "Juni";
                                            } else if ($row[1] == '07') {
                                                $row[1] = "Juli";
                                            } else if ($row[1] == '08') {
                                                $row[1] = "Agustus";
                                            } else if ($row[1] == '09') {
                                                $row[1] = "September";
                                            } else if ($row[1] == '10') {
                                                $row[1] = "Oktober";
                                            } else if ($row[1] == '11') {
                                                $row[1] = "November";
                                            } else if ($row[1] == '12') {
                                                $row[1] = "Desember";
                                            } else {
                                                echo "Bulan Tidak Ada";
                                            }

                                            echo "<tr>";
                                            $no = $loop + 1;
                                            echo "<td>" . $no . "</td>
								<td>" . $row[1] . " " . $row[2] . "</td>
								<td>" . number_format($row[0]) . "</td>";

                                            if ($hitung < 3) {
                                                echo "<td>-</td>";
                                                echo "<td>-</td>";
                                                echo "<td>-</td>";
                                                echo "<td>-</td>";
                                                echo "<td>-</td>";
                                            } else {
                                                echo "<td>" . number_format(round($perkiraan_bulan)) . "</td>
									<td>" . number_format(round($error)) . "</td>
									<td>" . number_format(round($abs_err)) . "</td>
									<td>" . number_format(round($abs_err2)) . "</td>
									<td>" . number_format(round($abs_err_percent)) . "%</td>";
                                            }
                                            echo "</tr>";

                                            // if (isset($perkiraan_bulan)) {
                                            //     $perkiraan_bulan_next = $perkiraan_bulan;
                                            // }
                                            // if (isset($error)) {
                                            //     $error_next = $error;
                                            // }
                                            // if (isset($abs_err)) {
                                            //     $abs_err_next = $abs_err;
                                            // }
                                            // if (isset($abs_err2)) {
                                            //     $abs_err_next2 = $abs_err;
                                            // }
                                            // if (isset($abs_err_percent)) {
                                            //     $abs_err_percent_next = $abs_err_percent;
                                            // }


                                            //rumus single exponential smoothing
                                            $h_perkiraan = $d_perkiraan + $n_alpha * ($row[0] - $d_perkiraan);

                                            //jika data sudah ditampilkan semua, lakukan peramalan untuk bulan berikutnya
                                            $hitung += 1;
                                            $loop = $loop + 1;
                                            if ($loop == $count) {
                                                echo "</div>";
                                                $d_aktual_next = $row[0];
                                                $d_perkiraan_next = $d_perkiraan;
                                                $d_ft = $d_perkiraan_next + $n_alpha * ($d_aktual_next - $d_perkiraan_next);

                                                //rumus MAPE
                                                $rata_abs_error_percent = $sum_abs_err_percent / $count;

                                                //rumus rata2 abs_err MAD
                                                $rataabs_err = $sum_abs_err / $count;

                                                //rumus rata2 abs_err2 MSD
                                                $rataabs_err2 = $sum_abs_err2 / $count;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                            <div class="table-responsive">
                                <table class="table">


                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer" align="center">
            © Copyright Efan Febriana 2023
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
</body>

</html>