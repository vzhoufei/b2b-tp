$(function(){

	//监听导航部分下拉
	$('.headerMR >ul li').bind('mouseover',function(){
		$('.headerMR >ul li').children('div').hide();
		$(this).children('div').show();
	});

	$('.headerMR >ul li').bind('mouseout',function(){
		$('.headerMR >ul li').children('div').hide();
	});

	//监听搜索框部分下拉
	$('.seach').bind('mouseover',function(){
		$('.hnavoneRo1').slideDown();
	});
	
	$('.hnavoneRo1').bind('mouseout',function(){
		$('.hnavoneRo1').slideUp();
	});
	
	//监听右边固定滚动条
	$('.sidebarA >ul li').bind('mouseover',function(){
		$(this).children('img').toggleClass("sidebarAba");
	});

	$('.sidebarA >ul li').bind('mouseout',function(){
		$(this).children('img').toggleClass("sidebarAba");
	});

	// $('.sidebarB >ul li').bind('mouseover',function(){
	// 	$(this).children('img').toggleClass("sidebarBbc");
	// });

	// $('.sidebarB >ul li').bind('mouseout',function(){
	// 	$(this).children('img').toggleClass("sidebarBb");
	// });
	$('.sidebarC').bind('click',function(){
		$('.sidebar').hide();
	});





	//监听主题部分导航下拉
	$('.top_nav_bar>ul li').bind('mouseover',function(){
		// $('.top_nav_bar >ul li').children('div').hide();
		$(this).children('div').show();		
	});
	$('.top_nav_bar>ul li').bind('mouseout',function(){
		// $('.top_nav_bar >ul li').children('div').hide();
		$(this).children('div').hide();		
	});


	//主页下轮播图
	$(document).ready(function(){

	$(".main_visual").hover(function(){
		$("#btn_prev,#btn_next").fadeIn()
	},function(){
		$("#btn_prev,#btn_next").fadeOut()
	});
	
	$dragBln = false;
	
	$(".main_image").touchSlider({
		flexible : true,
		speed : 200,
		btn_prev : $("#btn_prev"),
		btn_next : $("#btn_next"),
		paging : $(".flicking_con a"),
		counter : function (e){
			$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
		}
	});
	
	$(".main_image").bind("mousedown", function() {
		$dragBln = false;
	});
	
	$(".main_image").bind("dragstart", function() {
		$dragBln = true;
	});
	
	$(".main_image a").click(function(){
		if($dragBln) {
			return false;
		}
	});
	
	timer = setInterval(function(){
		$("#btn_next").click();
	}, 5000);
	
	$(".main_visual").hover(function(){
		clearInterval(timer);
	},function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		},5000);
	});
	
	$(".main_image").bind("touchstart",function(){
		clearInterval(timer);
	}).bind("touchend", function(){
		timer = setInterval(function(){
			$("#btn_next").click();
		}, 5000);
	});
	
});






















});