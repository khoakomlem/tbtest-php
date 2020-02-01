<?php 
require '../../auth/hsLoginAuth.php';
require '../../connect.php';
$result = mysqli_query($db, "SELECT `test` FROM `ha_member` WHERE `username`='".$_SESSION['username']."'");
if (mysqli_fetch_assoc($result)['test']!=""){
    header("Location: lambai.php");
}
?>

<!DOCTYPE html>
<html style="font-family: Roboto, sans-serif;">

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

<body style="font-family: Roboto, sans-serif;">
    <header class="masthead bg-primary text-white text-center" style="background-position: top;background-size: cover;background-repeat: no-repeat;height: 120vh;background-image: url(&quot;../../assets/img/bg-home.png&quot;);">
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
                                <div id="dedalam" style="cursor: pointer;" class="card mr-4 binh">
                                    <div class="card-body py-0 px-0"><img class="my-2 mr-md-3 mr-lg-3 mx-3" src="../../assets/img/1.png" style="width: 50px;"><a class="card-link mr-3 d-none d-xl-inline-block" href="#" style="font-weight: bold;">Đề đã làm</a></div>
                                </div>
                            </li>
                            <li class="nav-item" role="presentation">
                                <div style="cursor: pointer;background-color: black" id="lamde" class="card mr-4 binh">
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
                <div class="card-body" style="height: 74vh;/*display: flex;*//*justify-content: center;*/">
                    <div class="row">
                        <div class="col" style="font-family: Quicksand, sans-serif;text-align: center;">
                            <form method="GET">
                                <h1 style="color: rgb(0,0,0);font-family: Quicksand, sans-serif;font-size: 50px;">Làm đề</h1>
                                <p class="text-muted px-3" style="font-family: Quicksand, sans-serif;float: left;font-size: 25px;display: block;width: 100%;">Bạn sẽ được giáo viên cung cấp 1 mã đề, sau đó nhập nó vào ô bên dưới để bắt đầu làm bài</p>
                                <p class="mb-4"><span class="font-weight-bolder mr-2" style="color: rgb(0,0,0);font-size: 54px;">Mã đề</span><input maxlength="6" name="id" value="<?php echo isset($_GET['id'])?$_GET['id']:'' ?>" class="form-control-lg p-2 mt-4" type="text" style="background-color: rgb(233,231,231);border: none;border-radius: 10px;position: relative;top: -14px;font-size: 25px;text-transform: uppercase;"
                                        autocomplete="off"></p><input class="btn btn-primary mt-5" type="submit" style="font-size: 26px;" value="Làm bài thi">
                            </form>
                        </div>
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
    <?php 
    // print_r($_SESSION['error']);

    if (isset($_GET['id'])){
        $id = strtoupper(mysqli_real_escape_string($db, $_GET['id']));
        $result = mysqli_query($db, "SELECT `i` FROM `test` WHERE `id`='".$id."'");
        if (mysqli_num_rows($result) == 1){
            $t = json_decode(mysqli_fetch_assoc(mysqli_query($db, "SELECT `thongtin` FROM `ha_member` WHERE `username`='".$_SESSION['username']."'"))['thongtin'], true);
            $lamroi = false;
            foreach ($t as $key => $value) {
                if ($value['id'] == $id){
                    echo "<script>Swal.fire({type: 'error',title: 'Oops...',text: 'Bạn đã làm đề ".$id." này rồi!'})</script>";
                    $lamroi = true;
                    break;
                }
            }
            if (!$lamroi)
            echo "<script>Swal.fire({type: 'success',title: 'Great',text: 'Đã tìm thấy đề! (bấm ra ngoài để hủy)', confirmButtonText:'Làm bài!'}).then(result=>{if (result.value) {\$.post('xacnhanlambai.php?i=1', {'id':'".$id."'}).done(()=>location.assign('lambai.php'))}})</script>";
        } else {
            echo "<script>Swal.fire({type: 'error',title: 'Oops...',text: 'Không tìm thấy đề!'})</script>";
        }
    }
    ?>
</body>

</html>