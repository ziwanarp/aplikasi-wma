<?php
// error_reporting(0);
session_start();


include "kns.php";
extract($_POST);
if (isset($save)) {

    // cek duplikasi data barang
    $data = mysqli_query($kns,"SELECT * FROM tb_produksi WHERE nama_barang = '$nama_barang' AND id_barang = '$id_barang' AND tgl_produksi = $tgl_produksi ");
    $data = mysqli_fetch_row($data);
    
    if($data != null || $data != false) {
        // data[7] = jumlah
        $data[7] += $jumlah;
        
        $smp = mysqli_query($kns,"UPDATE tb_produksi SET jumlah = '$data[7]' WHERE nama_barang = '$nama_barang' AND id_barang = '$id_barang'");

        // update stock di tb_stok_produksi
        $stok = mysqli_query($kns,"SELECT stock FROM tb_stok_produksi WHERE nama_barang = '$nama_barang' AND id_barang = '$id_barang'");
        $stok = mysqli_fetch_row($stok);
        $stok[0] += $jumlah;

        mysqli_query($kns,"UPDATE tb_stok_produksi SET stock ='$stok[0]' WHERE nama_barang = '$nama_barang' AND id_barang = '$id_barang'");
    } else {
        $data = mysqli_query($kns,"SELECT * FROM tb_produksi ORDER BY id DESC");
        $data = mysqli_fetch_array($data);
        if($data == null){
            $kode_barang = 'PRD_1';
        }else {
            $kode_barang = explode('_',$data[3]);
            $kode_barang = "PRD_".($kode_barang[1]+1);
        }
        $smp = mysqli_query($kns, "INSERT INTO tb_produksi VALUES(null,'$tgl_produksi','$id_barang','$kode_barang','$nama_barang',0,0,'$jumlah', $harga_jual)");

        // insert tabel stok produksi
        mysqli_query($kns,"INSERT INTO tb_stok_produksi VALUES (null,'$kode_barang','$id_barang','$nama_barang','$jumlah')");
    }
    
    

    if ($smp) {
        $penjualan2 = mysqli_query($kns, "SELECT
                                                     tb_stok.id_stok as idstok, 
                                                     tb_barang.id_barang as id, 
                                                     
                                                     tb_stok.stok_sekarang as stok
                                                     FROM tb_stok
                                                     INNER JOIN tb_barang on tb_stok.id_barang = tb_barang.id_barang");
        while ($penjualan3 = mysqli_fetch_array($penjualan2)) {
            if ($penjualan3['id'] == $id_barang) {
                $stok = $penjualan3['stok'];
                $total = $penjualan3['stok'] - $jumlah;
                $idstok = $penjualan3['idstok'];
                mysqli_query($kns, "insert into tb_persediaan values('','$tgl_produksi','$id_barang','$idstok','$jumlah','$stok')");
                mysqli_query($kns, "update tb_stok set stok_sekarang = '$total' where id_barang ='$id_barang'");
            }
        }

        echo "<script>alert('Berhasil disimpan'); location.href='data_barang_produksi.php';</script>";
    } else {
        echo "<script>alert('gagal disimpan'); location.href='data_barang_produksi.php';</script>";
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Input Data Produksi</h3>
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
                                        <label class="col-md-4">Tanggal Produksi</label>
                                        <div class="col-md-3">
                                            <input type="date" class="form-control form-control-line" name="tgl_produksi" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Nama Bahan Baku</label>
                                        <div class="col-md-3">
                                            <select class="form-control" name="id_barang" style="width:250px;">
                                                <?php
                                                $x = mysqli_query($kns, "SELECT nama_supplier, nama_barang, id_barang, status_pesanan FROM tb_barang INNER JOIN tb_supplier ON tb_barang.id_supplier = tb_supplier.id_supplier WHERE status_pesanan = 1 ");
                                                while ($y = mysqli_fetch_array($x)) {
                                                    echo "
                                                      <option value='$y[id_barang]'>$y[nama_barang] ($y[nama_supplier]) </option>";
                                                }
                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Kode Produksi</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control form-control-line" name="nama_barang" id="nama_barang" onkeyup='check()'>
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
                                        <label class="col-md-4">Jumlah <small>(Kilogram)</small> </label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-line" name="jumlah" id="jumlah" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Harga Jual</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-line" name="harga_jual" id="harga_jual" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary" name="save">
                                                <span class="glyphicon glyphicon-edit"></span> Simpan </button>
                                            <a href="data_barang_produksi.php" type="button" class="btn btn-danger">
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
        var check = function() {
            var isi = document.getElementById('isi').value
            var banyaknya = document.getElementById('banyaknya').value;
            document.getElementById('jumlah').value = isi * banyaknya;
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