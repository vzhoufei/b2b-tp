<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我要入驻-初始协议</title>
<link href="/Template/pc/soubao/Static/css/qt_style.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/common.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/js/jquery-1.8.2.min.js"></script>
</head>
<body>
<div class="m-top-bar editable" moduleid="1539923" style="position:relative;min-height:25px;">
  <div class="container">
    <ul class="fl">
      <?php if($user[user_id] > 0): ?><li class="fl J_login_status"><a href="<?php echo U('Home/user/index');?>" alt="" title="" target="_self"><?php echo ($user['nickname']); ?></a>
      	<a  href="<?php echo U('Home/user/logout');?>" style="margin:0 10px;" title="退出" target="_self">退出</a></li>
      </li>
      <?php else: ?>
      	<li class="fl J_login_status"><a class="menu-item fl J_do_login J_chgurl" href="<?php echo U('Home/user/login');?>">
        <span>Hi，请登录</span> </a><a class="menu-item fl ht" href="<?php echo U('Home/user/reg');?>">免费注册</a><?php endif; ?>
      <li class="fl sep"></li>
      <li class="fl select-city dropdown">
        <span class="menu-item">
        <span>送货至：</span>
        <a title="" alt="" href="" class="J_cur_place"></a><i class="dd"></i></span>
      </li>
    </ul>
    <ul class="fr bar-right">
      <li class="fl dropdown my-feiniu"><a class="menu-item" target="_blank" href="">
        <span>我的商城</span><i class="dd"></i></a>
        <ul class="sub-panel">
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/order_list');?>">我的订单</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/account');?>">我的积分</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/coupon');?>">我的优惠券</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/goods_collect');?>">我的收藏夹</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/comment');?>">我的评论</a></li>
        </ul>
      </li> 
      <li class="fl sep"></li>
      <li class="fl dropdown mobile-feiniu"><a class="menu-item" href=""><i class="fl ico"></i>
        <span class="fl">手机TPshop网</span>
        <i class="dd"></i></a>
        <div class="sub-panel m-lst">
          <p>扫一扫，下载TPshop客户端</p>
          <dl>
            <dt class="fl mr10"><a target="_blank" href=""><img height="80" width="80" src="/Template/pc/soubao/Static/images/qrcode_vmall_app01.png"></a></dt>
            <dd class="fl mb10"><a target="_blank" href=""><i class="andr"></i> Andiord</a></dd>
            <dd class="fl"><a target="_blank" href=""><i class="iph"></i> iPhone</a></dd>
          </dl>
        </div>
      </li>
      <li class="fl sep"></li>
      <li class="fl"><a class="menu-item" href="" target="_blank">
        <span>帮助中心</span>
        </a></li>
      <li class="fl sep"></li>
      <li class="fl about-us"><a class="txt fl" style="line-height:unset;" href="">关注我们：</a></li>
      <li class="fl dropdown weixin"><a href="" class="fl ico"></a>
        <div class="sub-panel wx-box">
          <span class="arrow-b">◆</span>
          <span class="arrow-a">◆</span>
          <p class="n"> 扫描二维码 <br>	关注TPshop网官方微信 </p>
          <img src="/Template/pc/soubao/Static/images/qrcode_vmall_app01.png"></div>
      </li>
    </ul>
  </div>
</div> 
<div class="gome-wrap bg">
	<div style="position: relative;top: -40px;left: 190px;">
    	<a href="/" target="_blank" class="item fl"><img height="60" width="160" src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>"></a>
    </div>
	<div class="gome-layout-area">
        <ul class="gome-nav">
            <li><a href="<?php echo U('Newjoin/index');?>" target="_blank">招商首页</a></li>
        	<?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where parent_id=2"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where parent_id=2"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li><a href="<?php echo U('Newjoin/question',array('cat_id'=>$v[cat_id]));?>" target="_blank"><?php echo ($v["cat_name"]); ?></a></li><?php endforeach; ?>
        </ul>
    </div>
</div>

