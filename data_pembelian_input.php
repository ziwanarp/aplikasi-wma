<?php
// error_reporting(0);
session_start();


include "kns.php";
extract($_POST);
if (isset($save)) {

    $data = mysqli_query($kns,"SELECT * FROM tb_produksi WHERE id = '$id'");
    $row = mysqli_fetch_row($data);
    $id_barang = $row[2];
    $kode_barang_pk = $row[3];

    $kode_barang = explode("_", $id_barang);

    $smp = mysqli_query($kns, "INSERT INTO tb_penjualan VALUES(null,'$tgl','$nama_pembeli','$id_barang','$kode_barang[0]',0,0,'$qty','$harga','2','$kode_barang_pk')");
    if ($smp) {
        $penjualan2 = mysqli_query($kns, "SELECT * FROM tb_stok_produksi");
        while ($penjualan3 = mysqli_fetch_array($penjualan2)) {
            if ($penjualan3['id_barang'] == $id_barang) {
                $total = $penjualan3['stock'] - $qty;
                mysqli_query($kns, "update tb_stok_produksi set stock = '$total' where id_barang ='$id_barang'");
            }
        }

        echo "<script>alert('Berhasil disimpan'); location.href='data_pembelian_barang.php';</script>";
    } else {
        echo "<script>alert('gagal disimpan'); location.href='data_pembelian_barang.php';</script>";
    }
}

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
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <h4 class="text-white card-title align-self-center col-md-12 col-12">SISTEM INFORMASI PERAMALAN PERSEDIAAN UD. RAJABAWANG</h4>
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Input Data Pembelian</h3>
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
                <!-- Row -->
                <div class="row">

                    <!-- Column -->
                    <div class="col-lg-12 col-xlg-9 col-md-7">
                        <div class="card">
                            <div class="card-block">
                                <form class="form-horizontal form-material" method="POST">
                                    <div class="form-group">
                                        <label class="col-md-4">Tanggal</label>
                                        <div class="col-md-3">
                                            <input type="date" class="form-control form-control-line" name="tgl" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Nama Pembeli</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control form-control-line" value="<?= $_SESSION['name'] ?>" name="nama_pembeli" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Kode Barang</label>
                                        <div class="col-md-3">
                                            <select class="form-control" name="id" id="id_barang" onclick="sendAjaxRequest()" style="width:250px;">
                                                <?php
                                                $x = mysqli_query($kns, "select * from tb_produksi");
                                                while ($y = mysqli_fetch_array($x)) {
                                                    echo "
                                                    <option value='$y[id]'>$y[nama_barang] ($y[kode_barang])</option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-4">Isi</label>
                                        <div class="col-md-3">
                                            <input type="number" step="0.01" class="form-control form-control-line" name="isi" id="isi" onkeyup='check()'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Banyaknya</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-line" name="banyaknya" id="banyaknya" onkeyup='check()'>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-md-4">Jumlah <small>( Kilogram )</small></label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-line" name="qty" id="qty">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Harga Satuan</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-line" name="harga" id="harga" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary" name="save">
                                                <span class="glyphicon glyphicon-edit"></span> Simpan </button>
                                            <a href="data_penjualan_barang.php" type="button" class="btn btn-danger">
                                                <span class="glyphicon glyphicon-remove-sign"></span> Batal </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    </div>
                <!-- Row -->
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
    <script>
            function sendAjaxRequest() {
        var id_barang = document.getElementById('id_barang').value;
        console.log(id_barang);
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'ajax.php?id=' + id_barang, true);

        xhr.onload = function() {
            if (xhr.status == 200) {
                document.getElementById('harga').value = xhr.responseText;
                console.log(xhr.responseText);
            } else {
                console.log(xhr.responseText);
            }
        };
        xhr.send();
    }
    </script>
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