<?php 
require '../../auth/hsLoginAuth.php';
require '../../connect.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');
$id = strtoupper(mysqli_fetch_assoc(mysqli_query($db, "SELECT `test` FROM `ha_member` WHERE `username` = '".$_SESSION['username']."' LIMIT 1"))['test']);
if ($id == ''){
    header("Location: index.php");
    die();
}
$result = mysqli_query($db, "SELECT * FROM `test` WHERE `id`='".$id."'");
$row;
if (mysqli_num_rows($result) == 1){
    $row = mysqli_fetch_assoc($result);

    if (!isset($_COOKIE['num'])) {
        setcookie('num', 0);
        $_COOKIE['num'] = 0;
    }

    if (isset($_POST['nopbai'])){
        setcookie('num', $_COOKIE['num']+1);
        $_COOKIE['num'] = $_COOKIE['num']+1;
        $result = json_decode(mysqli_fetch_assoc(mysqli_query($db, "SELECT `thongtin` FROM `ha_member` WHERE username='".$_SESSION['username']."'"))['thongtin'], true);
        foreach ($result as $i => &$value) { //value dạng {id:'cc', ...}
            if ($value['id'] == $id){
                if (strtoupper($_POST['ans']) === strtoupper(json_decode($row['data'],true)[$_COOKIE['num']-1]['ans']))
                    $value['correct']++;
                break;
            }
        }
        //
        $txt = "UPDATE `ha_member` SET `thongtin`='%s' WHERE `username`='".$_SESSION['username']."'";
        $sql = sprintf($txt, addslashes(json_encode($result)));
        mysqli_query($db, $sql);
        //
        header("Location: lambai.php");
        die(); 
    }

    if (isset($_POST['nopbailuon'])){
        $num = $_COOKIE['num']+1;
        $result = json_decode(mysqli_fetch_assoc(mysqli_query($db, "SELECT `thongtin` FROM `ha_member` WHERE username='".$_SESSION['username']."'"))['thongtin'], true);
        foreach ($result as $i => &$value) { //value dạng {id:'cc', ...}
            if ($value['id'] == $id){
                if (strtoupper($_POST['ans']) === strtoupper(json_decode($row['data'],true)[$num-1]['ans']))
                    $value['correct']++;
                $value['done_at'] = time();
                break;
            }
        }
        //
        $txt = "UPDATE `ha_member` SET `test`='', `thongtin`='%s' WHERE `username`='".$_SESSION['username']."'";
        $sql = sprintf($txt, addslashes(json_encode($result)));
        mysqli_query($db, $sql);
        //
        setcookie('num', NULL, -1);
        header("Location: ketqua.php?id=".$id);
        die();    
    }

    // if (isset($_POST['thoatde'])){
    //     $result = json_decode(mysqli_fetch_assoc(mysqli_query($db, "SELECT `thongtin` FROM `ha_member` WHERE username='".$_SESSION['username']."'"))['thongtin'], true);
    //     $splice = 0;
    //     foreach ($result as $i => &$value) { //value dạng {id:'cc', ...}
    //         if ($value['id'] == $id){
    //             $splice = $i;
    //             break;
    //         }
    //     }
    //     array_splice($result, $splice, 1);
    //     $txt = "UPDATE `ha_member` SET `test`='', `thongtin`='%s' WHERE `username`='".$_SESSION['username']."'";
    //     $sql = sprintf($txt, addslashes(json_encode($result)));
    //     mysqli_query($db, $sql);
    //     //
    //     setcookie('num', NULL, -1);
    //     header("Location: index.php");
    //     die();
    // }

    $t = json_decode($row['data'],true);
    if ($_COOKIE['num']+1 > count($t)){
        $thongtin = json_decode(mysqli_fetch_assoc(mysqli_query($db, "SELECT `thongtin` FROM `ha_member` WHERE username='".$_SESSION['username']."'"))['thongtin'], true);
        foreach ($thongtin as $key => &$value) {
            if ($value['id'] == $id){
                $value['done_at'] = time();
                // print_r($value['done_at']);
                break;
            }
        }
        $thongtin = addslashes(json_encode($thongtin));
        mysqli_query($db, "UPDATE `ha_member` SET `test` ='', `thongtin`='".$thongtin."' WHERE `username` = '".$_SESSION['username']."'");
        setcookie('num', NULL, -1);
        header("Location: ketqua.php?id=".$id);
        die();
    } else
    $cauhoi = json_decode($row['data'],true)[$_COOKIE['num']];
    $tmp = array();
    $thongtin = json_decode(mysqli_fetch_assoc(mysqli_query($db, "SELECT `thongtin` FROM `ha_member` WHERE `username`='".$_SESSION['username']."'"))['thongtin'], true);
    foreach ($thongtin as $key => $value) {
        if ($value['id'] == $id){
            $tmp = $value;
            break;
        }
    }
    //thoi gian lam bai
    $now = time();
    $s = $tmp['done_at']-$now;
    $min = floor($s/60);
    $sec = $s - ($min*60);

    if ($now>$tmp['done_at']){
        setcookie('num', NULL, -1);
        mysqli_query($db, "UPDATE `ha_member` SET `test` ='' WHERE `username` = '".$_SESSION['username']."'");
        header("Location: ketqua.php?id=".$id);
        die();
    }
}

