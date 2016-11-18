<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我要入驻-初始协议</title>
<link href="/Template/pc/soubao/Static/css/qt_style.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/common.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/js/jquery-1.8.2.min.js"></script>
<style>
.btn_select_category {
    font: normal 12px/20px "microsoft yahei";
    color: #777;background-color: #DCDCDC;text-align: center;vertical-align: middle;
    display: inline-block;height: 20px;padding: 4px 12px;border: solid 1px;
    border-color: #DCDCDC #DCDCDC #B3B3B3 #DCDCDC;cursor: pointer;
}
.catable{width:640px; margin: 0 auto;border: solid 1px #DDD;}
.catable th{
	color: #777;text-align: center;background-color: #F7F7F7; vertical-align: top;
    text-align: right;height: 22px;padding: 8px 4px;border-color: #EEE;
}
.w120 {width: 120px !important;}
.tc {text-align: center !important;}
.catable td{
	text-align: center; border-style: solid;
    border-width: 1px 1px 0 0;border-color: #DDD #DDD transparent transparent;
}
.w50 {width: 50px !important;}
.hide{display:none;}
.cate3{margin:8px 0;font-size:14px;}
.cate3 input{margin-left:5px;}
</style>
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
<input type="hidden" id="mobileRegex" value="^(13[0-9]{9})|(14[57][0-9]{8})|(15[012356789][0-9]{8})|(170[0-9]{8})|(18[0-9]{9})$"/>
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
<div class="gome-layout-area pb50">
    	<ul class="steps clearfix">
        	<li class="first prev ok"><b>1</b><span class="going"></span><em class="f">入驻须知</em></li>
        	<li class="prev ok"><b>2</b><span class="going"></span><em class="f">填写店铺信息</em></li>
        	<li class="prev ok"><b>3</b><span class="going"></span><em class="f">填写身份信息</em></li>
        	<li class="cur ok"><b>4</b><span class="going"></span><em class="f">结算账户</em></li>
        	<li class="last"><b>5</b><em class="f">等待审核</em></li>
        </ul>
        <div class="settled-agreement-table pb50">
        	<div class="agreement-title"><span>填写个人店铺信息</span></div>
        	<form action="<?php echo U('Newjoin/seller_info');?>" id="seller_info" method="post" enctype="multipart/form-data">
           <div class="table-part clearfix">
            	<div class="table-part-title">店铺信息</div>
                <table cellpadding="0" cellspacing="0" border="0" class="information-table1">
                    <tbody>
                    <tr>
                        <th><em class="em-red">*</em>店铺名称：</th>
                        <td><input type="text" maxlength="40"  id="shopName" name="store_name" value="<?php echo ($apply["store_name"]); ?>" class="input260" err_msg="0" onchange="checkStore(this)">
                        <!--<span id="shopNameSpan">点击查看店铺命名规则</span>-->
                        </td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>店铺主营大类：</th>
                        <td>
                        	<select id="supplier_ctgy_id" name="sc_id" class="input270 mr10" onchange="javascript:$('#sc_name').val($('#supplier_ctgy_id option:selected').text())">
                        	<option value="">请选择</option>
				 				<?php if(is_array($store_class)): foreach($store_class as $k=>$vo): ?><option value="<?php echo ($k); ?>" <?php if($k == $apply[sc_id]): ?>selected<?php endif; ?>><?php echo ($vo); ?></option><?php endforeach; endif; ?>
                        	</select>
                        	<input type="hidden" id="sc_name" name="sc_name" value="<?php echo ($apply["sc_name"]); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>店铺性质：</th>
                        <td>
                        	<select id="shopType" name="store_type" value="" class="input200">
                        		<option value="0">请选择</option>
                        		<option value="1">旗舰店</option>
                        		<option value="2">专卖店</option>
                        		<option value="3">专营店</option>
                        	</select>
                        </td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>店铺登录主账号：</th>
                        <td><input type="text" maxlength="20" id="seller_name" name="seller_name" autocomplete="on" value="<?php echo ($apply["seller_name"]); ?>" class="input260"  err_msg="0" onchange="checkSeller(this)"><span id="mainAccountSpan" class="" style="display: none;"></span></td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>店铺负责人姓名：</th>
                        <td><input type="text" maxlength="64" id="contactPersonName" name="store_person_name" value="<?php echo ($apply["store_person_name"]); ?>" class="input260" onblur="checkEmpty(this.value,'contactPersonName','店铺负责人姓名','');"><span id="contactPersonNameSpan" style="display:none"></span></td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>负责人手机号码：</th>
                        <td><input type="text" maxlength="11" id="contactPersonPhone" name="store_person_mobile" value="<?php echo ($apply["store_person_mobile"]); ?>" class="input260" onblur="checkEmpty(this.value,'contactPersonPhone','手机号码','mobile');"><span id="contactPersonPhoneSpan" style="display:none"></span></td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>负责人QQ号码：</th>
                        <td><input type="text" maxlength="11" id="contactPersonQq" name="store_person_qq" value="<?php echo ($apply["store_person_qq"]); ?>" class="input260" onblur="checkEmpty(this.value,'contactPersonQq','qq号码','qq');"><span id="contactPersonQqSpan" style="display:none"></span></td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>电子邮箱：</th>
                        <td><input type="text" maxlength="32" id="shop_email" name="store_person_email" value="<?php echo ($apply["store_person_email"]); ?>" class="input260" onblur="checkEmpty(this.value,'email','电子邮箱','email');"><span id="emailSpan" style="display:none"></span></td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>店铺所在地：</th>
                        <td>
                        	<select id="provinces" name="company_province" onchange="get_city(this)" class="input145 mr10">
								<option value="">请选择</option>		
								<?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo[id] == $apply[company_province]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>

							<select onchange="get_area(this)" id="city" name="company_city" class="input145 mr10">
								<option value="">请选择</option>
	                        	<?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo[id] == $apply[company_city]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
							<select id="district" name="company_district" class="input145 mr10">
								<option value="">请选择</option>
                                <?php if(is_array($district)): $i = 0; $__LIST__ = $district;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo[id] == $apply[company_district]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
                        </td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>店铺详细地址：</th>
                        <td><input type="text" maxlength="100" id="storeAddress" name="store_address" class="input453" value="<?php echo ($apply["store_address"]); ?>" onblur="checkEmpty(this.value,'storeAddress','店铺详细地址','');"><span id="storeAddressSpan" style="display:none"></span></td>
                    </tr>
                    <tr><th><em class="em-red">*</em>经营类目:</th>
                        <td>
                        <a href="###" id="btn_select_category" onclick="javascript:$(this).hide();$('.bind_cat').show();" class="btn_select_category">+选择添加类目</a>
			              <div class="bind_cat hide">
			              <select id="class_1" name="class_1" class="input128" onchange="get_sub_cat(this,'class_2')">
			                <option value="0">请选择</option>
			                <?php if(is_array($goods_category)): foreach($goods_category as $k=>$vo): ?><option value="<?php echo ($k); ?>" data-explain="5"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
			              </select>
			              <select id="class_2" name="class_2" class="input128 hide" onchange="select_sub_cat(this,'class_3')">
			              </select>
			              <a class="gome-btn-gray" href="javascript:;" onclick="bind_store_class()">确定</a>
			              <a class="gome-btn-gray" href="javascript:;" onclick="showbtn()">取消</a>
			              <div id="class_3" name="class_3" class="hide cate3"></div>
			              </div>
                        </td>
                    </tr>
                    <tr><td></td>
                    	<td>
                    	<table cellpadding="0" cellspacing="0" class="catable">
			              <thead>
			                <tr>
			                  <th class="w120 tc">一级类目</th>
			                  <th class="w120 tc">二级类目</th>
			                  <th class="tc">三级类目</th>
			                  <th class="w50 tc">操作</th>
			                </tr>
			              </thead>
            			<tbody id="new_cat">
            			<?php if(is_array($bind_class_list)): foreach($bind_class_list as $key=>$vo): ?><tr>
		            			<td><?php echo ($vo["class_1"]); ?></td>
		            			<td><?php echo ($vo["class_2"]); ?></td>
		            			<td><?php echo ($vo["class_3"]); ?></td>
	            				<td><a href="javascript:;" onclick="javascript:$(this).parent().parent().remove();">删除</a></td>
	            				<input name="store_class_ids[]" type="hidden" value="<?php echo ($vo["value"]); ?>">
	            			</tr><?php endforeach; endif; ?>
            			</tbody>
            			</table>
                    	</td>
                    </tr>
                </tbody></table>
            </div>
            <div class="table-part clearfix">
            	<div class="table-part-title bt pt30 j-tabclick"><span>身份证信息</span></div>
            	 <table cellpadding="0" cellspacing="0" border="0" class="information-table1 j-information-table">
                    <tbody>
                    <tr>
                        <th><em class="em-red">*</em>身份证号：</th>
                        <td><input maxlength="20" type="text" id="store_person_identity" name="store_person_identity" value="<?php echo ($apply["store_person_identity"]); ?>" class="input260" onblur="checkEmpty(this.value,'store_person_identity','身份证号','');"><span id="store_person_identitySpan" style="display:none"></span></td>
                   		<td></td>
                    </tr>
                     <tr>
                        <th><em class="em-red">*</em>身份证正面：</th>
                        <td><div class="update-btn width-170 fl"><input type="file" name="legal_identity_cert" id="file_upload_1"/></div></td>
                    	<td><?php if(!empty($apply[legal_identity_cert])): ?><a href="<?php echo ($apply["legal_identity_cert"]); ?>" target="_blank"><img src="<?php echo ($apply["legal_identity_cert"]); ?>" height="100"/></a><?php endif; ?></td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>身份证反面： </th>
                        <td><div class="update-btn width-170 fl"><input type="file" name="store_person_cert" id="file_upload_2"/></div></td>
                    	<td><?php if(!empty($apply[store_person_cert])): ?><a href="<?php echo ($apply["store_person_cert"]); ?>" target="_blank"><img src="<?php echo ($apply["store_person_cert"]); ?>" height="100"/></a><?php endif; ?></td>
                    </tr>
                    </tbody>
                 </table>
            </div>	
           <div class="table-part clearfix">
            	<div class="table-part-title bt pt30 j-tabclick"><span>结算银行账号</span></div>
                <table cellpadding="0" cellspacing="0" border="0" class="information-table1 j-information-table">
                    <tbody><tr>
                        <th><em class="em-red">*</em>银行开户名：</th>
                        <td><input maxlength="20" type="text" id="bankAccountName" name="bank_account_name" value="<?php echo ($apply["bank_account_name"]); ?>" class="input260" onblur="checkEmpty(this.value,'bankAccountName','银行开户名','');"><span id="bankAccountNameSpan" style="display:none"></span></td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>银行账号：</th>
                        <td><input maxlength="32" type="text" id="bankAccount" name="bank_account_number" value="<?php echo ($apply["bank_account_number"]); ?>" class="input260" onblur="checkEmpty(this.value,'bankAccount','公司银行账号','positiveInteger');"><span id="bankAccountSpan" style="display:none"></span></td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>开户银行支行名称：</th>
                        <td>
	                        <input type="text" id="bankBranchName" name="bank_branch_name" value="<?php echo ($apply["bank_branch_name"]); ?>" class="input260 ac_input"  onblur="checkEmpty(this.value,'bankBranchName','开户银行支行名称','');">
	                        <input type="hidden" id="bankCode" name="bankCode">
	                        <span id="bankBranchNameSpan" style="display:none"></span>
                        </td>
                    </tr>
                    <tr>
                        <th><em class="em-red">*</em>开户银行支行所在地：</th>
                        <td>
                        	<select id="bank_province" name="bank_province" onchange="get_city(this)" class="input145 mr10">
								<option value="">请选择</option>
								<?php if(is_array($province)): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo[id] == $apply[bank_province]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								
							</select>
							<select id="city" name="bank_city" class="input145 mr10">
								<option value="">请选择</option>
							    <?php if(is_array($city)): $i = 0; $__LIST__ = $city;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($vo[id] == $apply[bank_city]): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
                        </td>
                    </tr>
                </tbody>
              </table>
            </div>
            </form>
            <div class="gome-btn pt30">
                <a href="javascript:preStep();" class="gome-btn-gray">上一步</a>
                <a href="javascript:nextStep();" class="gome-btn-red">下一步,店铺信息</a>
            </div>
        </div>
    </div>

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

function preStep(){
	window.location.href = "<?php echo U('Newjoin/contact');?>";
}

/**
* 检测非空
*/
var ret = 0;
function checkEmpty(value, id, msg, type) {
	var _email = /^([a-zA-Z0-9]+[_|\_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
	var _phone= /^((\+?[0-9]{2,4}\-[0-9]{3,4}\-)|([0-9]{3,4}\-))?([0-9]{7,8})(\-[0-9]+)?$/;
	var _mobile = new RegExp(document.getElementById("mobileRegex").value);
	var _zip= /^[0-9][0-9]{5}$/;
	var _positiveInteger = /^[0-9]*[1-9][0-9]*$/;
	var _money = /^[1-9]{1}\d*(\.\d{1,2})?$/;
	var _money1 = /^(?!0)\d{1,6}$|^(?!0)\d{1,6}[.]\d{1,6}$|^0[.]\d{1,6}$/;

	if(value == "" ||  ($.trim(value)).length == 0){
		var v = document.getElementById(id+"Span");
		v.innerHTML = "请填写" + msg;
		v.className="warning-text1";
		v.style.display="block";
		//输入框样式添加warning
		$("#"+id).addClass("warning");
	} else if(id == "corpName"){
        var url = "<?php echo U('Newjoin/check_company');?>";
        $.post(url, {"supplier.corpName":value, "supplierApplyIntention.member_id":1},
			function(data) {
                if (data == 'success') {
                	document.getElementById(id+"Span").className="";
					document.getElementById(id+"Span").innerHTML="";
					document.getElementById(id+"Span").style.display="none";
					$("#"+id).removeClass("warning");
					ret = 1;
                } else {
                	var v = document.getElementById(id+"Span");
					v.innerHTML = msg + "已经存在，请重新填写";
					v.className="warning-text2";
					v.style.display="block";
					$("#"+id).addClass("warning");
                }
			}
		);
        return ret;
    } else {
		if ((type == "email" && !(_email.test(value))) || (type == "phone" && !(_phone.test(value))) || (type == "mobile" && !(_mobile.test(value))) || (type == "zip" && !(_zip.test(value))) || (type == "positiveInteger" && !(_positiveInteger.test(value))) || (type == "money" && !(_money.test(value)))  || (type == "money1" && (!(value > 0) || !(_money1.test(value))))) {
			var v = document.getElementById(id+"Span");
			if (type == "positiveInteger") {
				msg = msg + "(正整数)";
			} else if (type == "money") {
				msg = msg + "(金额)";
			} else if (type == "money1") {
				msg = msg + "(6位整数6位小数的金额)";
			}
			v.innerHTML = "格式错误，请正确填写" + msg;
			v.className="warning-text2";
			v.style.display="block";
			$("#"+id).addClass("warning");
		} else {
			document.getElementById(id+"Span").className="";
			document.getElementById(id+"Span").innerHTML="";
			document.getElementById(id+"Span").style.display="none";
			$("#"+id).removeClass("warning");
			ret = 1;
		}
	}
	return ret;
}


function checkStore(obj){
    var url = "<?php echo U('Newjoin/check_store');?>";
    $.ajax({
        type : "POST",
        url  : url,
        data :{'store_name':$(obj).val()},
        error: function(request) {
            alert("服务器繁忙, 请联系管理员!");
            return false;
        },
        success: function(res) {
			if(res == 'success'){
				$(obj).attr('err_msg',0);
			}else{
				$(obj).attr('err_msg',1);
			}
        }
    });
}

function checkSeller(obj){
    var url = "<?php echo U('Newjoin/check_seller');?>";
    $.ajax({
        type : "POST",
        url  : url,
        data :{'seller_name':$(obj).val()},
        error: function(request) {
            alert("服务器繁忙, 请联系管理员!");
            return false;
        },
        success: function(res) {
			if(res == 'success'){
				$(obj).attr('err_msg',0);
			}else{
				$(obj).attr('err_msg',1);
			}
        }
    });
}

/**
* 下一步
*/
function nextStep() {
	if ($("#shopName").attr('err_msg') == 1) {
		alert("店铺名称被注册，请更换其他名称");
		$("#shopName").focus();
		return;
	}
	if($("#shopName").val() == ''){
		alert("请填写店铺名称");
		$("#shopName").focus();
		return;
	}
	
	if ($("#seller_name").attr('err_msg') == 1) {
		alert("抱歉，此店铺登陆账号已被注册");
		$("#seller_name").focus();
		return;
	}
	if ($("#provinces").val()=="") {
		alert("请选择 店铺所在地省份");
		$("#provinces").focus();
		return;
	}
	if ($("#city").val()=="") {
		alert("请选择店铺所在地城市");
		$("#city").focus();
		return;
	}
	if($("#storeAddress").val() == ''){
		alert("请填写店铺详细地址");
		$("#storeAddress").focus();
		return;
	}
	if($("#seller_name").val() == ''){
		alert("请填写店铺登陆账号");
		$("#seller_name").focus();
		return;
	}
	if($('#store_person_identity').val().length != 18){
		alert("请填写正确的身份证号");
		$("#store_person_identity").focus();
		return;
	}
	if (checkEmpty($("#contactPersonName").val(),'contactPersonName','店铺负责人姓名','') != 1) {
		alert("店铺负责人姓名，填写有误");
		$("#contactPersonName").focus();
		return;
	}
	if (checkEmpty($("#contactPersonPhone").val(),'contactPersonPhone','手机号码','mobile') != 1) {
		alert("手机号码，填写有误");
		$("#contactPersonPhone").focus();
		return;
	}
	if (checkEmpty($("#contactPersonQq").val(),'contactPersonQq','qq','qq') != 1) {
		alert("店铺负责人QQ");
		$("#contactPersonQq").focus();
		return;
	}
	if (checkEmpty($("#shop_email").val(),'email','电子邮箱','email') != 1) {
		alert("电子邮箱，填写有误");
		$("#shop_email").focus();
		return;
	}

	// 设置shopApply.entity_shop
	if (checkEmpty($("#bankAccountName").val(),'bankAccountName','银行开户名','') != 1) {
		alert("银行开户名，填写有误");
		$("#bankAccountName").focus();
		return;
	}
	if (checkEmpty($("#bankAccount").val(),'bankAccount','银行账号','positiveInteger') != 1) {
		alert("银行账号，填写有误");
		$("#bankAccount").focus();
		return;
	}
	if ($("#bankBranchName").val()=="") {
		alert("请选择开户银行支行名称");
		$("#bankBranchName").focus();
		return;
	} else if ($("#f_shopBank").val()!=$("#bankBranchName").val()) {
		//alert("开户银行支行名称，选择有误");
		//$("#bankBranchName").focus();
		//return;
	}
	if ($("#bank_province").val()=="") {
		alert("请选择 开户银行支行所在地省份");
		$("#bank_province").focus();
		return;
	}
	if ($("#bank_city").val()=="") {
		alert("请选择 开户银行支行所在地城市");
		$("#bank_city").focus();
		return;
	}
	// 验证下拉框
	if ($("#shopType").val()=="") {
		alert("请选择 店铺性质");
		$("#shopType").focus();
		return;
	}
	document.getElementById('seller_info').submit();
}


/**
 * 获取省份
 */
function get_province(){
    var url = '/index.php?m=Home&c=Api&a=getRegion&level=1&parent_id=0';
    $.ajax({
        type : "GET",
        url  : url,
        error: function(request) {
            alert("服务器繁忙, 请联系管理员!");
            return;
        },
        success: function(v) {
            v = '<option value="0">选择省份</option>'+ v;          
            $('#province').empty().html(v);
        }
    });
}


/**
 * 获取城市
 * @param t  省份select对象
 */
 function get_city(t){
	    var parent_id = $(t).val();
	    if(!parent_id > 0){
	        return;
	    }
	    $('#twon').empty().css('display','none');
	    var url = '/index.php?m=Home&c=Api&a=getRegion&level=2&parent_id='+ parent_id;
	    $.ajax({
	        type : "GET",
	        url  : url,
	        error: function(request) {
	            alert("服务器繁忙, 请联系管理员!");
	            return;
	        },
	        success: function(v) {
	            v = '<option value="0">选择城市</option>'+ v;          
	            $('#city').empty().html(v);
	        }
	    });
}



function get_sub_cat(obj,element){
    var parent_id = $(obj).val();
    if(!parent_id > 0){
        return;
    }
    $.ajax({
        type : "GET",
        url  : "<?php echo U('Home/Api/get_category');?>",
        data : {'parent_id':parent_id},
        error: function(request) {
            alert("服务器繁忙, 请联系管理员!");return;
        },
        success: function(v) {
            v = '<option value="">选择分类</option>'+ v;
            $('#'+element).empty().html(v).show();
        }
    });
}

function select_sub_cat(obj,element){
    var parent_id = $(obj).val();
    if(!parent_id > 0){
        return;
    }
    $.ajax({
        type : "GET",
        url  : "<?php echo U('Home/Api/get_cates');?>",
        data : {'parent_id':parent_id},
        error: function(request) {
            alert("服务器繁忙, 请联系管理员!");return;
        },
        success: function(v){
            $('#'+element).empty().html(v).show();
        }
    });
}

var aa = [];
function bind_store_class(){
   if($("input[type='checkbox']:checked").length == 0)
   {
	   alert('请在三级分类里至少选择一个经营类目');
	   return false;
   }
   var cattr = '';
   $("input[type='checkbox']:checked").each(function(i,o){
	    if($.inArray($(o).val(), aa) == -1){
			var conmmis = $(o).attr('rel');
			var cat_str = $('#class_1').val()+','+$('#class_2').val()+','+$(o).val();
			cattr += '<tr><td>'+$('#class_1').find("option:selected").text()+'</td>';
			cattr += '<td>'+$('#class_2').find("option:selected").text()+'</td>';
			cattr += '<td>'+$(o).attr('data-name')+'(佣金比例：'+conmmis+'%)</td>';
			cattr += '<td><a href="javascript:;" onclick="javascript:$(this).parent().parent().remove();">删除</a></td>';
			cattr += '<input name="store_class_ids[]" type="hidden" value="'+cat_str+'"></tr>';
			aa.push($(o).val());
	    }
   });
   $('#new_cat').append(cattr);
   showbtn();
}

function showbtn(){
	$('.bind_cat').hide();
	$('#class_2').empty().hide();
	$('#class_3').empty().hide();
	$('#btn_select_category').show()
}
</script>
</body>
</html>