<div class="gome-layout-area pb50 clearfix">
    	<ul class="steps clearfix">
        	<li class="first cur ok"><b>1</b><span class="going"></span><em class="f">入驻须知</em></li>
        	<li><b>2</b><span></span><em class="f">填写公司信息</em></li>
        	<li><b>3</b><span></span><em class="f">填写店铺信息</em></li>
        	<li><b>4</b><span></span><em class="f">资质上传</em></li>
        	<li class="last"><b>5</b><em class="f">等待审核</em></li>
        </ul>
        <div class="settled-agreement-table pb50">
        	<div class="agreement-title"><span>联系方式</span></div>
        	<form action="" id="contact_info" method="post">
            	<table cellpadding="0" cellspacing="0" border="0" class="information-table">
            		<tbody><tr>
                		<th class="fw700 pr7">卖家入驻联系人信息
                    	</th><td class="color01">用于入驻过程中接收平台官方反馈的入驻通知，请务必填写正确</td>
                	</tr>
            		<tr>
                		<th><em class="em-red">*</em>联系人姓名：
                    	</th><td width="495"><input maxlength="20" type="text" id="contacterName" name="contacts_name" class="input260 fl" value="<?php echo ($apply["contacts_name"]); ?>" onblur="checkEmpty(this.value,'contacterName','联系人姓名','');"><span id="contacterNameSpan" style="display:none"></span></td>
                	</tr>
            		<tr>
                		<th><em class="em-red">*</em>联系人手机：
                    	</th><td><input maxlength="11" type="text" id="contacterMobile" name="contacts_mobile" class="input260 fl" value="<?php echo ($apply["contacts_mobile"]); ?>" onblur="checkEmpty(this.value,'contacterMobile','联系人手机','mobile');"><span id="contacterMobileSpan" style="display:none"></span></td>
                	</tr>
            		<tr>
                		<th><em class="em-red">*</em>联系人电子邮箱：
                    	</th><td><input maxlength="32" type="text" id="email" name="contacts_email" class="input260 fl" value="<?php echo ($apply["contacts_email"]); ?>" onblur="checkEmpty(this.value,'email','联系人电子邮箱','email');"><span id="emailSpan" style="display:none"></span></td>
                	</tr>
                	<tr>
                        <th><em class="em-red">*</em>申请类型：</th>
                        <td>
                        	<input style="width: 14px; height: 12px;" type="radio" id="isThreeinone" name="apply_type" value="1">个人入驻
                        	<input style="width: 14px; height: 12px;" type="radio" id="isThreeinone" name="apply_type" checked value="0">企业入驻
                        </td>
                    </tr>
            	</tbody></table></form>
            	<div class="gome-btn">
                	<a href="javascript:nextStep();" class="gome-btn-red">下一步,填写公司信息</a>
            	</div>
        	</div>
    	</div>
