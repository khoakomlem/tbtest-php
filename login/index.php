<?php
    require "checkLog.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Đăng Nhập - TB TEST</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="../assets/css/untitled.css">
<style>
#style-7::-webkit-scrollbar-track
{
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
    border-radius: 10px;
}

#style-7::-webkit-scrollbar
{
    width: 7px;
height:80%;
    background-color: #F5F5F5;

}

#style-7::-webkit-scrollbar-thumb
{
    border-radius: 10px;
    background-image: -webkit-gradient(linear,
                                       left bottom,
                                       left top,
                                       color-stop(0.44, rgb(122,153,217)),
                                       color-stop(0.72, rgb(73,125,189)),
                                       color-stop(0.86, rgb(28,58,148)));
}
</style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-secondary text-uppercase" id="mainNav" style="background-color: rgba(254,254,254,0)!important;">
        <div class="container"><a href="index.php"><img id="logo" src="../assets/img/logo.png"></a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation" style="background-color: rgba(255,255,255,0)!important;border-width: 0px;"><i class="fas fa-bars" style="color: rgb(0,0,0);font-size: 20px;"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a href="index.php" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-aos="fade-up" data-aos-duration="500" href="#" style="color: #259932;-webkit-text-stroke: 1px black;font-size: 20px">TB CONFESSIONS</a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-aos="fade-up" data-aos-duration="500" href="#" style="color: #259932;-webkit-text-stroke: 1px black;font-size: 20px">QUẢN TRỊ ĐĂNG NHẬP</a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-aos="fade-up" data-aos-duration="500" href="#" style="color: #259932;-webkit-text-stroke: 1px black;font-size: 20px">BÁO LỖI</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead bg-primary text-white text-center" style="background-position: top;background-size: cover;background-repeat: no-repeat;height: 100vh;">
        <div class="container">
            <p class="invisible" id="ha-test" style="color: rgb(245,14,83);font-size: 55px;font-family: Montserrat, sans-serif;margin: 0;">HA TEST</p>
            <div>
                <div class="row gr-1">
                    <div class="col col-12" data-aos="fade-up">
                        <div class="card">
                            <div class="card-body text-danger" style="font-family: Montserrat, sans-serif;">
                                <form method="POST">
                                    <h4 class="card-title" style="color:#259932;">ĐĂNG NHẬP</h4>
                                    <h6 class="text-danger card-subtitle mb-md-4 mb-3" style="font-size: 13px;color: #259932!important;">Sử dụng tài khoản của TB TEST để đăng nhập</h6><input name="username" type="text" class="input-login mb-3" style="border-color: #259932;" placeholder="Tài khoản" required><input style="border-color: #259932" name="password" type="password" class="input-login mb-md-2 mb-3" placeholder="Mật khẩu" required><input class="btn btn-primary mb-4"
                                        type="submit" name="login" style="border-radius:50px;background: #259932;border:none;" value="Đăng Nhập">
                                    <p
                                        style="margin-bottom:0; color:#259932;">Nếu bạn chưa có tài khoản, đăng kí&nbsp;<strong class="text-danger"><a class=" kgach" style="color:#259932;" href="../register/index.php" </a>tại đây</a></strong></p>
                                        <p style="color:#259932;">Nếu bạn chưa có tài khoản quên mật khẩu, khôi phục&nbsp;<strong ><a style="color:#259932;" class="font-weight-bold kgach" href="../recovery.php">tại đây</a></strong></p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../assets/js/freelancer.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <?php
    if ($_SESSION['error']!=""){
        echo "<script>Swal.fire({type: 'error',title: 'Oops...',text: '".$_SESSION['error']."'})</script>";
        $_SESSION['error'] = null;
    }
    ?>
</body>

</html>