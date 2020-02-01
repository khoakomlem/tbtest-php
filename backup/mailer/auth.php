<?php
	if (isset($_GET['error'])){
		if ($_GET['error'] == 1) {
			echo "<script>alert('Gmail của bạn chưa được xác minh?!?')</script>";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Xác minh</title>
	<meta charset="utf-8">
</head>
<body>
	<div style="text-align: center;">
		<h2> Bạn cần xác minh gmail để tiếp tục đăng nhập!! </h2>
	</div>
</html>