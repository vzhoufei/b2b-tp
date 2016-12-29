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
	$(".banner .hd li").eq(0).addClass("on");
	var winW=$(document).width();
	var a=0;
	var num=$(".banner .bd li").length;
	var bool=true;
	for(var i=0;i<num;i++){
		$(".banner .bd li").eq(i).css({"left":winW*i+"px"});
	}
	$(".banner .hd li").click(function(){
		$(this).addClass("on").siblings().removeClass("on")
		var len=$(this).index();
		$(".banner .bd").stop(false,true).animate({left:-winW*len+"px"},700);
		return a=len;
	})
	
	//pic动画
	$(".banner").mouseover(function(){
		clearInterval(lun);
	})
	$(".banner").mouseout(function(){
		show();
	})
	function show(){
		lun=setInterval(function(){
			a=a+1;
			if(a>=num){
				a=0;
			}
			$(".banner .bd").stop(false,true).animate({left:-winW*a+"px"},700);
			$(".banner .hd li").eq(a).addClass("on").siblings().removeClass("on");
		},3000)
	}
	show();	

	
	
	if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
		new WOW().init();
	};
	
})