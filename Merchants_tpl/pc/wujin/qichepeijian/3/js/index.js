//banner
$(document).ready(function() {
	$(".banner .hd li").eq(0).addClass("on");
	var winW = $(window).width();
	var a = 0;
	var num = $(".banner .bd li").length;
	var bool = true;
	for(var i = 0; i < num; i++) {
		$(".banner .bd li").eq(i).css({
			"left": winW * i + "px"
		});
	}
	$(".banner .hd li").click(function() {
		$(this).addClass("on").siblings().removeClass("on")
		var len = $(this).index();
		$(".banner .bd").stop(false, true).animate({
			left: -winW * len + "px"
		}, 700);
		return a = len;
	})
	$(".banner").mouseover(function() {
		clearInterval(lun);
	})
	$(".banner").mouseout(function() {
		show();
	})
	function show() {
		lun = setInterval(function() {
			a = a + 1;
			if(a >= num) {
				a = 0;
			}
			$(".banner .bd").stop(false, true).animate({
				left: -winW * a + "px"
			}, 700);
			$(".banner .hd li").eq(a).addClass("on").siblings().removeClass("on");
		}, 3000)
	}
	show();

	if(!$(".product .proconright ul").html()){
		$(".product").hide();
	}else{
		$(".product").show();
	}

	if(!$(".new .newcon ul li").html()){
		$("#newshov").hide();
	}else{
		$("#newshov").show();
	}

})

$(function(){
	$(".protitleright>a").hover(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".protitleright>a").mouseout(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	$(".abouttitleright>a").hover(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".abouttitleright>a").mouseout(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	$(".aboutleft>div>a").hover(function(){
		$(this).removeClass("leave");
		$(this).addClass("on");
	})
	$(".aboutleft>div>a").mouseout(function(){
		$(this).removeClass("on");
		$(this).addClass("leave");
	})
	$(".proconleft>ul>li:nth-child(1)").addClass("on");
	$(".proconright>ul:nth-child(1)").show();
	$(".proconleft>ul>li").click(function(){
		$(this).addClass("on").siblings("li").removeClass("on")
		var numpic = $(this).index();
		$(".proconright>ul").eq(numpic).show().siblings("ul").hide();
	})
	
	$(".select").mousemove(function(){
		$(this).find(".sel").show();
		$(this).addClass("on");
		$(".sel").click(function(){
			var tex = $(this).find("p").text();
			$(".select>p").text(tex);
			$(this).hide();
		})
	})
	$(".select").mouseleave(function(){
		$(this).find(".sel").hide();
		$(this).removeClass("on");
		if($(".select>p").text() == "产品　"){
			$(".sel>p").text("文章　");
		}else{
			$(".sel>p").text("产品　");
		}
	})
	
	$(".footersearch>input").focus(function(){
		$(this).addClass("on");
	})
	$(".footersearch>input").blur(function(){
		$(this).removeClass("on");
	})


	var numli = $(".newcon>ul>li").length;
	for(i=0;i<numli;i++){
		$(".newcon>ul>li").eq(i).find(".num").text("0"+(i+1));
		console.log($(".newcon>ul>li").eq(i).find(".num").text())
	}
	
})
$(document).ready(function(){
	$(".abouthd li").eq(0).addClass("on");
	var aboutwin = $(".aboutbd li").width();
	var a = 0;
	var num = $(".aboutbd li").length;
	var bool = true;
	for(var i = 0; i < num; i++) {
		$(".aboutbd li").eq(i).css({
			"left": aboutwin * i + "px"
		});
	}
	$(".abouthd li").click(function() {
		$(this).addClass("on").siblings().removeClass("on")
		var len = $(this).index();
		$(".aboutbd").stop(false, true).animate({
			left: -aboutwin * len + "px"
		}, 700);
		return a = len;
	})
	$(".aboutbanner").mouseover(function() {
		clearInterval(lunb);
	})
	$(".aboutbanner").mouseout(function() {
		show();
	})
	function show() {
		lunb = setInterval(function() {
			a = a + 1;
			if(a >= num) {
				a = 0;
			}
			$(".aboutbd").stop(false, true).animate({
				left: -aboutwin * a + "px"
			}, 700);
			$(".abouthd li").eq(a).addClass("on").siblings().removeClass("on");
		}, 3000)
	}
	show();
	
	$(".next").click(function(){
		var ingA=$(".abouthd li.on")
		var ing=ingA.index();
			if(bool){
				bool = false;
				if(ing<2){
				$(".abouthd li").eq(ing).removeClass("on");
				$(".abouthd li").eq(ing+1).addClass("on");
				$(".aboutbd").stop(false,true).animate({left:-aboutwin*(ing+1)+"px"},700,function(){bool=true;});
			}else if(ing>=2){
				ing=0;
				$(".abouthd li").eq(ing).addClass("on").siblings().removeClass("on");
				$(".aboutbd").stop(false,true).animate({left:-aboutwin*ing+"px"},700,function(){bool=true;});
			}
		}
		
	})
	$(".prev").click(function(){
		var ingA=$(".abouthd li.on")
		var ing=ingA.index();
		if(bool){
			bool=false;
			if(ing>0){
			$(".abouthd li").eq(ing).removeClass("on");
			$(".abouthd li").eq(ing-1).addClass("on");
			$(".aboutbd").stop(false,true).animate({left:-aboutwin*(ing-1)+"px"},700,function(){bool=true;});
		}else if(ing<=0){
			ing=2;
			$(".abouthd li").eq(ing).addClass("on").siblings().removeClass("on");
			$(".aboutbd").stop(false,true).animate({left:-aboutwin*ing+"px"},700,function(){bool=true;});
		}
		return a=ing;
		}
	})
})














