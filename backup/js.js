$(document).ready(function() {
	$("#teacher_log").click(()=> {
		location.assign('login/index.php?val=1');
	})
	$("#teacher_reg").click(()=> {
		location.assign('register/index.php?val=1');
	})
	$("#student_log").click(()=> {
		location.assign('login/index.php?val=2');
	})
	$("#student_reg").click(()=> {
		location.assign('register/index.php?val=2');
	})
})