<?php
include "kns.php";
$percobaan = 'Belum';
extract($_POST);
if (isset($daftar)) {
    $cek = mysqli_query($kns, "SELECT * from tb_supplier");
    while ($cek2 = mysqli_fetch_array($cek)) {
        $email2 = $cek2['email'];
        if ($email2 == $email) {
            $percobaan = 'Sudah';
            echo "<script>alert('Akun email anda sudah terdaftar.'); location.href='login.php';</script>";
        }
    }
    $cek1 = mysqli_query($kns, "SELECT * from tb_user");
    while ($cek22 = mysqli_fetch_array($cek1)) {
        $username2 = $cek22['username'];
        if ($username2 == $username) {
            $percobaan = 'Sudah';
            echo "<script>alert('Username Anda sudah terdaftar.'); location.href='login.php';</script>";
        }
    }
    if ($percobaan != 'Sudah') {
        $simpan_daftar = mysqli_query($kns, "insert into tb_user values(null,'$username','$password','$nama_user','$hak_akses')") or die(mysqli_error($kns));
        $id_user = mysqli_insert_id($kns);
        $simpan_supplier = mysqli_query($kns, "insert into tb_supplier values(null,'$nama_perusahaan','$alamat','$kota','$no_telephone','$email','$id_user')") or die(mysqli_error($kns));
        if ($simpan_daftar) {
            echo "<script>alert('Berhasil disimpan'); location.href='login.php';</script>";
        } else {
            echo "<script>alert('gagal disimpan'); location.href='daftar.php';</script>";
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
    <title>Daftar - UD. RAJABAWANG</title>
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
                    <a class="navbar-brand" href="login.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->

                            <!-- Light Logo icon -->
                            <img src="assets/images/logo.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>

                            <!-- Light Logo text -->
                            <h3 class="text-white">UD. RAJABAWANG</h3>
                        </span> </a>
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

                        <h4 class="text-white card-title align-self-center col-md-12 col-12">Sistem Informasi Peramalan Persediaan UD. RAJABAWANG</h4>

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
                        <h3 class="text-themecolor m-b-0 m-t-0">Registrasi Supplier</h3>

                    </div>

                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">

                    <script language='javascript'>
                        function validAngka(a) {
                            if (!/^[0-9.]+$/.test(a.value)) {
                                a.value = a.value.substring(0, a.value.length - 1000);
                            }
                        }
                    </script>
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="table-responsive">
                                <form method="POST">
                                    <div class="form-group">
                                        <label class="col-md-4">Nama Perusahaan</label>
                                        <div class="col-md-3 ">
                                            <input type="text" required="required" placeholder="Masukan Nama Parusahaan" name="nama_perusahaan" class="form-control form-control-line" onkeypress="return event.charCode < 48 || event.charCode  >57" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Alamat</label>
                                        <div class="col-md-3 ">
                                            <textarea type="text" required="required" placeholder="Masukan alamat" name="alamat" class="form-control form-control-line" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Kota</label>
                                        <div class="col-md-3 ">
                                            <input type="text" required="required" placeholder="Masukan Kota" name="kota" class="form-control form-control-line" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">No Telephone</label>
                                        <div class="col-md-3 ">
                                            <input type="text" placeholder="Masukan No telephone" name="no_telephone" class="form-control form-control-line" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Email</label>
                                        <div class="col-md-3 ">
                                            <input type="email" placeholder="Masukan email" name="email" class="form-control form-control-line" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Username</label>
                                        <div class="col-md-3 ">
                                            <input type="text" placeholder="Masukan Usernames" name="username" class="form-control form-control-line" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Password</label>
                                        <div class="col-md-3">
                                            <input type="password" placeholder="Masukan Password" name="password" class="form-control form-control-line" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Nama User</label>
                                        <div class="col-md-3 ">
                                            <input type="text" placeholder="Masukan nama user" name="nama_user" class="form-control form-control-line" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4">Hak Akses</label>
                                        <div class="col-md-3">
                                            <input type="type" name="hak_akses" value="supplier" readonly="readonly" class="form-control form-control-line" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn btn-info btn-rounded waves-effect waves-light m-b-40" type="submit" name="daftar">Daftar</button>
                                    </div>
                                </form>
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
            © Copyright 2023
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