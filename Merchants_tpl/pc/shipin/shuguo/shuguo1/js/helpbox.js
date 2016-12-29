var tel1=document.getElementById('tel1');
	var wx1=document.getElementById('wx1');
	var dialog=document.getElementsByClassName('dialog');
	var dialog1=document.getElementsByClassName('dialog1');
	
	wx1.onmouseover=function(){
         dialog1[0].style.display="block";
	}
	wx1.onmouseout=function(){
         dialog1[0].style.display="none";
	}
	tel1.onmouseover=function(){
         dialog[0].style.display="block";
	}
	tel1.onmouseout=function(){
         dialog[0].style.display="none";
	}