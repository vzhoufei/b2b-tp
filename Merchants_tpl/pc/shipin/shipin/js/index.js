$(function(){

	/*导航*/
	$('.nav >ul li').bind('mouseover',function(){

		$(this).children('div').show();

	})
	$('.nav >ul li').bind('mouseout',function(){
		$(this).children('div').hide();

	})


})



$(function(){
	//滚动图片
	
	//获取所需的对象 
		var oDiv = document.getElementById('one');
		var oUl = oDiv.getElementsByTagName('ul')[0];
		var oLi = oUl.getElementsByTagName('li');
		var speed = -1;
		var timer = null;

		//复制自身节点 
		oUl.innerHTML+=oUl.innerHTML;
		oUl.style.width = oLi.length*oLi[0].offsetWidth+'px';

		timer = setInterval(run,20);

		function run () { 
			//判断重置位置
			if(oUl.offsetLeft<-oUl.offsetWidth/2){ 
				oUl.style.left = 0;
			}
			else if(oUl.offsetLeft>0){ 
				oUl.style.left = -oUl.offsetWidth/2+'px';
			}

			oUl.style.left = oUl.offsetLeft+speed+'px';
		}

		var oBtn = document.getElementsByTagName('button');

		oBtn[0].onclick = function(){ 
			speed = -1;
		}

		oBtn[1].onclick = function(){ 
			speed = 1;
		}

		oDiv.onmouseover = function(){ 
			clearInterval(timer);
		}


		oDiv.onmouseout = function(){ 
			timer = setInterval(run,20);
		}


})

/************显示滚动文字************/
$(function(){

	$('#one >ul li').bind('mouseover',function(){
			$(this).children('div').show();
	});


	$('#one >ul li').bind('mouseout',function(){
			$(this).children('div').hide();
	});

})



$(function(){
	//滚动图片
	
	//获取所需的对象 
		var oDivB = document.getElementById('oneBB');
		var oUlB = oDivB.getElementsByTagName('ul')[0];
		var oLi = oUlB.getElementsByTagName('li');
		var speedB = 1;
		var timer = null;

		//复制自身节点 
		oUlB.innerHTML+=oUlB.innerHTML;
		oUlB.style.width = oLi.length*oLi[0].offsetWidth+'px';

		timer = setInterval(runc,20);

		function runc () { 
			//判断重置位置
			if(oUlB.offsetLeft<-oUlB.offsetWidth/2){ 
				oUlB.style.left = 0;
			}
			else if(oUlB.offsetLeft>0){ 
				oUlB.style.left = -oUlB.offsetWidth/2+'px';
			}

			oUlB.style.left = oUlB.offsetLeft+speedB+'px';
		}

		// var oBtn = document.getElementsByTagName('button');

		$('.back2').bind('click',function(){
			speedB = -1;
		})

		$('.next2').bind('click',function(){
			speedB=1;
		});

		oDivB.onmouseover = function(){ 
			clearInterval(timer);
		}

		oDivB.onmouseout = function(){ 
			timer = setInterval(runc,20);
		}


})

//向上滚动新闻
$(function(){

		var oUl = document.getElementById('s3RB');
		var oLi = oUl.getElementsByTagName('li');
			setInterval(function(){ 
				oUl.insertBefore(oUl.lastChild,oUl.childNodes[0]);
				// console.log(oUl.firstChild.style.height);
				oUl.firstChild.style.height
				oUl.firstChild.style.height = 0;
				oUl.firstChild.style.filter = 'alpha(opacity:0)';
				oUl.firstChild.style.opacity = 0;
				oUl.firstChild.style.overflow ='hidden';

				move(oUl.firstChild,{height:30},function(){ 
					move(oUl.firstChild,{opacity:100},function(){},60);
				},30);

			},2000);




})


