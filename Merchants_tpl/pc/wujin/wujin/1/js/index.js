$(window).load(function(){
	$(".hotconleft ul li:nth-child(1)").addClass("on");
	$("#piclist ul:nth-child(1)").show();
	$(".hotconleft ul li").mousemove(function() {
		$(this).addClass("on").siblings("li").removeClass("on")
	})
	$(".bannerleft a").mousemove(function() {
		$(this).removeClass("leave")
		$(this).addClass("on");
	})
	$(".bannerleft a").mouseleave(function() {
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	$(".aboutconright a").mousemove(function() {
		$(this).removeClass("leave")
		$(this).addClass("on");
	})
	$(".aboutconright a").mouseleave(function() {
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	$(".cstlayer a").mousemove(function() {
		$(this).siblings("span").removeClass("leave");
		$(this).siblings("span").addClass("on");
	})
	$(".cstlayer .hov").mouseleave(function() {
		$(this).removeClass("on");
		$(this).addClass("leave");
	})

	$("#pictitle ul li").mousemove(function(){
		var num = $(this).index();
		$("#piclist ul").eq(num).show().siblings("ul").hide();
	})
})
$(document).ready(function(){
	if(!$("#piclist ul").html()){
		$(".hotcakes").hide();
	}else{
		$(".hotcakes").show();
	}

	if(!$("#newscon ul li").html()){
		$("#newshov").hide();
	}else{
		$("#newshov").show();
	}
})

