$(function(){

// $('.s2NaN').removeClass('s2Nav');
// $('.s2NaN').addClass('s2TopM');

	$('.s2Top >ul li').bind('mouseover',function(){


			$('.s2Top > ul li').each(function(){				
				$($(this).attr('i')).css('display','none');				
				$($(this).attr('i')).hide();	
				$(this).removeClass('s2Nav');
				$(this).addClass('s2TopM');			

			})

		$(this).removeClass('s2TopM');
		$(this).addClass('s2Nav');
		$($(this).attr('i')).show();
		});




})