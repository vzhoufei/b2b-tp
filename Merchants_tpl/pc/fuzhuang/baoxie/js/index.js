$(function(){

	/*导航*/
	$('.nav >ul li').bind('mouseover',function(){

		$(this).children('div').show();

	})
	$('.nav >ul li').bind('mouseout',function(){
		$(this).children('div').hide();

	})


})

/*******产品*******/
$(function(){

	$('.s3Main >ul li').bind('mouseover',function(){
		
			$(this).children('div').css('opacity','.5');
	});


	$('.s3Main >ul li').bind('mouseout',function(){

			$(this).children('div').css('opacity','0');
	});

})

