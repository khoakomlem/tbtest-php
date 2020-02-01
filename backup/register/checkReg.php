<?php
require '../connect.php';
session_start();
$signup = array('name', 'type', 'username', 'password', 'email');
if (isset($_POST['signup'])){
    $ok = true;
    foreach ($signup as $value)
        if (!isset($_POST[$value]))
            $ok = false;
    if ($ok){
        $name = mysqli_real_escape_string($db, $_POST['name']);
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = md5($_POST['password']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $type = mysqli_real_escape_string($db, $_POST['type'])==1?"giaovien":"hocsinh";

        //check trùng user
        $txt = "SELECT * FROM `ha_member` WHERE `username`='%s' OR `email`='%s'";
        $sql = sprintf($txt, $username, $email);
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) == 1) {
            $t = mysqli_fetch_assoc($results);
            if ($t['username'] == $username)
                $error ="Trùng tên tài khoản trước đây";
            if ($t['email'] == $email)
                $error ="Email này đã được dùng!";
        } else {
            $txt = "INSERT INTO `ha_member` (`id`, `name`, `username`, `password`, `email`, `type`) VALUES ('%s', '%s', '%s', '%s', '%s', '%s')";
            $sql = sprintf($txt, 'NULL', $name, $username, $password, $email, $type);
            mysqli_query($db, $sql);
            // $_SESSION['username'] = $username;
            //logout
            setcookie("num", null, -1);
            if (isset($_COOKIE['taocauhoi']))
            foreach ($_COOKIE['taocauhoi'] as $name => $value) {
                setcookie("taocauhoi[".$name."]", null, -1);
            }
            session_destroy();
            $mess = "Bạn cần xác thực email để tiếp tục!!";
            require '../mailer/SendMail.php';
            $code = strtoupper(md5(uniqid(rand())));
            mysqli_query($db, "UPDATE `ha_member` SET `email_auth`='".$code."' WHERE `username` = '".$username."' LIMIT 1");

            $file = implode("<br>", explode("\n", file_get_contents('../mailer/email_auth.txt')));
            $body = sprintf($file, $username, 'http://14.183.182.171/HATEST/email_auth.php?code='.$code, $email);
            sendMail($email, $body);
        }
        //

        
    } else {
        $error = "You must fill all the blank!";
    }
}
?>