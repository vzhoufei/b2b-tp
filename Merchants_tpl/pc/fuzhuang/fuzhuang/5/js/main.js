$(function(){
	$('.index_product .product').eq(0).css('display','block');
	$('.index_product .nav li').eq(0).addClass('active');
	$('.index_product .nav li').click(function(){
		$(this).addClass('active').siblings().removeClass('active');
		$('.index_product .product').hide().eq($(this).index()).show();
	});
	
	
	//首页mybanner轮播
    var winW=$(".mybanner").width();
    var len=$('.mybanner li').length;
    var lun=null;
    var index=0;
    var bool=true;
    var num=-(len-2)*parseInt(winW);
    for(var i=0;i<len;i++)
    {
        $('.mybanner li').eq(i).css('left',i*winW+'px');
    }
    $(".mybanner>a.next").click(function () {
    	if(bool){
    		bool=false;
	    	if(parseInt($(".mybanner ul").position().left)<num){
	    	$(".mybanner ul li:first-child").appendTo($(".mybanner ul"));
	    	$(".mybanner ul").stop(false,true).css({left:num+'px'});
	    	 for(var i=0;i<len;i++)
			    {
			        $('.mybanner li').eq(i).css('left',i*winW+'px');
			    }
	    	}
	    	$(".mybanner ul").stop(false,true).animate({left:'-='+winW+'px'},300,function () {
	    		bool=true;
	    	});	
    	}
    })
    $(".mybanner>a.prev").click(function () {
    	if(bool){
    		bool=false;
	    	if(parseInt($(".mybanner ul").position().left)==0){
	    	$(".mybanner ul li:last-child").prependTo($(".mybanner ul"));
	    	$(".mybanner ul").stop(false,true).css({left:'-'+winW+'px'});
	    	 for(var i=0;i<len;i++)
			    {
			        $('.mybanner li').eq(i).css('left',i*winW+'px');
			    }
	    	}
	    	$(".mybanner ul").stop(false,true).animate({left:'+='+winW+'px'},300,function  () {
	    		bool=true;
	    	});
	    }
    })
    move();
    function move(){
        lun=setInterval(function () {
           if(parseInt($(".mybanner ul").position().left)<num){
            	$(".mybanner ul li:first-child").appendTo($(".mybanner ul"));
            	$(".mybanner ul").stop(false,true).css({left:num+'px'});
            	for(var i=0;i<len;i++)
			    {
			        $('.mybanner li').eq(i).css('left',i*winW+'px');
			    }
            }
            $(".mybanner ul").stop(false,true).animate({left:'-='+winW+'px'},300);
        },4000)
    }
     $(".mybanner").hover(function () {
     	clearInterval(lun);
     	$(".mybanner>a.prev").fadeIn(300);
     	$(".mybanner>a.next").fadeIn(300);
     },function () {
     	move();
     	$(".mybanner>a.prev").fadeOut(300);
     	$(".mybanner>a.next").fadeOut(300);
     })
     
     
	
});
