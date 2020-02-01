<?php
require "../../auth/hsLoginAuth.php";
require '../../connect.php';

if (isset($_POST['logout'])){
    setcookie("num", null, -1);
    if (isset($_COOKIE['taocauhoi']))
    foreach ($_COOKIE['taocauhoi'] as $name => $value) {
        setcookie("taocauhoi[".$name."]", null, -1);
    }
    session_destroy();
    header("Location: ../../");
    die();
}

if (isset($_POST['submit'])){
    switch ($_POST['submit']) {
        case 'change_name':
            $txt = "UPDATE `member` SET `name` = '%s' WHERE `username` = '%s'";
            $sql = sprintf($txt, mysqli_real_escape_string($db, $_POST['new_name']), $_SESSION['username']);
            mysqli_query($db, $sql);
            echo "Tên hiển thị của bạn đã đổi thành công thành: ".$_POST['new_name'];
            break;

        case 'change_email':
            $email = mysqli_real_escape_string($db, $_POST['new_email']);
            if (mysqli_num_rows(mysqli_query($db, "SELECT * FROM `member` WHERE `email`='".$email."'")) >= 1) {
              echo "Email này đã có người xài!";
              die();
            }
            $txt = "UPDATE `member` SET `email` = '%s' WHERE `username` = '%s'";
            $sql = sprintf($txt, $email, $_SESSION['username']);
            mysqli_query($db, $sql);
            echo "Email của bạn đã đổi thành công thành: ".$email;
            break;
        case 'change_pass':
            $txt = "UPDATE `member` SET `password` = '%s' WHERE `username` = '%s'";
            $sql = sprintf($txt, md5(mysqli_real_escape_string($db, $_POST['new_pass'])), $_SESSION['username']);
            mysqli_query($db, $sql);
            echo "Mật khẩu của bạn đã đổi thành công thành: ".$_POST['new_pass'];
            break;
    }
    die();
}

?>

<!DOCTYPE html>
<html style="font-family: Roboto, sans-serif;">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Tài Khoản - TB TEST</title>
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
     position: relative;left: -80px;
  }
  .b-halogo{
    position: relative;left: -45px;
  }
    .b-ql{
         position: relative;right:  -85px;
    }
    .b-taode{
         position: relative;right: -40px;
    }
    .b-qlchung{
        position: relative;right: 6px;
    }
}
</style>
</head>

