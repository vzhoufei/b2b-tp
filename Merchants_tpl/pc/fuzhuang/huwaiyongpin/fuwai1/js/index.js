$(function(){


	$('.s2List1A').bind('mouseover',function(){
		// alert('saassa');
		// $('.s2List1A').toggole('.s2nav');
		$('.s2List1').fadeIn();
		$('.s2List2').fadeOut();
		$('.s2List3').fadeOut();
	});

	$('.s2List1B').bind('mouseover',function(){
		$('.s2List2').fadeIn();
		$('.s2List1').fadeOut();
		$('.s2List3').fadeOut();
	});

	$('.s2List1C').bind('mouseover',function(){
		$('.s2List3').fadeIn();
		$('.s2List1').fadeOut();
		$('.s2List2').fadeOut();
	});


























})