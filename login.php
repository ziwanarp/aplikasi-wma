<?php
session_start();
include 'kns.php';
extract($_POST);
if (isset($login)) {
    $cek_login = mysqli_query($kns, "select * from tb_user where username='$username' and password='$password'");
    $cek = mysqli_num_rows($cek_login);
    if ($cek > 0) {
        $hak_akses = mysqli_fetch_array($cek_login);
        $_SESSION['hak_akses'] = $hak_akses['hak_akses'];
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $hak_akses['nama_user'];
        $_SESSION['id'] = $hak_akses['id_user'];

        if ($hak_akses['hak_akses'] == "owner") {
            header("location:owner.php");
        }
        if ($hak_akses['hak_akses'] == "admin") {
            header("location:admin.php");
        }
        if ($hak_akses['hak_akses'] == "customer") {
            header("location:customer.php");
        }
        if ($hak_akses['hak_akses'] == "supplier") {
            $cek_supplier = mysqli_query($kns, "select id_supplier from tb_supplier where id_user='" . $hak_akses['id_user'] . "'");
            if (mysqli_num_rows($cek_supplier) > 0) {
                $row = mysqli_fetch_row($cek_supplier);
                $_SESSION['id_supplier'] = $row[0];
                header("location:supplier.php");
            } else {
                echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Supplier tidak ditemukan!');
                            window.location.href='login.php';
                            </script>");
            }
        }

        //   if ($hak_akses['hak_akses'] == "supplier") {
        //     header("location:supplier.php");
        // }
    } else {
        echo ("<script LANGUAGE='JavaScript'>
                window.alert('Password atau username salah');
                window.location.href='login.php';
                </script>");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>UD. RAJABAWANG</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon1.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                <span class="login100-form-title p-b-41">
                    Account Login
                </span>
                <form method="post">

                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input type="text" name="username" placeholder="Masukan Username" class="form-control form-control-line">

                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input type="password" name="password" placeholder="Masukan Password" class="form-control form-control-line"><br>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn" name="login" value="login">
                            Login
                        </button>

                    </div>

                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>

</html>