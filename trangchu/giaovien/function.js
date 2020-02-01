$(document).ready(function() {
	$("#quanlichung").attr("onclick", "location.assign('.');");
	$("#taode").attr("onclick", "location.assign('taode.php');");
	$("#quanlitaikhoan").attr("onclick", "location.assign('quanlitaikhoan.php');");
	$("#home").attr("onclick", "location.assign('../../');");
	$("#tranbien").attr("onclick", "window.open('https://www.facebook.com/TBhighschool.DongNai/');");
	$('body').css("overflow", "hidden");
	var url = window.location.href;
	var idinput = url.substring(url.lastIndexOf("/") + 1, url.lastIndexOf(".php"));
	$('#'+idinput).css('background-color', '#a9d1af');
	$('#'+idinput).css('border-color', '#a9d1af');
})