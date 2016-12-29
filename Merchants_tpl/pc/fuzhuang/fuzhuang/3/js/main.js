$(function(){	
 
    $(".index_product ul").eq(0).css('display','block');
    $('.index_product .tip span').eq(0).addClass('active');
    $(".index_product .tip span").click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        $(".index_product ul").hide().eq($(this).index()).show();
    });

	//banner	
    var winW=$(document).width();
    var a=0;
    var num=$(".mybanner .bd li").length;
    var bool=true;
    for(var i=0;i<num;i++){
        $(".mybanner .bd li").eq(i).css({"left":winW*i+"px"});
    }   
    $('.mybanner .hd li').click(function(){
        $(this).addClass('on').siblings().removeClass('on');
        var index = $(this).index();
        $('.mybanner .bd').stop(false,true).animate({"left":-winW*index+"px"},700);
    });           
    $(".mybanner .next").click(function(){
        var ingA=$(".mybanner .hd li.on")
        var ing=ingA.index();
            if(bool){
                bool = false;
                if(ing<2){
                $(".mybanner .hd li").eq(ing).removeClass("on");
                $(".mybanner .hd li").eq(ing+1).addClass("on");
                $(".mybanner .bd").stop(false,true).animate({left:-winW*(ing+1)+"px"},700,function(){bool=true;});
            }else if(ing>=2){
                ing=0;
                $(".mybanner .hd li").eq(ing).addClass("on").siblings().removeClass("on");
                $(".mybanner .bd").stop(false,true).animate({left:-winW*ing+"px"},700,function(){bool=true;});
            }
        }
        
    })
    $(".mybanner .prev").click(function(){
        var ingA=$(".mybanner .hd li.on")
        var ing=ingA.index();
        if(bool){
            bool=false;
            if(ing>0){
            $(".mybanner .hd li").eq(ing).removeClass("on");
            $(".mybanner .hd li").eq(ing-1).addClass("on");
            $(".mybanner .bd").stop(false,true).animate({left:-winW*(ing-1)+"px"},700,function(){bool=true;});
        }else if(ing<=0){
            ing=2;
            $(".mybanner .hd li").eq(ing).addClass("on").siblings().removeClass("on");
            $(".mybanner .bd").stop(false,true).animate({left:-winW*ing+"px"},700,function(){bool=true;});
        }
        return a=ing;
        }
    })
    $(".mybanner").mouseover(function(){
        clearInterval(lun);
    })
    $(".mybanner").mouseout(function(){
        show();
    })
    function show(){
        lun=setInterval(function(){
            a=a+1;
            if(a>=num){
                a=0;
            }
            $(".mybanner .bd").stop(false,true).animate({left:-winW*a+"px"},700);
            $(".mybanner .hd li").eq(a).addClass("on").siblings().removeClass("on");
        },3000)
    }
    show();
	
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

     //search
    function submits(){
        var keywords = $('input[name=q]').val();
        if(!keywords){alert('请输入关键字');return;}
        window.location.href="{:U('Home/Store/search')}?store_id={$store[store_id]}&keywords="+keywords;
    };
    

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