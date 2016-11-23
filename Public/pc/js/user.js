function codes(url){
  pattern = /^(13[0-9]|15[0|3|6|7|8|9]|18[0|1|6|8|9])\d{8}$/;
  var phone = $('input[name=username]').val();
  if(!pattern.test(phone)){alert('手机号不合法！');return false;}
  $.post(url,{'mobile':phone},function(res){
    var obj = eval('('+res+')');
      times();
      alert(obj['msg']);
    })
}

//验证码时间 周飞
function times(){
	i = 60;
	var time = setInterval(function(){
		 $('#button').html( i +'秒中后重新获取');
	i--;
	if(i < 0){clearInterval(time); $('#button').html('重新获取');$('#button').removeAttr('disabled');}else{$('#button').attr({'disabled':"disabled"});}
	},1000);
}