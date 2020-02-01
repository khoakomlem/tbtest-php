<?php
    require '../connect.php';
    session_start();
    
    $signin = array('username', 'password');

    if (isset($_SESSION['username'])) {
        $txt = "SELECT `type` FROM `member` WHERE `username`='%s' LIMIT 1";
        $sql = sprintf($txt, $_SESSION['username']);
        $results = mysqli_query($db, $sql);
        $type = mysqli_fetch_assoc($results)["type"];
        if ($type == "hocsinh")
            header('location: ../trangchu/hocsinh');
        if ($type == "giaovien")
            header('location: ../trangchu/giaovien');
    }

    $error="";

    if (isset($_POST['login'])){
        $ok = true;
        foreach ($signin as $value)
            if (!isset($_POST[$value]))
                $ok = false;
        if ($ok){
            $username = mysqli_real_escape_string($db, $_POST['username']);
            $password = md5($_POST['password']);

            $txt = "SELECT * FROM `member` WHERE `username`='%s' AND `password`='%s' LIMIT 1";
            $sql = sprintf($txt, $username, $password);
            $results = mysqli_query($db, $sql);
            if (mysqli_num_rows($results) == 1) { // login thanh cong
                $t = mysqli_fetch_assoc($results);
                if ($t['email_auth'] != ''){
                    echo "Bạn chưa xác thực gmail của bạn!";
                    exit();
                }
                $_SESSION['username'] = $username;
                $type = $t["type"];
                if ($type == "hocsinh")
                    header('location: ../trangchu/hocsinh');
                if ($type == "giaovien")
                    header('location: ../trangchu/giaovien');
            } else {
                $error = "Wrong username/password?!?";
            }
        } else {
            $error = "You must fill all the blank!";
        }
    }
    $_SESSION['error'] = $error;
?>