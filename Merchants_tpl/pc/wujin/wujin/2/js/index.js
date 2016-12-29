$(document).ready(function() {
	$(".banner .hd li").eq(0).addClass("on");
	var winW = $(window).width();
	var a = 0;
	var num = $(".banner .bd li").length;
	var bool = true;
	for(var i = 0; i < num; i++) {
		$(".banner .bd li").eq(i).css({
			"left": winW * i + "px"
		});
	}
	$(".banner .hd li").click(function() {
		$(this).addClass("on").siblings().removeClass("on")
		var len = $(this).index();
		$(".banner .bd").stop(false, true).animate({
			left: -winW * len + "px"
		}, 700);
		return a = len;
	})
	$(".banner").mouseover(function() {
		clearInterval(lun);
	})
	$(".banner").mouseout(function() {
		show();
	})

	function show() {
		lun = setInterval(function() {
			a = a + 1;
			if(a >= num) {
				a = 0;
			}
			$(".banner .bd").stop(false, true).animate({
				left: -winW * a + "px"
			}, 700);
			$(".banner .hd li").eq(a).addClass("on").siblings().removeClass("on");
		}, 3000)
	}
	show();

	if(!$(".products .prospic ul").html()){
		$(".products").hide();
	}else{
		$(".products").show();
	}

	if(!$(".news .newleftcon ul li").html()){
		$("#newshov").hide();
	}else{
		$("#newshov").show();
	}
	

})
$(document).ready(function(){
	var numpic = $(".prostop>ul>li").length;
	$(".prostop>ul>li").width(1200/numpic);
	$(".prostop>ul>li:nth-child(1)").addClass("on");
	$(".prospic>ul:nth-child(1)").show();
})

$(function(){ 
	$(".copywrite>a").hover(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".copywrite>a").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	$(".cstlayer>.mg>ul>li>.text").hover(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".cstlayer>.mg>ul>li>.text").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	$(".cstlayer>.mg>ul>li>.img").mousemove(function(){
		$(this).siblings(".imghov").stop(true,true).fadeIn(300)
	})
	$(".cstlayer>.mg>ul>li>.imghov").mouseleave(function(){
		$(this).stop(true,true).fadeOut(300);
	})
	
	$("#proscon>.prostop>ul>li").mousemove(function(){
		$(this).addClass("on").siblings("li").removeClass("on");
		var pic = $(this).index();
		$("#proscon>.prospic>ul").eq(pic).show().siblings("ul").hide();
	})
	
	$(".prosbtn>a").mousemove(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".prosbtn>a").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	$(".aboutfont>a").mousemove(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".aboutfont>a").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	$(".newleftbtn").mousemove(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".newleftbtn").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	$(".newrightbtn").mousemove(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".newrightbtn").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
})


