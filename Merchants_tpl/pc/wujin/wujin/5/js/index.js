$(function  () {
	//首页banner轮播
    var winW=$(".banner").width();
    var len=$('.banner li').length;
    var lun=null;
    var index=0;
    var bool=true;
    var num=-(len-2)*parseInt(winW);
    for(var i=0;i<len;i++)
    {
        $('.banner li').eq(i).css('left',i*winW+'px');
    }
    move();
    function move(){
        lun=setInterval(function () {
           if(parseInt($(".banner ul").position().left)<num){
            	$(".banner ul li:first-child").appendTo($(".banner ul"));
            	$(".banner ul").stop(false,true).css({left:num+'px'});
            	for(var i=0;i<len;i++)
			    {
			        $('.banner li').eq(i).css('left',i*winW+'px');
			    }
            }
            $(".banner ul").stop(false,true).animate({left:'-='+winW+'px'},800);
        },4000)
    }
     $(".banner").hover(function () {
     	clearInterval(lun);
     },function () {
     	move();
     })
})

$(document).ready(function(){
	var navlilength = $("#nav>ul>li").length
	if(navlilength>7){
		$("#nav>ul>li").width(1200/navlilength);
		$("#nav .mollanli").width(1200/navlilength);
		$("#nav .mollanlis").width(1200/navlilength);
		$("#nav .mollanlis").css('left',1200/navlilength+'px')
	}
	
	$(".searchfor_right>.right>a").hover(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".searchfor_right>.right>a").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	
	$(".artbtn").hover(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".artbtn").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	
	
	$(".proconleft>ul>li:nth-child(1)").addClass("on");
	$(".proconright>ul:nth-child(1)").show();
	$(".proconleft>ul>li").click(function(){
		$(this).addClass("on").siblings("li").removeClass("on");
		var numli = $(this).index();
		$(".proconright>ul").eq(numli).show().siblings("ul").hide();
	})
	
	var footernav = $(".footernav>ul>li").length
	$(".footernav>ul>li").width(1200/footernav)

	if(!$(".products .proconright ul").html()){
		$(".products").hide();
	}else{
		$(".products").show();
	}

	if(!$(".article .artcon ul li").html()){
		$(".article").hide();
	}else{
		$(".article").show();
	}
	
})




