<input type="hidden" id="mobileRegex" value="^(13[0-9]{9})|(14[57][0-9]{8})|(15[012356789][0-9]{8})|(170[0-9]{8})|(18[0-9]{9})$"/>
<!-- footer start [[-->
<div class="foot">
          <div class="foot-box container fn-clear fixed">
    <dl class="foot-item foot-phone">
              <dt><?php echo ($tpshop_config['shop_info_phone']); ?></dt>
              <!--<dd>CEO邮箱：ceo@tp-shop.cn</dd>-->
              <dd>客服邮箱：673964249@qq.com</dd>
            </dl>
	    <?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where parent_id = 2"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where parent_id = 2"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><dl class="foot-item foot-list">
              <dt class=""><?php echo ($v[cat_name]); ?></dt>
              <?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id]"); $result_name = $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__article` where cat_id = $v[cat_id]"); S("sql_".$md5_key,$sql_result_v2,1); } foreach($sql_result_v2 as $k2=>$v2): ?><dd><a target="_blank" href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>"><?php echo ($v2[title]); ?></a></dd><?php endforeach; ?>
	        </dl><?php endforeach; ?>  
    <dl class="foot-item foot-attention">
              <dd>
        <div class="att-weixin"> <img src="/Template/pc/soubao/Static/images/weixin.png" width="85" height="85"> </div>
        <p>TPshop网微信</p>
      </dd>
              <dd>
        <div class="att-client"> <img src="/Template/pc/soubao/Static/images/app.png" width="85" height="85"> </div>
        <p>TPshop网客户端</p>
      </dd>
            </dl>
  </div>
  <div class="foot-info container">
    <p>Copyright <em>©</em> 2016-2025 <?php echo ($tpshop_config['shop_info_store_name']); ?>  版权所有 保留一切权利 备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?></p> 
    <ul class="foot-chop">
              <!--			<li class="icbc">
							<a href="" target="_blank"></a>
						</li>
						<li class="alipay">
							<a href="" target="_blank"></a>
						</li>
						<li class="unionpay">
							<a href="" target="_blank"></a>
						</li>
						<li class="tenpay">
							<a href="" target="_blank"></a>
						</li>-->
              <li class="gongshang"> <a href="" target="_blank"></a> </li>
              <li class="sh-letter"> <a href="" target="_blank"></a> </li>
              <li class="honesty"> <a href="" target="_blank"></a> </li>
              <li> <a href="" target="_blank"> <img src="/Template/pc/soubao/Static/images/time_cnnic.jpg"> </a> </li>
              <li> <a href="" target="_blank"> <img src="/Template/pc/soubao/Static/images/aqlm.jpg"> </a> </li>
            </ul>
  </div>
</div>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/jquery.lazyload.js"></script>
<script src="/Public/js/global.js"></script>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/common.js"></script>
<!-- footer end ]]--> 
<script>

function checkEmpty(value, id, msg, type) {
	var _email = /^([a-zA-Z0-9]+[_|\_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	var _phone = /^((\+?[0-9]{2,4}\-[0-9]{3,4}\-)|([0-9]{3,4}\-))?([0-9]{7,8})(\-[0-9]+)?$/;
	var _mobile = new RegExp(document.getElementById("mobileRegex").value);
	var _zip = /^[0-9][0-9]{5}$/;
	var _positiveInteger = /^[0-9]*[1-9][0-9]*$/;
	if(value == "" ||  ($.trim(value)).length == 0){
		var v = document.getElementById(id+"Span");
		v.innerHTML = "请填写" + msg;
		v.className="warning-text1";
		v.style.display="block";
		//输入框样式添加warning
		$("#"+id).addClass("warning");
	} else {
		if ((type == "email" && !(_email.test(value))) || (type == "phone" && !(_phone.test(value))) || (type == "mobile" && !(_mobile.test(value))) || (type == "zip" && !(_zip.test(value)))  || (type == "positiveInteger" && !(_positiveInteger.test(value)))) {
			var v = document.getElementById(id+"Span");
			if (type == "positiveInteger") {
				msg = msg + "(正整数)"
			}
			v.innerHTML = "格式错误，请正确填写" + msg;
			v.className="warning-text2";
			v.style.display="block";
			$("#"+id).addClass("warning");
			return;
		} else {
			document.getElementById(id+"Span").className="";
			document.getElementById(id+"Span").innerHTML="";
			document.getElementById(id+"Span").style.display="none";
			$("#"+id).removeClass("warning");
			return 1;
		}
	}
}

function nextStep(){
	if (checkEmpty($("#contacterName").val(),'contacterName','联系人姓名','') != 1) {
		alert("联系人姓名，填写有误");
		$("#contacterName").focus();
		return;
	}
	if (checkEmpty($("#contacterMobile").val(),'contacterMobile','联系人手机','mobile') != 1) {
		alert("联系人手机，填写有误");
		$("#contacterMobile").focus();
		return;
	}
	if (checkEmpty($("#email").val(),'email','联系人电子邮箱','email') != 1) {
		alert("联系人电子邮箱，填写有误");
		$("#email").focus();
		return;
	}
	document.getElementById('contact_info').submit();
}
</script>
</body>
</html>