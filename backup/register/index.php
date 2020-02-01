<?php
    $error;
    $mess;
    require "checkReg.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
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
.btn:focus{outline: none!important;}
</style>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-secondary text-uppercase" id="mainNav" style="background-color: rgba(254,254,254,0)!important;">
        <div class="container"><a href="../"><img id="logo" src="../assets/img/logo.png"></a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation" style="background-color: rgba(255,255,255,0)!important;border-width: 0px;"><i class="fas fa-bars" style="color: rgb(0,0,0);font-size: 20px;"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a href="../" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-aos="fade-up" data-aos-duration="500" href="#" style="color: rgb(41,86,247);">HA STUDENTS</a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-aos="fade-up" data-aos-duration="500" href="#" style="color: rgb(41,86,247);">QUẢN TRỊ ĐĂNG NHẬP</a></li>
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-aos="fade-up" data-aos-duration="500" href="#" style="color: rgb(41,86,247);">BÁO LỖI</a></li>
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
                            <form method="POST">
                                <div class="card-body text-danger" style="font-family: Montserrat, sans-serif;">
                                    <?php 
                                    $val = isset($_GET['val'])?$_GET['val']:1;
                                    ?>
                                    <input type="hidden" name="type" <?php echo "value='".$val."'" ?>>
                                    <h4 class="card-title"><?php echo $val==1?"Giáo viên":"Học sinh" ?> đăng ký</h4>
                                    <h6 class="text-danger card-subtitle mb-md-4 mb-3" style="font-size: 13px;color: rgb(225,88,101)!important;">Nhập đầy đủ thông tin</h6><input name="name" type="text" class="input-login mb-3" placeholder="Tên hiển thị"><input name="email" type="text" class="input-login mb-3" placeholder="Email" required><input name="username" type="text" class="input-login mb-3" placeholder="Tài khoản" required>
                                    <input name = "password" type="password" class="input-login mb-md-2 mb-3" placeholder="Mật khẩu" required><input class="btn btn-primary mb-4" type="submit" style="border-radius:50px;background: #FFAFBD;  /* fallback for old browsers */ background: -webkit-linear-gradient(to right, #ffc3a0, #FFAFBD);  /* Chrome 10-25, Safari 5.1-6 */ background: linear-gradient(to right, #ffc3a0, #FFAFBD); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */border:none;" value="Đăng kí" name='signup'>
                                        <p>Nếu bạn đã có tài khoản,đăng nhập &nbsp;<strong class="text-danger"><a class="text-danger kgach" <?php echo 'href="../login/index.php?val='.$val.'"'?>>tại đây</a></strong></p>
                                </div>
                            </form>
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
    if (isset($mess)){
        echo "<script>Swal.fire({type: 'success',title: 'Đăng kí thành công',text: '".$mess."'})</script>";
    }
    if (isset($error)){
        echo "<script>Swal.fire({type: 'error',title: 'Lỗi!',text: '".$error."'})</script>";
    }
    ?>
</body>

</html>