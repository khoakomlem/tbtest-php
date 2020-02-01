<?php 
require '../../auth/gvLoginAuth.php';
require '../../connect.php';

$id = strtoupper(isset($_GET['id'])?mysqli_real_escape_string($db, $_GET['id']):'');

$name = mysqli_fetch_assoc(mysqli_query($db, "SELECT `name` FROM `test` WHERE `id`='".$id."'"))['name'];
$result = mysqli_query($db, "SELECT * FROM `ha_member` WHERE `type`='hocsinh'");
$count = 0;$time=array();$correct=array();$length=array();$hsname=array();$min=array();$sec=array();
while ($row = mysqli_fetch_assoc($result)){
    $t = json_decode($row['thongtin'], true);
    if ($t == "") continue;
    foreach ($t as $key => $value) {
        if ($value['id'] == $id && $row['test']==''){
            $count++;
            $hsname[$count] = $row['name'];
            $time = $value['done_at'] - $value['do_at'];
            $min[$count] = floor($time/60);
            $sec[$count] = $time-$min[$count]*60;
            $correct[$count] = $value['correct'];
            $length[$count] = count(json_decode(mysqli_fetch_assoc(mysqli_query($db, "SELECT `data` FROM `test` WHERE `id`='".$id."'"))['data'], true));
            break;
        }
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
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
.btn:focus{outline: none!important;}
</style>
</head>

<body style="font-family: Montserrat, sans-serif;">
    <header class="masthead bg-primary text-white text-center" style="background-position: top;background-size: cover;background-repeat: no-repeat;height: 110vh;background-image: url(&quot;../../assets/img/bg-home.png&quot;);">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-md" style="display: inline-block;">
                <div class="container-fluid">
                    <div class="card mr-4 my-sm-2">
                        <div id="hatest" style="cursor: pointer;" class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/logo.png" style="width: 50px;height: 50px;"><a class="navbar-brand text-dark my-0 mr-3 d-none d-xl-inline-block" href="#" style="margin:0;font-weight:bold;">HA TEST</a></div>
                    </div><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation">
                                <div id="hastudents" style="cursor: pointer;" class="card mr-4 binh">
                                    <div class="card-body py-0 px-0 rl" style="width: 74px;"><img class="my-2 px-2" src="../../assets/img/8.png" style="width: 76px;height: 53px;"><a class="card-link active" href="#"></a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="quanlichung" style="cursor: pointer;" class="card mr-4 binh">
                                    <div class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/1.png" style="width: 50px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="font-weight: bold;">Quản lí chung</a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="taode" style="cursor: pointer;" class="card mr-4 binh">
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
                    <div class="card my-4 kshadow" style="background-color: rgb(211,212,214);border: none;">
                        <div class="card-body my-2 mx-2" style="padding: 0;">
                            <h1 class="text-right text-dark mr-3 responsive1" style="width: 50%;float: right;padding: 0;font-size: 46px;"><?php echo $id ?></h1>
                            <p class="text-left text-dark responsive pl-3" style="font-weight: bold;font-size: 25px;margin-bottom: 0;font-family: Montserrat, sans-serif;width: 50%;">Tên đề: <?php echo htmlspecialchars($name) ?></p>
                            <p class="text-left text-dark pl-3" style="font-family: Montserrat, sans-serif;">Số học sinh để làm đề: <?php echo $count ?></p>
                        </div>
                    </div>
                    <p style="font-size: 23px;color: rgb(0,0,0);font-weight:bold;">Thông tin các học sinh đã làm</p>
                    <?php 
                    $i=0;
                    for ($i=1; $i<=$count; $i++){
                        echo '<div class="card my-4 kshadow" style="background-color: rgb(211,212,214);border: none;"><div class="card-body my-2 mx-2" style="padding: 0;"><div class="row"><div class="col"><p class="text-left text-dark responsive pl-3" style="font-weight: bold;font-size: 23px!important;margin-bottom: 0;font-family: Montserrat, sans-serif;/*width: 25%;*/">'.htmlspecialchars($hsname[$i]).'</p></div><div class="col"><p class="text-center text-muted" style="font-size: 20px;margin-bottom: 0;color: rgb(87,87,87)!important;">Thời gian : '.$min[$i].' phút '.$sec[$i].' giây</p></div><div class="col"><h6 class="text-right text-dark mr-3 responsive1" style="/*width: 25%;*/float: right;padding: 0;font-size: 25px!important;margin-bottom: 0;"><span style="font-size: 20px;color: rgb(37,37,37)!important;">Điểm :&nbsp;</span>'.$correct[$i].'/'.$length[$i].'</h6></div></div></div></div>';
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