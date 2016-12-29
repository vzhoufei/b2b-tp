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

    //product
    var bool = true;
    var win = $(".recommend ul li").width();         
    $(".recommend .prev").click(function(){
        if(bool){
            bool = false;
            $(".recommend ul").prepend($(".recommend ul li:last-child"));
            $(".recommend ul").css("margin-left",-win+'px');
            $(".pic ul").stop().animate({"marginLeft":"0"},300,function(){
                bool=true;
            })                  
        }       
    })
    $(".recommend .next").click(function(){
        if(bool){
            bool = false;
            $(".recommend ul").stop().animate({"marginLeft":-win+'px'},300,function(){
                $(".recommend ul").append($(".recommend ul li:first-child"));
                $(".recommend ul").css("margin-left","0");
                bool = true;
            })
        }           
    })  
	
});


 //相册
    function photo(ids){   
        var scrollPic_02 = new ScrollPic();
        scrollPic_02.scrollContId   = "scrollCont_"+ids; //内容容器ID
        scrollPic_02.arrLeftId      = "scrollArrLeft_"+ids;//左箭头ID
        scrollPic_02.arrRightId     = "scrollArrRight_"+ids; //右箭头ID
        scrollPic_02.frameWidth     = 880;//显示框宽度
        scrollPic_02.pageWidth      = 220; //翻页宽度
        scrollPic_02.speed          = 10; //移动速度(单位毫秒，越小越快)
        scrollPic_02.space          = 10; //每次移动像素(单位px，越大越快)
        scrollPic_02.autoPlay       = false; //自动播放
        scrollPic_02.autoPlayTime   = 5; //自动播放间隔时间(秒)
        scrollPic_02.initialize(); //初始化
    };