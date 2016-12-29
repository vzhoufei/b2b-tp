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

     if(!$(".products .prolist ul").html()){
        $(".products").hide();;
     }else{
        $(".products").show();
     }

     if(!$(".article .arthot").html()){
        $(".article").hide();
     }else{
        $(".article").show();
     }



})

$(document).ready(function(){
	$(".pronavlist>ul>li:nth-child(1)").addClass("on");
	$(".proright>.prolist>ul:nth-child(1)").show();
	$(".pronavlist>ul>li").click(function(){
		$(this).addClass("on").siblings("li").removeClass("on");
		var numlist = $(this).index();
		$(".proright>.prolist>ul").eq(numlist).show().siblings("ul").hide();
	})
	
	$(".aboutconright>a").hover(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".aboutconright>a").mouseleave(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	
	var footernavwidth = $(".footernav>ul>li").length;
	$(".footernav>ul>li").width(989/(footernavwidth+1));
})





