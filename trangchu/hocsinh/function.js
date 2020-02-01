$(document).ready(function() {

	$("#lamde").attr("onclick", "location.assign('.');");

	$("#dedalam").attr("onclick", "location.assign('dedalam.php');");
	
	$("#home").attr("onclick", "location.assign('../../');");

	$('#tranbien').attr("onclick", "window.open('https://www.facebook.com/TBhighschool.DongNai/');");

	$("#quanlitaikhoan").attr("onclick", "location.assign('quanlitaikhoan.php');");

	$('body').css("overflow", "hidden");

	var d = false;
	var url = window.location.href;
	if (url.includes('lambai'))
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

		var idinput = url.substring(url.lastIndexOf("/") + 1, url.lastIndexOf(".php"));
		$('#'+idinput).css('background-color', '#a9d1af');
		$('#'+idinput).css('border-color', '#a9d1af');
})