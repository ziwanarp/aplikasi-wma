<?php
session_start();
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
    <!-- untuk datatable -->
    <link rel="stylesheet" type="text/css" href="datatable/media/css/jquery.dataTables.css">
    <script type="text/javascript" language="javascript" src="datatable/media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="datatable/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript">
        $(document).ready(function() {
            $('#tabelsiswa').DataTable();
        });
    </script>

</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
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

                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <h4 class="text-white card-title align-self-center col-md-12 col-12">SISTEM INFORMASI PERAMALAN PERSEDIAAN UD. RAJABAWANG</h4>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Kelola Data Penjualan</h3>

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
                                <div class="text-center">
                                    <h3>Data Penjualan Perhari</h3>
                                </div>
                                <div class="form-group">
                                    <a href="data_penjualan_input.php" class="btn waves-effect waves-light btn-primary">Tambah data</a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Tanggal</th>
                                                <th>Nama Pembeli</th>
                                                <th>Nama Barang</th>
                                                <th>Kode</th>
                                                <th>Isi</th>
                                                <th>Banyaknya</th>
                                                <th>Jumlah</th>
                                                <th>Harga Satuan</th>
                                                <th>Total Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        include "kns.php";
                                        $t = mysqli_query($kns, "select 
                                                  tb_penjualan.id_penjualan as id,
                                                  tb_penjualan.tgl_penjualan as tgl_pembeli,
                                                  tb_penjualan.nama_pembeli as nama_pembeli,
                                                  
                                                  tb_barang.nama_barang as nama_barang,
                                                  tb_penjualan.jml_penjualan as qty,
                                                  tb_penjualan.id_barang as id_barang,
                                                  tb_penjualan.kode_barang as kode_barang,
                                                  tb_penjualan.isi as isi,
                                                  tb_penjualan.banyaknya as banyaknya,
                                                  tb_penjualan.harga as harga,
                                                  tb_penjualan.status as status
                                                  
                                                  from tb_penjualan
                                                  INNER JOIN tb_barang ON tb_penjualan.id_barang=tb_barang.id_barang ORDER BY tgl_pembeli DESC") or die(mysqli_error());
                                        if (mysqli_num_rows($t) > 0) {
                                            while ($y = mysqli_fetch_array($t)) {
                                                $c = $y['qty'] * $y['harga'];
                                                if ($y['status'] == 9 || $y['status'] == 1) {
                                                    echo "<tr>
                                                          <td>$no</td>
                                                          <td>$y[tgl_pembeli]</td>
                                                          <td>$y[nama_pembeli]</td>
                                                          <td>$y[nama_barang]</td>
                                                          <td>$y[kode_barang]</td>
                                                          <td>$y[isi]</td>
                                                          <td>$y[banyaknya]</td>
                                                          <td>$y[qty]</td>
                                                          <td>Rp. " . number_format($y['harga']) . "</td>
                                                          <td>Rp. " . number_format($c) . "</td>
                                                          <td>
                                                            <a class=\"btn btn-sm btn-info\"href=edit_penjualan.php?id=$y[id]><span class=\"glyphicon glyphicon-pencil\"></span> Edit</a>
                                                            <a onclick=\"return confirm('Hapus data ?');\" class=\"btn btn-sm btn-danger\" href=hapus_penjualan.php?id=$y[id]><span class=\"glyphicon glyphicon-remove\"></span> Hapus</a>
                                                          </td>
                                                        </tr>";
                                                    $no += 1;
                                                }
                                            }
                                        }
                                        ?>

                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="form-group text-center">
                                    <h3>Data Penjualan Perbulan</h1>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>Bulan</th>
                                                <th>Kode Barang</th>
                                                <th>Jumlah</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <?php
                                        $no = 1;
                                        include "kns.php";
                                        $t = mysqli_query($kns, "SELECT 
                                        tb_penjualan.id_penjualan as id, 
                                        SUBSTR(tb_penjualan.tgl_penjualan,6,2) as bulan, 
                                        SUBSTR(tb_penjualan.tgl_penjualan, 1, 4) AS tahun, 
                                        tb_barang.nama_barang as nama_barang, 
                                        SUM(tb_penjualan.jml_penjualan) as qty, 
                                        SUM(tb_penjualan.isi) as isi, 
                                        tb_barang.id_barang as id_barang,
                                        tb_barang.kode_barang as kode_barang,
                                        SUM(tb_penjualan.banyaknya) as banyaknya, 
                                        tb_penjualan.harga as harga,
                                        tb_penjualan.status as status
                                        FROM tb_penjualan 
                                        INNER JOIN tb_barang ON tb_penjualan.id_barang=tb_barang.id_barang WHERE status NOT IN (0,2)
                                        GROUP BY kode_barang, bulan , tahun ORDER BY tahun, bulan") or die(mysqli_error($kns));
                                        if (mysqli_num_rows($t) > 0) {
                                            while ($y = mysqli_fetch_array($t)) {
                                                $c = $y['qty'] * $y['harga'];
                                                echo "<tr>
                                                          <td>$no</td>
                                                          <td>$y[bulan] - $y[tahun]</td>
                                                          <td>$y[kode_barang]</td>
                                                          <td>$y[qty]</td>
                                                          <td>Rp. " . number_format($c) . "</td>
                                                        </tr>";
                                                $no += 1;
                                            }
                                        }
                                        ?>

                                </table>
                            </div>
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