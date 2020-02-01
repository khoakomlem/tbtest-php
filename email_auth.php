<?php
	require 'connect.php';
	$code = mysqli_real_escape_string($db, $_GET['code']);
	$txt = "SELECT * FROM `member` WHERE `email_auth` = '%s' LIMIT 1";
	$sql = sprintf($txt, $code);
	$result = mysqli_query($db, $sql);
	$mess = '';
	if (mysqli_num_rows($result) == 1) {
		$mess = "ok";
		$txt = "UPDATE `member` SET `email_auth`='' WHERE `email_auth`='%s'";
		$sql = sprintf($txt, $code);
		mysqli_query($db, $sql);
	}
?>

<?php
	require 'connect.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Xác Minh Email - TB TEST</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
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
        <div class="container"><a href="index.php"><img id="logo" src="assets/img/logo.png"></a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation" style="background-color: rgba(255,255,255,0)!important;border-width: 0px;"><i class="fas fa-bars" style="color: rgb(0,0,0);font-size: 20px;"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1" role="presentation"><a href="index.php" class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" data-aos="fade-up" data-aos-duration="500" href="#" style="color: rgb(41,86,247);">HA STUDENTS</a></li>
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
                            <div class="card-body text-danger" style="font-family: Montserrat, sans-serif;">
            				<?php 
            				if ($mess=='ok'){
            					echo "Xác minh email thành công! Bấm <a href='index.php'>vào đây</a> để về trang chủ";
            				} else {
            					echo "Mã code sai?!?";
            				}
            				?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="assets/js/freelancer.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="js.js"></script>
</body>

</html>