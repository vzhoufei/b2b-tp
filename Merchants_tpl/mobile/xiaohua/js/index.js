var zMenu=document.getElementById('menu');
	var zburger=document.getElementById('burger');
    var zcircle=document.getElementById('circle');
    
    
      if ('ontouchstart' in window) {
		    var click = 'touchstart';
		} else {
		    var click = 'click';
		} 
		$('div.burger').on(click, function () {
             
             
		    if (!$(this).hasClass('open')) {
		        openMenu();
                 $('.subNavBox').css('display','block');
                 $('#menu').css('display','block');
		        zMenu.style.zIndex=14;
              zburger.style.zIndex=14;
               zcircle.style.zIndex=14;
		    } else {
		        closeMenu();
		        zMenu.style.zIndex=12;
		        zMenu.style.display='none';
		        $('.subNavBox').css('display','none');
		    }
		});
		// $('div.menu ul li a').on(click, function (e) {
		// 	 // $('.subNavBox').css('display','none');
		//     e.preventDefault();
		//     closeMenu();
		// });
		function openMenu() {
		    $('div.circle').addClass('expand');
		    $('div.burger').addClass('open');
		    $('div.x, div.y, div.z').addClass('collapse');
		    
		    setTimeout(function () {
		        $('div.y').hide();
		        $('div.x').addClass('rotate30');
		        $('div.z').addClass('rotate150');
		    }, 70);
		    setTimeout(function () {
		        $('div.x').addClass('rotate45');
		        $('div.z').addClass('rotate135');
		    }, 120);
		}
		function closeMenu() {
		    $('div.burger').removeClass('open');
		    $('div.x').removeClass('rotate45').addClass('rotate30');
		    $('div.z').removeClass('rotate135').addClass('rotate150');
		    $('div.circle').removeClass('expand');
		   
		    setTimeout(function () {
		        $('div.x').removeClass('rotate30');
		        $('div.z').removeClass('rotate150');
		    }, 50);
		    setTimeout(function () {
		        $('div.y').show();
		        $('div.x, div.y, div.z').removeClass('collapse');
		    }, 70);
		}
		 

         var obtn=document.getElementById('btn');
            var timer =null;
            var isTop=true;
            //滚动条滚动时触发
            window.onscroll = function(){
               if (!isTop) {
                  clearInterval(timer);
                  
               }
               isTop=false;
               
            } 
  
         obtn.onclick=function(){
            //设置定时器
            timer =setInterval(function(){
               //获取滚动条距离顶部的高度
               var osTop=document.documentElement.scrollTop ||document.body.scrollTop;
               var ispeed = Math.floor(-osTop/10);
               document.documentElement.scrollTop=document.body.scrollTop=osTop+ispeed;

               isTop = true;
               
               if (osTop == 0) {
                  clearInterval(timer);
               }

            },30);
            
            

         }