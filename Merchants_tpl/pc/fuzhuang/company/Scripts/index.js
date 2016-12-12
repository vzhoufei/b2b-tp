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

	//产品显示
	$('.mian_goodO2B >ul li').bind('mouseover',function(){
		// alert('asaasas');
		$(this).children('.mian_goodO2BT').show();
	});

	$('.mian_goodO2B >ul li').bind('mouseout',function(){
		// alert('asaasas');
		$(this).children('.mian_goodO2BT').hide();
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
	
	// $(".main_image").touchSlider({
	// 	flexible : true,
	// 	speed : 200,
	// 	btn_prev : $("#btn_prev"),
	// 	btn_next : $("#btn_next"),
	// 	paging : $(".flicking_con a"),
	// 	counter : function (e){
	// 		$(".flicking_con a").removeClass("on").eq(e.current-1).addClass("on");
	// 	}
	// });
	
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
	

	if(document.getElementById('goodsShow')){
		//产品图切换
	var goodsShow = document.getElementById('goodsShow');
	var goodsUl = goodsShow.getElementsByTagName('ul')[0];
	var goodsList=goodsUl.getElementsByTagName('li');
	var speed = -1;
	var tim = null;

	//复制自身节点
	goodsUl.innerHTML +=goodsUl.innerHTML;
	goodsUl.style.width = goodsList.length*goodsList[0].offsetWidth+'px';

	tim = setInterval(begin,20);

	function begin(){
			//判断重置位置
			if(goodsUl.offsetLeft<-goodsUl.offsetWidth/2){
				goodsUl.style.left=0;
			}else if(goodsUl.offsetLeft>0){
				goodsUl.style.left= - goodsUl.offsetWidth/2+'px';
			}
			goodsUl.style.left = goodsUl.offsetLeft+speed+'px';
	}

	var back = document.getElementsByClassName('back')[0];
	var gogo = document.getElementsByClassName('gogo')[0];

		back.onclick =function(){
			speed = -1;
		}
		gogo.onclick = function(){
			speed = 1;
		}

	back.onmouseover = function(){
		clearInterval(tim);
	}
	back.onmouseout = function(){
		tim = setInterval(begin,20);
	}

	gogo.onmouseover = function(){
		clearInterval(tim);
	}
	gogo.onmouseout = function(){
		tim = setInterval(begin,20);
	}


	goodsShow.onmouseover = function(){
		clearInterval(tim);
	}
	goodsShow.onmouseout = function(){
		tim = setInterval(begin,20);
	}
	}
});






















});