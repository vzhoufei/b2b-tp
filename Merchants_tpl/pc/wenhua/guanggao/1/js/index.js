$(function(){
	//nav
	$(".header .nav ul li").mouseover(function(){
		$(this).children("dl").stop().show();			
	});
	$(".header .nav ul li").mouseout(function(){
		$(this).children("dl").stop().hide();			
	});
	$(".header .nav ul li dd").mouseover(function(){
		$(this).children("ul").stop().show();			
	});
	$(".header .nav ul li dd").mouseout(function(){
		$(this).children("ul").stop().hide();			
	});
	//banner		
	$(".ban .hd li").eq(0).addClass("on");
	var winW=$(document).width();
	var a=0;
	var num=$(".ban .bd li").length;
	var bool=true;
	for(var i=0;i<num;i++){
		$(".ban .bd li").eq(i).css({"left":winW*i+"px"});
	}
	$(".ban .hd li").click(function(){
		$(this).addClass("on").siblings().removeClass("on")
		var len=$(this).index();
		$(".ban .bd").stop(false,true).animate({left:-winW*len+"px"},700);
		return a=len;
	})
	
	//pic动画
	$(".ban").mouseover(function(){
		clearInterval(lun);
	})
	$(".ban").mouseout(function(){
		show();
	})
	function show(){
		lun=setInterval(function(){
			a=a+1;
			if(a>=num){
				a=0;
			}
			$(".ban .bd").stop(false,true).animate({left:-winW*a+"px"},700);
			$(".ban .hd li").eq(a).addClass("on").siblings().removeClass("on");
		},3000)
	}
	show();	
	//pic_nav
	$('.pic_nav ul li').eq(0).addClass("on");
	$('.pic_tab ul').eq(0).addClass("show");
	$('.pic_nav ul li').hover(function(){
		$(".con .pic_tab ul li img").removeClass("leave");
		$(".con .pic_tab ul li img").removeClass("on");
		var i=$(this).index();
		$('.pic_nav ul li').eq(i).addClass("on").siblings().removeClass("on");
		$('.pic_tab ul').eq(i).addClass("show").siblings().removeClass("show");
	})

	$(".con .pic_tab ul li img").hover(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".con .pic_tab ul li img").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})


	//动画插件
	if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
		new WOW().init();
	};
	
	
})