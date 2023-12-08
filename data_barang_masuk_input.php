<?php
date_default_timezone_set('Asia/Jakarta');
$tgl = date('d-m-Y h:i:s');
$tgl2 = date('Y-m-d');
$bataswaktu = date('d-m-Y h:i:s', strtotime('+3 month', strtotime($tgl)));
session_start();
include "kns.php";


extract($_GET);
if (isset($save)) {

    $data = mysqli_query($kns,"SELECT * FROM tb_barang WHERE kode_barang = '$kode_barang' AND nama_barang = '$nama' AND id_supplier = '$supplier'");
    $data = mysqli_fetch_row($data);

    if($data != null || $data != false){
        // $data[8] = jumlah
        $data[8] += (int)$jumlah;

        $smp = mysqli_query($kns, "UPDATE tb_barang SET jumlah = '$data[8]' WHERE kode_barang ='$kode_barang' AND nama_barang = '$nama' AND id_supplier = '$supplier'");

        if ($smp) {
            $stok = mysqli_query($kns, "SELECT stok_sekarang FROM tb_stok WHERE id_barang = '$data[0]'");
            $stok = mysqli_fetch_row($stok);

            $stok[0] += $jumlah;

            $tabel = mysqli_query($kns, "UPDATE tb_stok SET stok_sekarang = '$stok[0]' WHERE id_barang = '$data[0]'");
            echo "<script>alert('Berhasil Disimpan'); location.href='data_barang_masuk.php';</script>";
        } else {
            echo "<script>alert('Data gagal disimpan !'); location.href='data_barang_masuk.php';</script>";
        }

    } else {
        $id_barang = $kode_barang . '_' . rand(100, 999);
        $smp = mysqli_query($kns, "INSERT INTO tb_barang (id_barang,kode_barang, tgl,nama_barang,satuan,isi,banyaknya,jumlah,id_supplier,status_pesanan) VALUES ('$id_barang','$kode_barang','$tanggal','$nama','$satuan',0,0,'$jumlah','$supplier','2')");

        if ($smp) {
            mysqli_query($kns, "INSERT INTO tb_stok VALUES('','$jumlah','$id_barang')");
            echo "<script>alert('Berhasil Disimpan'); location.href='data_barang_masuk.php';</script>";
        } else {
            echo "<script>alert('Data gagal disimpan !'); location.href='data_barang_masuk.php';</script>";
        }
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
    <title>UD. Rajabawang</title>
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

                        <h4 class="text-white card-title align-self-center col-md-12 col-12">SISTEM INFORMASI PERAMALAN PERSEDIAAN
                            UD.RAJABAWANG </h4>

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
                        <h3 class="text-themecolor m-b-0 m-t-0">Tambah Data Barang Masuk</h3>
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
                                <form class="form-horizontal form-material">
                                    <input type="hidden" name="kode_barang" value="A">
                                    <!-- <div class="form-group">
                                        <label class="col-md-4">Kode Barang</label>
                                        <div class="col-md-3">
                                            <select name="kode_barang" class="form-control">
                                                <option value="A">A</option>
                                                <option value="AB">AB</option>
                                                <option value="B">B</option>
                                                <option value="BC">BC</option>
                                                <option value="BSB">BSB</option>
                                                <option value="BSA">BSA</option>
                                                <option value="C">C</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-md-4">Tanggal</label>
                                        <div class="col-md-3">
                                            <input type="date" class="form-control form-control-line" name="tanggal" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Supplier</label>
                                        <div class="col-md-3">
                                            <select name="supplier" class="form-control">
                                                <?php
                                                $suppliernya = mysqli_query($kns, "SELECT * FROM tb_supplier");
                                                while ($ceknya = mysqli_fetch_array($suppliernya)) { ?>
                                                    <option value="<?php echo $ceknya['id_supplier'] ?>"><?php echo $ceknya['nama_supplier']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Nama Barang</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control form-control-line" name="nama" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Satuan</label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control form-control-line" name="satuan" required="">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-4">Isi</label>
                                        <div class="col-md-3">
                                            <input type="number" step="0.01" class="form-control form-control-line" id="isi" name="isi" required="" onkeyup='check()'>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Banyaknya</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-line" id="banyaknya" name="banyaknya" required="" onkeyup='check()'>
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="col-md-4">Jumlah</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-line" id="jumlah" name="jumlah">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="col-md-4">Harga (Rp.)</label>
                                        <div class="col-md-3">
                                            <input type="number" class="form-control form-control-line" name="harga" required="">
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button class="btn btn-primary" name="save">Simpan</button>
                                            <a href="data_barang_produksi.php" class="btn btn-success">batal</a>
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
            <footer class="footer">
                @Copyright Efan Febriana 2023
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