<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

	if (isset($_GET['code'])){
		require 'connect.php';
		session_start();
		if (isset($_SESSION['username'])) {
			$code = mysqli_real_escape_string($db, $_GET['code']);
			$username = mysqli_real_escape_string($db, $_SESSION['username']);
			$txt = "SELECT * FROM `ha_member` WHERE `auth_code`='%s' AND `username` = '%s' LIMIT 1";
			$sql = sprintf($txt, $code, $username);
			echo $sql;
			$results = mysqli_query($db, $sql);

			if (mysqli_num_rows($results) == 1) {
				$results = mysqli_fetch_assoc($results);
				mysqli_query($db, "UPDATE `ha_member` SET `auth_code` = '' WHERE `auth_code` = '".$code."'");
				if ($results['type'] == "hocsinh")
				    header('location: index3.html');
				if ($results['type'] == "giaovien")
				    header('location: index2.html');
			} else {
				// header("Location: auth.php?error=1");
			}
		}
	}
	
?>