<body style="font-family: Roboto, sans-serif;">
    <header class="masthead bg-primary text-white text-center">
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-md" style="display: inline-block;">
                <div class="container-fluid">
                    <span class="nav-item" role="presentation">
                                <div id="home" style="cursor: pointer;" class="b-home card binh">
                                    <div class=" card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/logo.png" style="width: 60px;height: 60px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="top:5px;position: relative; color: #272679; font-size: 1.8rem; font-weight: bold;">TB TEST</a></div>
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
                                <div id="dedalam" style="cursor: pointer;" class="b-qlchung card binh">
                                    <div class="card-body py-0 px-0" ><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/1.png" style="width: 60px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="font-size: 1.3rem; position: relative;top: 4px; font-weight: bold; ">ĐỀ ĐÃ LÀM</a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="taode" class="b-taode card binh" style="cursor: pointer;">
                                    <div id="lamde" class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/2.png" style="width: 60px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="font-size: 1.3rem; position: relative;top: 4px;font-weight: bold;">LÀM ĐỀ</a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="quanlitaikhoan" style="cursor: pointer;" class="b-ql card  binh">
                                    <div class="card-body py-0 px-0"><a class="card-link text-dark ml-3 mr-1 d-none d-xl-inline-block" href="#" style="font-size: 1.3rem;position: relative;top: 4px; font-weight: bold;">TÀI KHOẢN</a><img class="my-2 mr-3 my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/5.png" style="width: 60px;"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <div class="card" id="style-7" style="overflow-y: auto;">
                <div class="card-body" style="height: 74vh; text-align: left;">
                    <div style="margin: 20px 20px 20px 20px">
                        <h3>Quản lí tài khoản</h3>
                        <b>Hãy cập nhật đầy đủ thông tin</b><br><br>
                        <?php
                        $user=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `member` WHERE `username`='".$_SESSION['username']."'"));
                        ?>
                        <b>Tên: </b> <?php echo $user['name'] ?>&nbsp<input id="change_name" class="btn btn-secondary font-weight-bold" type="submit" style="width: 7rem;border-radius: 10px;height: 2.2rem;font-family: Quicksand, sans-serif;background: #ff7551;border: none;" value ="Đổi tên"><br>
                        <b>Email khôi phục: </b> <?php echo $user['email'] ?>&nbsp<input id="change_email" class="btn btn-secondary font-weight-bold" type="submit" style="width: 7rem;border-radius: 10px;height: 2.2rem;font-family: Quicksand, sans-serif;background: #ff7551;border: none;" value ="Đổi Email"><br>
                        <b>Loại tài khoản: </b> <?php if ($user['type']=='giaovien') echo 'Giáo viên'; else echo 'Học sinh'; ?><br>
                        <b>Mật khẩu: </b>&nbsp
                        <input id="change_pass" name="create" class="btn btn-secondary font-weight-bold" type="submit" style="width: 7rem;border-radius: 10px;height: 2.2rem;font-family: Quicksand, sans-serif;background: #ff7551;border: none;" value ="Đổi MK">
                        <br>
                        <form method="POST">
                            <input id="logout" name="logout" class="btn btn-secondary font-weight-bold" type="submit" style="position: absolute;bottom: 30px;width: 7rem;border-radius: 10px;height: 2.2rem;font-family: Quicksand, sans-serif;background: #ff7551;border: none;" value ="Đăng xuất">
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
    <!-- <script src="../../assets/js/freelancer.js"></script> -->
    <script src="https://unpkg.com/@bootstrapstudio/bootstrap-better-nav/dist/bootstrap-better-nav.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="function.js"></script>
    <script>
        $('#change_name').click(function(){
            Swal.fire({
              title: 'Nhập tên hiển thị mới của bạn',
              input: 'text',
              inputAttributes: {
                autocapitalize: 'off'
              },
              showCancelButton: true,
              confirmButtonText: 'OK',
              showLoaderOnConfirm: true,
              preConfirm: (login) => {
                $.post("quanlitaikhoan.php", {submit:'change_name', new_name:login}, data=>{
                    Swal.fire({type: 'success',title: 'Thành công!',text: data}).then(results=>{
                        location.assign("");
                    });
                });
              },
              allowOutsideClick: () => !Swal.isLoading()
            })
        })
        $('#change_email').click(function(){
            Swal.fire({
              title: 'Nhập email khôi phục mới của bạn',
              input: 'email',
              inputAttributes: {
                autocapitalize: 'off'
              },
              showCancelButton: true,
              confirmButtonText: 'OK',
              showLoaderOnConfirm: true,
              preConfirm: (login) => {
                $.post("quanlitaikhoan.php", {submit:'change_email', new_email:login}, data=>{
                    Swal.fire({type: 'info',title: 'Thông báo!',text: data}).then(results=>{
                        location.assign("");
                    });
                });
              },
              allowOutsideClick: () => !Swal.isLoading()
            })
        })
        $('#change_pass').click(function(){
            Swal.fire({
              title: 'Nhập mật khẩu mới của bạn',
              input: 'password',
              inputAttributes: {
                autocapitalize: 'off'
              },
              showCancelButton: true,
              confirmButtonText: 'OK',
              showLoaderOnConfirm: true,
              preConfirm: (login) => {
                $.post("quanlitaikhoan.php", {submit:'change_pass', new_pass:login}, data=>{
                    Swal.fire({type: 'success',title: 'Thành công!',text: data}).then(results=>{
                        location.assign("");
                    });
                });
              },
              allowOutsideClick: () => !Swal.isLoading()
            })
        })
    </script>
</body>

</html>