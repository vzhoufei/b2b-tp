$(function(){
	//nav
	$(".nav ul li").mouseover(function(){
		$(this).children("dl").stop().show();			
	});
	$(".nav ul li").mouseout(function(){
		$(this).children("dl").stop().hide();			
	});
	$(".nav ul li dd").mouseover(function(){
		$(this).children("ul").stop().show();			
	});
	$(".nav ul li dd").mouseout(function(){
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

	//滚动
	$.fn.kxbdMarquee = function(options){
		var opts = $.extend({},$.fn.kxbdMarquee.defaults, options);
		
		return this.each(function(){
			var $marquee = $(this);//滚动元素容器
			var _scrollObj = $marquee.get(0);//滚动元素容器DOM
			var scrollW = $marquee.width();//滚动元素容器的宽度
			var scrollH = $marquee.height();//滚动元素容器的高度
			var $element = $marquee.children(); //滚动元素
			var $kids = $element.children();//滚动子元素
			var scrollSize=0;//滚动元素尺寸
			var _type = (opts.direction == 'left' || opts.direction == 'right') ? 1:0;//滚动类型，1左右，0上下

			//防止滚动子元素比滚动元素宽而取不到实际滚动子元素宽度
			$element.css(_type?'width':'height',10000);
			//获取滚动元素的尺寸
			if (opts.isEqual) {
				scrollSize = $kids[_type?'outerWidth':'outerHeight']() * $kids.length;
			}else{
				$kids.each(function(){
					scrollSize += $(this)[_type?'outerWidth':'outerHeight']();
				});
			}
			//滚动元素总尺寸小于容器尺寸，不滚动
			if (scrollSize<(_type?scrollW:scrollH)) return; 
			//克隆滚动子元素将其插入到滚动元素后，并设定滚动元素宽度
			$element.append($kids.clone()).css(_type?'width':'height',scrollSize*2);
			
			var numMoved = 0;
			function scrollFunc(){
				var _dir = (opts.direction == 'left' || opts.direction == 'right') ? 'scrollLeft':'scrollTop';
				if (opts.loop > 0) {
					numMoved+=opts.scrollAmount;
					if(numMoved>scrollSize*opts.loop){
						_scrollObj[_dir] = 0;
						return clearInterval(moveId);
					} 
				}
				if(opts.direction == 'left' || opts.direction == 'up'){
					var newPos = _scrollObj[_dir] + opts.scrollAmount;
					if(newPos>=scrollSize){
						newPos -= scrollSize;
					}
					_scrollObj[_dir] = newPos;
				}else{
					var newPos = _scrollObj[_dir] - opts.scrollAmount;
					if(newPos<=0){
						newPos += scrollSize;
					}
					_scrollObj[_dir] = newPos;
				}
			};
			//滚动开始
			var moveId = setInterval(scrollFunc, opts.scrollDelay);
			//鼠标划过停止滚动
			$marquee.hover(
				function(){
					clearInterval(moveId);
				},
				function(){
					clearInterval(moveId);
					moveId = setInterval(scrollFunc, opts.scrollDelay);
				}
			);
			
			//控制加速运动
			if(opts.controlBtn){
				$.each(opts.controlBtn, function(i,val){
					$(val).bind(opts.eventA,function(){
						opts.direction = i;
						opts.oldAmount = opts.scrollAmount;
						opts.scrollAmount = opts.newAmount;
					}).bind(opts.eventB,function(){
						opts.scrollAmount = opts.oldAmount;
					});
				});
			}
		});
	};
	$.fn.kxbdMarquee.defaults = {
		isEqual:true,//所有滚动的元素长宽是否相等,true,false
		loop: 0,//循环滚动次数，0时无限
		direction: 'left',//滚动方向，'left','right','up','down'
		scrollAmount:1,//步长
		scrollDelay:24,//时长
		newAmount:2,//加速滚动的步长
		eventA:'mousedown',//鼠标事件，加速
		eventB:'mouseup'//鼠标事件，原速
	};
	$.fn.kxbdMarquee.setDefaults = function(settings) {
		$.extend( $.fn.kxbdMarquee.defaults, settings );
	};

	$('.marquee').kxbdMarquee({
				direction:'left',
				eventA:'mouseenter',
				eventB:'mouseleave'
		});

	if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
		new WOW().init();
	};
})