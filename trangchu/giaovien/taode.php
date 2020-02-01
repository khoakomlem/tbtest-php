<?php
    require "../../auth/gvLoginAuth.php";
    require '../../connect.php';

    function getRandomWord($len = 10) {
        $word = array_merge(range('0', '9'), range('A', 'Z'));
        shuffle($word);
        return substr(implode($word), 0, $len);
    }

    function createUniqueId() {
        require '../../connect.php';
        while (1) {
            $word = getRandomWord(6);
            $results = mysqli_query($db, "SELECT `id` FROM `test` WHERE `id`='".$word."'");
            if (mysqli_num_rows($results) < 1)
                return $word;
        }
    }

    if (!isset($_COOKIE['num'])){
        setcookie("num", 1);
        $_COOKIE['num'] = 1;
    }

    $arg = array("name", "time", "question", "ansA", "ansB", "ansC", "ansD", "ans");
    $ok = true;
    foreach ($arg as $i){
        if (!isset($_POST[$i]) && $_COOKIE['num']===1)
            $ok = false;
    }



    if (isset($_POST['more-quest'])) {
        setcookie("taocauhoi[".$_COOKIE['num']."]", json_encode($_POST));
        $_COOKIE["taocauhoi"][$_COOKIE['num']] = json_encode($_POST);
        setcookie("num", $_COOKIE['num']+1);
        $_COOKIE['num'] = $_COOKIE['num']+1;
        header("Location: taocauhoi.php");
    }
// print_r($_POST);

    if (isset($_POST['create'])){
        if ($ok) {
            setcookie("taocauhoi[".$_COOKIE['num']."]", json_encode($_POST));
            $_COOKIE['taocauhoi'][$_COOKIE['num']] = json_encode($_POST);
            $json = array();
            $t = array_slice(json_decode($_COOKIE['taocauhoi'][1], true), 2, 6, true);
            array_push($json, $t);
            foreach ($_COOKIE['taocauhoi'] as $i => $value) {
                if ($i == 1) continue;
                $t = array_slice(json_decode($value, true), 0, 6, true);
                array_push($json, $t);
            }
            $json = addslashes(json_encode($json));
            $id = createUniqueId();

            $txt = "INSERT `test` (`name`, `time`, `id`, `data`, `author`) VALUES ('%s', '%s', '%s', '%s', '%s')";
            $taocauhoi = json_decode($_COOKIE['taocauhoi'][1], true);
            $sql = sprintf($txt, addslashes($taocauhoi['name']), addslashes($taocauhoi['time']), $id, $json, $_SESSION['username']);
            mysqli_query($db, $sql);
            foreach ($_COOKIE['taocauhoi'] as $name => $value) {
                setcookie("taocauhoi[".$name."]", null, -1);
            }
            setcookie('num', null, -1);

            header("Location: ../giaovien");

            // $results = mysqli_query($db, "SELECT `data` FROM `test`");
            // print_r(mysqli_fetch_assoc($results)['data']);
        }
    }
?>

<!DOCTYPE html>
<html style="font-family: Quicksand, sans-serif;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tạo Đề - TB TEST</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.css">
    <link rel="stylesheet" href="../../assets/css/untitled.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
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

@media (min-width: 1200px) {
  .b-home {

    /*bottom: 0;*/
     width: 220px;
     height: 80px;
     position: relative;left: -43px;
  }
  .b-halogo{
    position: relative;left: -25px;
  }
    .b-ql{
         position: relative;right:  -30px;
    }
    .b-taode{
         position: relative;right: -10px;
    }
    .b-qlchung{
        position: relative;right: 6px;
    }


}
</style>
</head>

