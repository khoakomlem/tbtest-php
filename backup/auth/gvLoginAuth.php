<?php 
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	require '../../connect.php';
	
	if (!isset($_SESSION['username'])){
		echo "Bạn chưa đăng nhập!<br>Bấm <a href='../../'>vào đây</a> để về trang chủ!";
		exit();
	}

	$result = mysqli_query($db, "SELECT * FROM `ha_member` WHERE `username`='".$_SESSION['username']."'");
	if (mysqli_num_rows($result) == 1){
		$t = mysqli_fetch_assoc($result);
		if ($t['email_auth'] != ''){
			echo "Bạn chưa xác thực gmail của bạn!";
			exit();
		}
		if ($t['type'] != 'giaovien'){
			echo "Bạn không phải là giáo viên nên không thể vào trang của giáo viên!<br>Bấm <a href='../../'>vào đây</a> để về trang chủ!";
			exit();
		}
	} else {
		echo "Something went wrong :( <br> Nhấp <a href='../../'>vào đây</a> để đăng nhập lại";
		exit();
	}
?>