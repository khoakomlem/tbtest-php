<?php 
require "../../auth/hsLoginAuth.php";
require '../../connect.php';

if (isset($_POST['logout'])){
    setcookie("num", null, -1);
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
            $txt = "UPDATE `ha_member` SET `name` = '%s' WHERE `username` = '%s'";
            $sql = sprintf($txt, mysqli_real_escape_string($db, $_POST['new_name']), $_SESSION['username']);
            mysqli_query($db, $sql);
            echo "Tên hiển thị của bạn đã đổi thành công thành: ".$_POST['new_name'];
            break;
        
        case 'change_email':
            $txt = "UPDATE `ha_member` SET `email` = '%s' WHERE `username` = '%s'";
            $sql = sprintf($txt, mysqli_real_escape_string($db, $_POST['new_email']), $_SESSION['username']);
            mysqli_query($db, $sql);
            echo "Email của bạn đã đổi thành công thành: ".$_POST['new_email'];
            break;
        case 'change_pass':
            $txt = "UPDATE `ha_member` SET `password` = '%s' WHERE `username` = '%s'";
            $sql = sprintf($txt, md5(mysqli_real_escape_string($db, $_POST['new_pass'])), $_SESSION['username']);
            mysqli_query($db, $sql);
            echo "Mật khẩu của bạn đã đổi thành công thành: ".$_POST['new_pass'];
            break;
    }
    die();
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
                                <div style="cursor: pointer;" id="lamde" class="card mr-4 binh">
                                    <div class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/2.png" style="width: 50px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="font-weight: bold;">Làm đề</a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div id="quanlitaikhoan" style="cursor: pointer;background-color: black;" class="card mr-4 binh">
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
                <div class="card-body" style="height: 74vh; text-align: left;">
                    <div style="margin: 20px 20px 20px 20px">
                        <h3>Quản lí tài khoản</h3>
                        <b>Hãy cập nhật đầy đủ thông tin</b><br><br>
                        <?php 
                        $user=mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `ha_member` WHERE `username`='".$_SESSION['username']."'"));
                        ?>
                        <b>Tên: </b> <?php echo $user['name'] ?>&nbsp<input id="change_name" class="btn btn-secondary font-weight-bold" type="submit" style="width: 7rem;border-radius: 10px;height: 2rem;font-family: Quicksand, sans-serif;background: #ff7551;border: none;" value ="Đổi tên"><br>
                        <b>Email khôi phục: </b> <?php echo $user['email'] ?>&nbsp<input id="change_email" class="btn btn-secondary font-weight-bold" type="submit" style="width: 7rem;border-radius: 10px;height: 2rem;font-family: Quicksand, sans-serif;background: #ff7551;border: none;" value ="Đổi Email"><br>
                        <b>Loại tài khoản: </b> <?php if ($user['type']=='giaovien') echo 'Giáo viên'; else echo 'Học sinh'; ?><br>
                        <b>Mật khẩu: </b>&nbsp
                        <input id="change_pass" name="create" class="btn btn-secondary font-weight-bold" type="submit" style="width: 7rem;border-radius: 10px;height: 2rem;font-family: Quicksand, sans-serif;background: #ff7551;border: none;" value ="Đổi MK">    
                        <br>
                        <form method="POST">
                            <input id="logout" name="logout" class="btn btn-secondary font-weight-bold" type="submit" style="position: absolute;bottom: 30px;width: 7rem;border-radius: 10px;height: 2rem;font-family: Quicksand, sans-serif;background: #ff7551;border: none;" value ="Đăng xuất">    
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
                    Swal.fire({type: 'success',title: 'Thành công!',text: data}).then(results=>{
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