<body style="font-family: Quicksand, sans-serif;">
    <header class="masthead bg-primary text-white text-center">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-md" style="display: inline-block;">
                <div class="container-fluid">
                    <span class="nav-item" role="presentation">
                                <div id="home" style="cursor: pointer;" class="b-home card binh">
                                    <div class=" card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/logo.png" style="width: 60px;height: 60px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="top:5px;position: relative; color: #272679; font-size: 1.7rem; font-weight: bold;">TB TEST</a></div>
                                </div>
                            </span>
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation">
                                <div id="tranbien" style="cursor: pointer;" class="b-halogo card binh">
                                    <div class="card-body py-0 px-0 rl" style="width: 80px;"><img class="my-2 px-2" src="../../assets/img/8.png" style="width: 80px;height: 60px;"><a class="card-link active" href="#"></a></div>
                                </div>
                            </li>

                            <li class="nav-item" role="presentation">
                                <div id="quanlichung" style="cursor: pointer; " class="b-qlchung card binh">
                                    <div class="card-body py-0 px-0" ><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/1.png" style="width: 60px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="font-size: 1.3rem; position: relative;top: 4px; font-weight: bold; ">QUẢN LÍ CHUNG</a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="taode" style="cursor: pointer;" class="b-taode card  binh">
                                    <div class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/2.png" style="width: 60px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="font-size: 1.3rem;position: relative;top: 4px; font-weight: bold;">TẠO ĐỀ</a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="quanlitaikhoan" style="cursor: pointer;" class="b-ql card  binh">
                                    <div class="card-body py-0 px-0"><a class="card-link text-dark ml-3 mr-1 d-none d-xl-inline-block" href="#" style="font-size: 1.3rem;position: relative;top: 4px; font-weight: bold;">TÀI KHOẢN</a><img class="my-2 mr-3 my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/6.png" style="width: 60px;"></div>
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

                <form method="POST">
                    <?php
                        if (isset($_COOKIE["taocauhoi"]))
                            $banhquy = json_decode($_COOKIE["taocauhoi"][1], true);
                        else{
                            $banhquy = array("name"=>"", "time"=>"");
                        }
                    ?>
                    <div class="row">
                        <div class="col mt-2">
                            <h2 class="text-dark font-weight-bolder text-left mb-3 heading-tende" style="font-family: Quicksand, sans-serif;font-size: 35px;"><span class="mr-4 tg-text">Tên đề&nbsp;</span>
                                <input maxlength="100" <?php if($_COOKIE['num']>1)echo"disabled "; ?> required value=<?php echo "'".$banhquy['name']."'"?> name="name" type="text" class="p-1 input-tende" style="background-color: rgb(233,231,231);border-radius: 10px;border: none;">&nbsp;</h2>
                            <h2 class="text-dark font-weight-bolder text-left mb-3 heading-tende"
                                style="font-family: Quicksand, sans-serif;font-size: 35px;"><span class="mr-4 tg-text">Thời gian</span>&nbsp;
                                <input <?php if($_COOKIE['num']>1)echo"disabled "; ?> required value=<?php echo "'".$banhquy['time']."'" ?> name="time" type="number" class="mr-2 p-1" style="background-color: rgb(233,231,231);border-radius: 10px;border: none;width: 17%;"><span class="tg-text">phút</span></h2>
                            <h2 class="text-dark font-weight-bolder text-left mb-3 heading-tende"
                                style="font-family: Quicksand, sans-serif;font-size: 35px;">Mã đề: XXXXXXX&nbsp;<span class="font-weight-light" style="font-size: 23px;">(Đây là mã đề do máy tạo, bạn không thể sửa)</span></h2>
                            <h2 class="text-dark font-weight-bolder mb-3" style="font-family: Quicksand, sans-serif;font-size: 35px;">Các câu hỏi</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col pl-4 col-12 mb-3" style="font-family: Quicksand, sans-serif;">
                            <h1 class="text-left text-dark"><span class="mr-2 num-ques" style="/*padding-top: 10px!important;*/font-family: Montserrat, sans-serif;/*font-size: 70px;*/"><?php echo $_COOKIE['num']; ?></span><input required name="question" type="text" class="input-question" placeholder="Nhập câu hỏi của bạn vào đây" style="font-size: 3rem;width: 90%;padding-top: 0!important;font-family: Quicksand, sans-serif;background-color: rgb(233,231,231);border: none;border-radius: 10px;padding: 10px;padding-top: 15px;margin: 0 auto;/*position: absolute;*/top: 1px;">
                                </h1>
                        </div>
                        <div class="col col-12" style="float: left;">
                            <p class="text-bold mr-3 ans-text" style="display: inline;color: rgb(0,0,0);font-size: 38px;float: left;/*margin-left: 3.3rem;*/font-family: Quicksand, sans-serif;">A</p><input required name="ansA" type="text" class="p-3 ans-input" style="display: inline;background-color: rgb(233,231,231);border: none;border-radius: 10px!important;float: left;font-family: Quicksand, sans-serif;/*width: 85%;*/font-size: 20px;"
                                placeholder="Nhập câu trả lời"></div>
                        <div class="col col-12" style="float: left;">
                            <p class="text-bold mr-3 ans-text" style="display: inline;color: rgb(0,0,0);font-size: 38px;float: left;/*margin-left: 3.3rem;*/font-family: Quicksand, sans-serif;">B</p><input required name="ansB" type="text" class="p-3 ans-input" style="display: inline;background-color: rgb(233,231,231);border: none;border-radius: 10px!important;float: left;font-family: Quicksand, sans-serif;/*width: 85%;*/font-size: 20px;"
                                placeholder="Nhập câu trả lời"></div>
                        <div class="col col-12" style="float: left;">
                            <p class="text-bold mr-3 ans-text" style="display: inline;color: rgb(0,0,0);font-size: 38px;float: left;/*margin-left: 3.3rem;*/font-family: Quicksand, sans-serif;">C</p><input required name="ansC" type="text" class="p-3 ans-input" style="display: inline;background-color: rgb(233,231,231);border: none;border-radius: 10px!important;float: left;font-family: Quicksand, sans-serif;/*width: 85%;*/font-size: 20px;"
                                placeholder="Nhập câu trả lời"></div>
                        <div class="col col-12" style="float: left;">
                            <p class="text-bold mr-2 ans-text" style="display: inline;color: rgb(0,0,0);font-size: 38px;float: left;/*margin-left: 3.3rem;*/font-family: Quicksand, sans-serif;">D</p><input required name="ansD" type="text" class="p-3 ans-input" style="display: inline;background-color: rgb(233,231,231);border: none;border-radius: 10px!important;float: left;font-family: Quicksand, sans-serif;/*width: 85%;*/font-size: 20px;"
                                placeholder="Nhập câu trả lời"></div>
                    </div><input required name="ans" type="text" class="mb-3" style="background-color: rgb(233,231,231);border: none;border-radius: 50px;padding: 1rem;width: 33.3%;/*float: left;*/" placeholder="Đáp án đúng">
                    <div class="row rowbtn" style="/*width: 80%;*/text-align: center;margin: 0 auto;">
                        <div class="col col-6 mb-4">
                            <input name="more-quest" class="btn btn-primary font-weight-bold" type="submit" style="width: 100%;border-radius: 50px;height: 3rem;font-family: Quicksand, sans-serif;background: #4cb4aa;border: none;padding: 3px;" value="Thêm câu hỏi">
                        </div>
                        <div class="col col-6">
                            <input id="taode" name="create" class="btn btn-secondary font-weight-bold" type="submit" style="width: 100%;border-radius: 50px;height: 3rem;font-family: Quicksand, sans-serif;background: #ff7551;border: none;" value ="Tạo đề">
                        </div>
                        <div class="col col-12" style="border-color: black; margin: 0 auto 20px;">
                            <input onclick="$.post('thoattaode.php', data=>{location.assign('index.php')})" class="btn btn-secondary font-weight-bold" name="thoattaode" type="submit" style="width: 33.3%;border-radius: 50px;height: 3rem;font-family: Quicksand, sans-serif;background: red;border: none;" value="Thoát">
                        </div>
                    </div>
                </form>

                </div>
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
    <script></script>
</body>

</html>