<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign up - srtdash</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area bg-secondary">
        <div class="container">
            <div class="login-box ptb--100">
                <form method="post">
                    <div class="login-form-head">
                        <h4>Sign up</h4>
                    </div>
                    <div class="login-form-body">
                        <?php
                        include 'pesan.php';
                        ?>
                        <div class="form-gp">
                            <label for="exampleInputName1">Username</label>
                            <input type="text" id="exampleInputName1" name="username">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="exampleInputPassword1" name="pass1">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword2">Confirm Password</label>
                            <input type="password" id="exampleInputPassword2" name="pass2">

                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                        <div class="form-gp" hidden>
                            <input type="text" name="level" value="user">
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="submit">Submit <i class="ti-arrow-right"></i></button>
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Sudah Punya Akun? <a href="login.php">Sign In</a></p>
                        </div>
                    </div>
                </form>
                <?php
                include 'koneksi.php';
                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $password1 = $_POST['pass1'];
                    $level = $_POST['level'];


                    $password = mysqli_real_escape_string($con, $_POST['pass1']);
                    $password2 = mysqli_real_escape_string($con, $_POST['pass2']);

                    if ($password !== $password2) {
                        echo "
                                                <script>                                    
                                                    window.location = 'register.php?msg=gagal';
                                                </script>";
                        return false;
                    }
                    $password1 = md5($password1);

                    //query
                    $sql = mysqli_query($con, "INSERT INTO user (username,password,level)
                        VALUES ('$username','$password1','$level')");



                    if ($sql) {
                        echo "
                            <script>
                                window.location = 'login.php';
                            </script>";
                    } else {
                        echo "
                            <script>
                            window.location = 'register.php?msg=gagal';
                            </script>";
                    }
                }

                ?>

            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>