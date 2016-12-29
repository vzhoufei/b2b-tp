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

	$(".other>.mg>ul>li>img").addClass("wow flip");



	$(".pro_nav>ul>li:nth-child(1)").addClass("on");
	$(".pro_right>ul:nth-child(1)").show();
	$(".pro_nav>ul>li").click(function(){
		$(this).addClass("on").siblings("li").removeClass("on");
		var pronavli = $(this).index();
		$(".pro_right>ul").eq(pronavli).show().siblings("ul").hide();
	})
	
	$(".aboutleft>a").hover(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".aboutleft>a").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	
	$(".article>a").hover(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".article>a").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	
	if(!$(".products .pro_right ul").html()){
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











