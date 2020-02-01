<?php 
require "../../auth/gvLoginAuth.php";
require '../../connect.php';
$results = mysqli_query($db, "SELECT `thongtin` FROM `ha_member` WHERE `type`='hocsinh'");
$dem = array();
while ($row = mysqli_fetch_assoc($results)){
    $t = json_decode($row['thongtin'], true);
    if ($t == "") continue;
    foreach ($t as $i => $value) {
        if (!isset($dem[$value['id']]))
            $dem[$value['id']] = 0;
        $dem[$value['id']]++;
    }
}
?>

<!DOCTYPE html>
<html style="font-family: Montserrat, sans-serif;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="../../assets/css/untitled.css">
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

<body style="font-family: Montserrat, sans-serif;">
    <header class="masthead bg-primary text-white text-center" style="background-position: top;background-size: cover;background-repeat: no-repeat;height: 110vh;background-image: url(&quot;../../assets/img/bg-home.png&quot;);">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-md" style="display: inline-block;">
                <div class="container-fluid">
                    <div class="card mr-4 my-sm-2">
                        <div id="hatest" style="cursor: pointer;" class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/logo.png" style="width: 50px;height: 53px;margin-bottom: .8rem!important;margin-top: .6rem!important;"><a class="card-link text-dark my-0 mr-3 d-none d-xl-inline-block" href="#">HATEST</a></div>
                    </div><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation">
                                <div id="hastudents" style="cursor: pointer;" class="card mr-4 binh">
                                    <div class="card-body py-0 px-0 rl" style="width: 74px;"><img class="my-2 px-2" src="../../assets/img/8.png" style="width: 76px;height: 53px;"><a class="card-link active" href="#"></a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="quanlichung" style="cursor: pointer; background-color: #e4e4e4;" class="card mr-4 binh">
                                    <div class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/1.png" style="width: 50px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="font-weight: bold;">Quản lí chung</a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="taode" style="cursor: pointer;" class="card mr-4 binh" style="cursor: pointer;">
                                    <div class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/2.png" style="width: 50px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="font-weight: bold;">Tạo đề mới</a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="quanlitaikhoan" style="cursor: pointer;" class="card mr-4 binh">
                                    <div class="card-body py-0 px-0"><a class="card-link text-dark ml-3 mr-1 d-none d-xl-inline-block" href="#" style="font-weight: bold;">Quản lí tài khoản</a><img class="my-2 mr-3 my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/6.png" style="width: 50px;"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="card" id="style-7" style="overflow-y: auto;">
                <div class="card-body" style="height: 74vh;">
                    <?php 
                    $results = mysqli_query($db, "SELECT * FROM `test` WHERE `author`='".$_SESSION['username']."' ORDER BY `i` DESC");
                    if (mysqli_num_rows($results) > 0){
                        while ($row = mysqli_fetch_assoc($results)) {
                            $html = '<div class="card my-4 kshadow" style="background-color: rgb(211,212,214);border: none;"><div class="card-body my-2 mx-2" style="padding: 0;"><h1 class="text-right text-dark mr-3 responsive1" style="width: 50%;float: right;padding: 0;font-size: 46px;">'.$row['id'].'</h1><p class="text-left text-dark responsive pl-3" style="font-weight: bold;font-size: 25px;margin-bottom: 0;font-family: Montserrat, sans-serif;width: 50%;"><a style="text-decoration: none; color:black" href="thongtin.php?id='.$row['id'].'">'.htmlspecialchars($row['name']).'</a></p><p class="text-left text-dark pl-3" style="font-family: Montserrat, sans-serif;">Đã có '.(isset($dem[$row['id']])?$dem[$row['id']]:0).' học sinh làm đề</p></div></div>';
                            echo $html;
                        }
                    } else {
                        echo '<p class="text-muted" style="font-size: 22px;margin:0 auto;display: flex;   justify-content: center;   flex-direction: column;">Bạn chưa tạo đề nào.<br>Hãy thử tạo đề mới trên thanh menu</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </header>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="../../assets/js/freelancer.js"></script>
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <script src="function.js"></script>
</body>

</html>