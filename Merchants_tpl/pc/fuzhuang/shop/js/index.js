$(function(){

$('.xiuxian').removeClass('s2mainAAA');
$('.xiuxian').addClass('s2mainAA');

	$('.s2mainL >ul li').bind('click',function(){


			$('.s2mainL > ul li').each(function(){				

				$($(this).attr('i')).css('display','none');				
				$($(this).attr('i')).hide('s2mainAAA');	
				$(this).removeClass('s2mainAAA');
				$(this).addClass('s2mainAA');			

			})

		$(this).removeClass('s2mainAA');
		$(this).addClass('s2mainAAA');
		$($(this).attr('i')).show('s2mainAA');
		});




})