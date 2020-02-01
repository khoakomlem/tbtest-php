$(document).ready(function() {

	$("#lamde").attr("onclick", "location.assign('index.php');");

	$("#dedalam").attr("onclick", "location.assign('dedalam.php');");
	
	$("#hatest").attr("onclick", "location.assign('dedalam.php');");

	// $('#hastudents').attr("onclick", "location.assign('https://www.hastudents.com/');");

	$("#quanlitaikhoan").attr("onclick", "location.assign('quanlitaikhoan.php');");

	$('body').css("overflow", "hidden");

	var d = false;
	if (window.location.href.includes('lambai'))
	setInterval(()=>{
	    time--;
	    if (time<0 && !d){
	    	d = true;
	        Swal.fire({position: 'top-end',type: 'info',title: 'Đã hết thời gian làm bài!!! Trang sẽ tự động chuyển hướng sau 5 giây',showConfirmButton: true,timer: 5000});
	        setTimeout(function(){
	        	location.assign('lambai.php');
	        }, 5000);
	    }
	    if (time<0) time=0;
	    let min = Math.floor(time/60);
	    let sec = time - (min*60);
	    $('#timeleft').html(min+' phút '+sec+' giây');
	}, 1000);
})