?>

<!DOCTYPE html>
<html style="font-family: Montserrat, sans-serif;">

<head>
    <script>
        var timeNow = Number("<?php echo $now ?>"); 
        var time = Number("<?php echo $s ?>");
    </script>
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
                        <div id="hatest" style="cursor: pointer;" class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/logo.png" style="width: 50px;height: 53px;margin-bottom: .8rem!important;margin-top: .6rem!important;"><a class="card-link text-dark my-0 mr-3 d-none d-xl-inline-block" href="#">HA TEST</a></div>
                    </div><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation">
                                <div id="hastudents" style="cursor: pointer;" class="card mr-4 binh">
                                    <div class="card-body py-0 px-0 rl" style="width: 74px;"><img class="my-2 px-2" src="../../assets/img/8.png" style="width: 76px;height: 53px;"><a class="card-link active" href="#"></a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="dedalam" style="cursor: pointer;" class="card mr-4 binh">
                                    <div class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/1.png" style="width: 50px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="font-weight: bold;">Đề đã làm</a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div style="cursor: pointer;background-color: black;" id="lamde" class="card mr-4 binh">
                                    <div class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/2.png" style="width: 50px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="font-weight: bold;">Làm đề</a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="quanlitaikhoan" style="cursor: pointer;" class="card mr-4 binh">
                                    <div class="card-body py-0 px-0"><a class="card-link text-dark ml-3 mr-1 d-none d-xl-inline-block" href="#" style="font-weight: bold;">Quản lí tài khoản</a><img class="my-2 mr-3 my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/5.png" style="width: 50px;"></div>
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
                    <div class="row">
                        <div class="col">
                            <h1 style="color: rgb(0,0,0);font-size: 34px;font-family: Quicksand, sans-serif;">Thời gian còn lại: <span id="timeleft"><?php echo isset($row)?$min.' phút '.$sec.' giây':'??' ?></span></h1>
                        </div>
                        <div class="col">
                            <h1 style="color: rgb(0,0,0);font-size: 34px;font-family: Quicksand, sans-serif;">Mã đề: <?php echo isset($row)?$row['id']:'??????' ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pl-5 col-12 mb-3" style="font-family: Quicksand, sans-serif;">
                            <h1 class="text-left text-dark"><span class="mr-2 num-ques" style="/*padding-top: 10px!important;*/font-family: Montserrat, sans-serif;/*font-size: 70px;*/"><?php echo $_COOKIE['num']+1 ?></span><input type="text" class="input-question" value="<?php echo isset($row)?htmlspecialchars($cauhoi['question']):'Đề không tồn tại!' ?>" style="font-size: 3rem;width: 90%;padding-top: 0!important;font-family: Quicksand, sans-serif;background-color: rgb(233,231,231);border: none;border-radius: 10px;padding: 10px;padding-top: 15px;margin: 0 auto;/*position: absolute;*/top: 1px;"
                                    disabled="" readonly=""></h1>
                        </div>
                        <div class="col col-12" style="float: left;">
                            <p class="text-bold mr-3 ans-text" style="display: inline;color: rgb(0,0,0);font-size: 38px;float: left;/*margin-left: 3.3rem;*/font-family: Quicksand, sans-serif;">A</p><input type="text" class="p-3 ans-input" style="display: inline;background-color: rgb(233,231,231);border: none;border-radius: 10px!important;float: left;font-family: Quicksand, sans-serif;/*width: 85%;*/font-size: 20px;"
                                value="<?php echo isset($row)?htmlspecialchars($cauhoi['ansA']):'Đề không tồn tại!' ?>" disabled="" readonly=""></div>
                        <div class="col col-12" style="float: left;">
                            <p class="text-bold mr-3 ans-text" style="display: inline;color: rgb(0,0,0);font-size: 38px;float: left;/*margin-left: 3.3rem;*/font-family: Quicksand, sans-serif;">B</p><input type="text" class="p-3 ans-input" style="display: inline;background-color: rgb(233,231,231);border: none;border-radius: 10px!important;float: left;font-family: Quicksand, sans-serif;/*width: 85%;*/font-size: 20px;"
                                value="<?php echo isset($row)?htmlspecialchars($cauhoi['ansB']):'Đề không tồn tại!' ?>" disabled="" readonly=""></div>
                        <div class="col col-12" style="float: left;">
                            <p class="text-bold mr-3 ans-text" style="display: inline;color: rgb(0,0,0);font-size: 38px;float: left;/*margin-left: 3.3rem;*/font-family: Quicksand, sans-serif;">C</p><input type="text" class="p-3 ans-input" style="display: inline;background-color: rgb(233,231,231);border: none;border-radius: 10px!important;float: left;font-family: Quicksand, sans-serif;/*width: 85%;*/font-size: 20px;"
                                value="<?php echo isset($row)?htmlspecialchars($cauhoi['ansC']):'Đề không tồn tại!' ?>" disabled="" readonly=""></div>
                        <div class="col col-12" style="float: left;">
                            <p class="text-bold mr-2 ans-text" style="display: inline;color: rgb(0,0,0);font-size: 38px;float: left;/*margin-left: 3.3rem;*/font-family: Quicksand, sans-serif;">D</p><input type="text" class="p-3 ans-input" style="display: inline;background-color: rgb(233,231,231);border: none;border-radius: 10px!important;float: left;font-family: Quicksand, sans-serif;/*width: 85%;*/font-size: 20px;"
                                value="<?php echo isset($row)?htmlspecialchars($cauhoi['ansD']):'Đề không tồn tại!' ?>" disabled="" readonly=""></div>
                    </div>
                    <form method="POST">
                        <input pattern="[A-Da-d]" required id="ans" name="ans" maxlength="1" type="text" class="mb-3" style="text-transform: uppercase;background-color: rgb(233,231,231);border: none;border-radius: 50px;padding: 1rem;width: 33.3%;/*float: left;*/" placeholder="Đáp án đúng">
                        <div class="row rowbtn mb-3" style="width: 80%;text-align: center;margin: 0 auto;">
                            <div class="col">
                                <input class="btn btn-secondary font-weight-bold" name="nopbai" type="submit" style="width: 100%;border-radius: 50px;height: 3rem;font-family: Quicksand, sans-serif;background: #ff7551;border: none;" value="OK">
                                <input class="btn btn-secondary font-weight-bold" name="nopbailuon" type="submit" style="margin-top: 10px;width: 66.6%;border-radius: 50px;height: 3rem;font-family: Quicksand, sans-serif;background: #ff7551;border: none;" value="Nộp bài và chấm điểm luôn">
                                <!-- <input onclick="$('#ans').val('a')" class="btn btn-secondary font-weight-bold" name="thoatde" type="submit" style="margin-top: 10px;width: 33.3%;border-radius: 50px;height: 3rem;font-family: Quicksand, sans-serif;background: red;border: none;" value="Thoát đề và không lưu kết quả"> -->
                            </div>
                        </div>
                    </form>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="function.js"></script>
    <?php 
    // if (isset($_GET['id'])){
    //     if (isset($row)){
    //         echo "<script>Swal.fire({type: 'info',title: 'Lưu ý!',text: 'Bạn có ".$row['time']." phút để làm bài'}).then(result=>{time = ".($row['time']*60).";let phut,giay;setInterval(()=>{time--;phut=Math.floor(time/60);giay=time-(phut*60);$('#timeleft').html(phut+':'+giay)}, 1000)})</script>";
    //     } else {
    //         echo "<script>Swal.fire({type: 'error',title: 'Oops...',text: 'Không tìm thấy đề!'})</script>";
    //     }
    // }
    // if (isset($_GET['correct'])){
    //     if (isset($_GET['correct']) && in_array($_GET['correct'], array(0, 1))){
    //         if ($_GET['correct'] == 1){
    //             echo "<script>Swal.fire({position: 'top-end',type: 'success',title: 'Chính xác!!! Game là dễ :)))',showConfirmButton: false,timer: 1500})</script>";
    //         } else {
    //             echo "<script>Swal.fire({position: 'top-end',type: 'error',title: 'Suýt đúng!!! Chỉ cần không sai là được ♥',showConfirmButton: false,timer: 1500})</script>";
    //         }
    //     }
    // }
    ?>
</body>

</html>