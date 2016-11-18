<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>商家入驻</title>
</head>
<body>
<script type="text/javascript" src="/Public/js/jquery-1.10.2.min.js"></script>
<script src="/Public/js/global.js"></script>
<script src="/Public/js/layer/layer.js"></script> 
<link rel="stylesheet" type="text/css" href="/Template/pc/soubao/Static/css/common.min.css">
<link rel="stylesheet" type="text/css" href="/Template/pc/soubao/Static/css/main.min.css">
<style>.fn-clear .words{ line-height:1.5}.m-top-nav a{color:#000;}</style>
<div class="fn-cms-top">
<?php $pid =1;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1479369600 and end_time > 1479369600 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 1- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><div fnp="m-top-banner" style="background:<?php echo ($v["bgcolor"]); ?>;" class="m-top-banner rel editable" moduleId="2010053" style="position:relative;min-height:35px;">
	 <div class="bar container">
	 	<a class="img-small" <?php if($v['target'] == 1): ?>target="_blank"<?php endif; ?> href="<?php echo ($v["ad_link"]); ?>"> <img class="img100" src="<?php echo ($v[ad_code]); ?>"  title="<?php echo ($v[title]); ?>" style="<?php echo ($v[style]); ?>"/></a>   
	 </div>
	 <i data-role="close" class="icon icon-close"></i>
</div><?php endforeach; ?>
<div class="m-top-bar editable" moduleId="1539923" style="position:relative;min-height:25px;">
  <div class="container">
    <ul class="fl">
      <li class="fl J_login_status dn nologin">
      	<a class="menu-item fl J_do_login J_chgurl" href="<?php echo U('Home/user/login');?>">
        <span>Hi，请登录</span> </a><a class="menu-item fl ht" href="<?php echo U('Home/user/reg');?>">免费注册</a>
      </li>
      <li class="fl J_login_status dn islogin"><a href="<?php echo U('Home/user/index');?>" class="userinfo" title="" target="_self"></a>
      	<a href="<?php echo U('Home/user/logout');?>" style="margin:0 10px;" title="退出" target="_self">退出</a></li>
      <li class="fl sep"></li>
      <!-- 
      <li class="fl select-city dropdown">
        <span class="menu-item">
        <span>送货至：</span>
        <a title="" alt="" href="" class="J_cur_place"></a><i class="dd"></i></span>
      </li>-->
    </ul>
    <ul class="fr bar-right">
      <li class="fl dropdown my-feiniu"><a class="menu-item" target="_blank" href="<?php echo U('Home/Newjoin/index');?>">
        <span>商家入驻</span><i class="dd"></i></a>
        <ul class="sub-panel">
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/seller/Admin/login');?>">商家登录</a></li>
        </ul>
      </li>
      <li class="fl dropdown my-feiniu"><a class="menu-item" target="_blank" href="<?php echo U('Home/user/index');?>">
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
      <li class="fl"><a class="menu-item" href="<?php echo U('Home/Article/detail',array('article_id'=>17));?>" target="_blank">
        <span>帮助中心</span></a></li>
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
<div class="m-top-sidebar m-sdb-sale J-sdb " moduleId="2026855" style="z-index:401;" fnp="m-top-sidebar">
  <div class="t-pic"><a href="" target="_blank" class="img-small"><img class="img100" src="/Template/pc/soubao/Static/images/csmrrvbluacaoflbaacb1akwoks248.jpg"></a><a href="" target="_blank" class="img-big"><img class="img100" src="/Template/pc/soubao/Static/images/csmrsfbluaoaejs7aacni7xvdgs548.jpg"></a></div>
  <div class="t-main"><a href="" class="bg-floor"></a>
    <div class="tb-tabs">
      <div class="tb-tabs-up">
      	<a href="<?php echo U('Home/Cart/cart');?>" class="i-cart" data-role="ico-cart"><i></i>
        <span class="text">购物车</span><span id ="miniCartRightQty" class="num">0</span></a>
        <a href="<?php echo U('/Home/User/order_list');?>" target="_blank" class="i-ico i-ico-order" data-role="ico-btn">
        <span>我的订单</span><i class="demo-icon">&#xe807;</i></a>
        <a href="<?php echo U('/Home/User/coupon');?>" target="_blank" class="i-ico i-ico-coupon" data-role="ico-btn">
        <span>我的优惠券</span><i class="demo-icon">&#xe80f;</i></a>
        <a href="<?php echo U('/Home/User/goods_collect');?>" target="_blank" class="i-ico i-ico-fav" data-role="ico-btn">
        <span>我的收藏</span><i class="demo-icon">&#xe808;</i></a>
        <a href="<?php echo U('/Home/User/comment');?>" target="_blank" class="i-ico i-ico-foot" data-role="ico-btn">
        <span>我的评论</span><i class="demo-icon">&#xe805;</i></a>
      </div>
      <div class="tb-tabs-down">
        <div class="rel" style="display: none;" id="cms_share">
          <div data-tag="share_1" class="bdsharebuttonbox"><a data-cmd="more" class="bds_more" href=""></a></div>
          <a class="i-ico i-ico-share" href="">
          <span>分享</span>
          <i></i></a></div>
        <a href="" target="_blank" class="i-ico i-ico-ur" data-role="ico-btn">
        <span>意见反馈</span>
        <i></i></a><a href="" class="i-ico i-ico-gotop" data-role="ico-gotop"><em></em>
        <span>返回顶部</span>
        <i></i></a></div>
      <div class="my-cart-shim"></div>
    </div>
    <div class="my-cart">
      <div class="mn-c-top" ><a href="">我的购物车</a><i data-role="cart-close-btn"></i></div>
      <div class="sub-panel u-fn-cart u-mn-cart">
        <div id="miniCartRight"></div>
        <div class="empty-c fn-hide">
          <span class="ma"><i class="c-i oh"></i>购物车中没有TPshop商品哟！</span>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="m-top-search editable" moduleId="1539927" style="position:relative;min-height:35px;">
  <div class="container">
    <div class="logo fl">
    	<a href="/" target="_blank" class="item fl">
    	<img height="60" width="160" src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>"></a>
    	<!-- <a href="" target="_blank" class="item fl"><img height="60" width="140" src="/Template/pc/soubao/Static/images/csmrrvbluvoamtx8aaeoswlm7gg007.gif"></a>--
    	<a href="http://beauty.tp-shop.cn" target="_blank" class="item fl">
    		<img height="60" width="140" src="http://img14.fn-mart.com/group1/M00/DC/08/CsnBP1Y691GAZQRtAAAGc8GxEf8284.png">
    	</a>-->
    </div>
    <div fnp="m-top-search-form" class="m-top-search-form fl">
       <form name="sourch_form" id="sourch_form" method="post" action="<?php echo U("/Home/Goods/search");?>">
        <div data-role="form-inner" class="s-form"><i class="s-ico"></i>
          <input type="text" data-role="input-search" autocomplete="off" class="fl s-input" name="q" id="q" value="<?php echo I('q'); ?>" placeholder="搜索关键字"/>
          <a data-role="btn" href="javascript:void(0);" class="s-btn fl" onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();">搜索</a>
        </div>
        <div class="s-hotword">           
        	<?php if(is_array($tpshop_config["hot_keywords"])): foreach($tpshop_config["hot_keywords"] as $k=>$wd): ?><a href="<?php echo U('Home/Goods/search',array('q'=>$wd));?>" <?php if($wd == I('q')): ?>class="ht"<?php endif; ?>><?php echo ($wd); ?></a><?php endforeach; endif; ?>
        </div>
        <ul data-role="tip-list" class="s-tip-list">
        </ul>
      </form>
    </div>
    <div class="my-cart fr" id="hd-my-cart">
      <p class="c-n fl">我的购物车</p>
      <p class="c-num fl quantity">(<span class="count cart_quantity" id="cart_quantity"></span>) <i class="i-c oh"></i></p>
      <div id="show_minicart" class="sub-panel u-fn-cart u-mn-cart">
        <div id="minicart" class="minicartContent">
          <div class="empty-c fn-hide">
            <span class="ma"><i class="c-i oh"></i>购物车中没有TPshop商品哟！</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div fnp="m-top-search-fixed" class="m-top-search-fixed"><i class="s-bg"></i>
  <div class="fix-bar">
    <div class="container">
      <div class="u-g-logo fl"><a target="_blank" class="fl logo" href=""><img height="40" width="100" src="/Template/pc/soubao/Static/images/logo3.png"></a></div>
      <div fnp="m-top-search-form" class="m-top-search-form fl">
        <form data-role="form" action="http://search.tp-shop.cn">
          <div data-role="form-inner" class="s-form"><i class="s-ico"></i>
            <input type="text" data-role="input-search" autocomplete="off" class="fl s-input" name="q">
            <input type="hidden" data-role="input-c" name="cpseq" disabled="disabled">
            <a data-role="btn" href="" class="s-btn fl">搜索</a></div>
          <ul data-role="tip-list" class="s-tip-list">
          </ul>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="m-top-nav editable" moduleId="1539926" style="position:relative;min-height:35px;">
  <div class="main-container new-year">
    <div class="main-title-wrap">
    	<a href="javascript:" target="_blank" class="main-title">
      		<span class="ico"><i class="il il-lt"></i><i class="il il-lc"></i><i class="il il-lb"></i>
      		<i class="il il-rt"></i><i class="il il-rc"></i><i class="il il-rb"></i></span>
      		商城商品分类
      	</a>
      <div class="main-slider" style ="display:none;position: absolute;top: 40px;">
          <div fnp="nav-list" class="nav-list eidtModule" moduleId="nav">
            <ul class="nav-list-warpper">
              <?php
 $md5_key = md5("select * from `__PREFIX__goods_category` where is_show = 1 and `level` = 1  limit 15"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__goods_category` where is_show = 1 and `level` = 1  limit 15"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li data-role="nav-item" class="nav-item" index="<?php echo ($v["id"]); ?>">
	                <span class="nav-menu-item"><i class="iconfont icon"></i>
	                <span class="title"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id]));?>" target="_blank"><?php echo ($v["name"]); ?></a></span>
	                </span>
	              </li><?php endforeach; ?>
            </ul>
           <?php if(is_array($goods_category_tree)): foreach($goods_category_tree as $k=>$vo): ?><div data-role="menu-sub" class="menu-sub" index ="<?php echo ($k); ?>" style="height:440px">
		        <div class="sub-columns">
		        	<?php if(is_array($vo["tmenu"])): foreach($vo["tmenu"] as $k2=>$v2): if($k2%3 == 0): ?><div class="fn-clear column-item">
		                  <div class="tlt">
		                    <span class="name"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>" target="_blank"><?php echo ($v2["name"]); ?></a></span>
		                  </div>
		                  <div class="words">
		                  	<?php if(is_array($v2["sub_menu"])): foreach($v2["sub_menu"] as $key=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>" <?php if($v3[is_hot] == 1): ?>class="lh"<?php endif; ?> target="_blank"><?php echo ($v3["name"]); ?></a><?php endforeach; endif; ?>
		                  </div>
		                </div><?php endif; endforeach; endif; ?>
	            </div>
	            
	            <div class="sub-columns">
		        	<?php if(is_array($vo["tmenu"])): foreach($vo["tmenu"] as $k2=>$v2): if($k2%3 == 1): ?><div class="fn-clear column-item">
		                  <div class="tlt">
		                    <span class="name"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>" target="_blank"><?php echo ($v2["name"]); ?></a></span>
		                  </div>
		                 <div class="words">
		                  	<?php if(is_array($v2["sub_menu"])): foreach($v2["sub_menu"] as $key=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>" <?php if($v3[is_hot] == 1): ?>class="lh"<?php endif; ?> target="_blank"><?php echo ($v3["name"]); ?></a><?php endforeach; endif; ?>
		                  </div>
		                </div><?php endif; endforeach; endif; ?>
	            </div>
		        <div class="sub-columns">
		        	<?php if(is_array($vo["tmenu"])): foreach($vo["tmenu"] as $k2=>$v2): if($k2%3 == 2): ?><div class="fn-clear column-item">
		                  <div class="tlt">
		                    <span class="name"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>" target="_blank"><?php echo ($v2["name"]); ?></a></span>
		                  </div>
		                  <div class="words">
		                  	<?php if(is_array($v2["sub_menu"])): foreach($v2["sub_menu"] as $key=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>" <?php if($v3[is_hot] == 1): ?>class="lh"<?php endif; ?> target="_blank"><?php echo ($v3["name"]); ?></a><?php endforeach; endif; ?>
		                  </div>
		                </div><?php endif; endforeach; endif; ?>
	            </div>
	            <div class="right-wrap">
                <ul class="li-item">
                  <?php if(is_array($vo["brand"])): $i = 0; $__LIST__ = $vo["brand"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$br): $mod = ($i % 2 );++$i;?><li class="item" <?php if(($mod) == "1"): ?>even<?php endif; ?>>
	                  	<a href="<?php echo U('Goods/goodsList',array('brand_id'=>$br[id]));?>" target="_blank">
	                  	<img class="nav-prod" src="/Template/pc/soubao/Static/images/loading.gif" alt="" data-images="<?php echo ($br["logo"]); ?>"></a>
	                  </li><?php endforeach; endif; else: echo "" ;endif; ?>
               	  <li class="item"><a href="" target="_blank"><img class="nav-prod" src="/Template/pc/soubao/Static/images/loading.gif" alt="" data-images="http://img18.fn-mart.com/pic/ceb9133a1f582292acba/BzHznn5T_2tlKguMj2/7imGea0GgaXxzG/CsmRslaV66qAPaFEAAANRKhmwYQ120.png"></a></li>
                  <li class="item even"><a href="" target="_blank"><img class="nav-prod" src="/Template/pc/soubao/Static/images/loading.gif" alt="" data-images="http://img16.fn-mart.com/pic/d0fa133a2028dd2c1cad/Bnq2zz72_2fMKdudf2/1YoaSyWGPykRMy/CsmRsFam0vmAfovCAAB1Wrm172E209.jpg"></a></li>
                </ul>
                <?php $pid =80+$k;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1479369600 and end_time > 1479369600 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 1- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$vv): $vv[position] = $ad_position[$vv[pid]]; if($_GET[edit_ad] && $vv[not_adv] == 0 ) { $vv[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $vv[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$vv[ad_id]"; $vv[title] = $ad_position[$vv[pid]][position_name]."===".$vv[ad_name]; $vv[target] = 0; } ?><a href="<?php echo ($vv["ad_link"]); ?>" target="_blank">
	          	   	  <img title="<?php echo ($vv[title]); ?>" style="<?php echo ($vv[style]); ?>" data-images="<?php echo ($vv[ad_code]); ?>" class="right-img nav-prod" src="/Template/pc/soubao/Static/images/loading.gif">
	          	   </a><?php endforeach; ?> 
                </div>
	        </div><?php endforeach; endif; ?>
       </div>
      </div>
    </div>
    <ul class="main-nav">
      <li class="nav-item"><a class="menu-item <?php if( CONTROLLER_NAME == 'Index' ): ?>menu-item-active"<?php endif; ?> target="_blank" href="/" style="overflow: visible;">首页 </a></li>
      <?php
 $md5_key = md5("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li class="nav-item"><a  style="overflow: visible;"   href="<?php echo ($v[url]); ?>" 
       		<?php  if($_SERVER['REQUEST_URI']==str_replace('&amp;','&',$v[url])){ echo "class='menu-item menu-item-active'";} else{ echo "class='menu-item'"; } ?>> <?php echo ($v[name]); ?> </a></li><?php endforeach; ?>
      <li class="nav-item"><a class="menu-item " href="javascript:void();" style="overflow: visible;">TPshop商城<i class="e-hot"></i></a></li>
    </ul>  
   </div>
</div>
<div>
  <div class="J_side_nav_trigger"></div>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('.main-title').hover(function(){
	 	$('.main-slider').show();
	}, function(){
	 	$('.main-slider').hide();
	});
	
	$('.nav-list-warpper').hover(function(){
	 	$('.main-slider').show();
	}, function(){
	 	$('.main-slider').hide();
	});
	     
	get_cart_num();
	var uname= getCookie('uname');
	if(uname == ''){
		$('.islogin').remove();
		$('.nologin').show();
	}else{
		$('.nologin').remove();
		$('.islogin').show();
		$('.userinfo').html(decodeURIComponent(uname));
	}
});


function get_cart_num(){
  var cart_cn = getCookie('cn');
  if(cart_cn == ''){
	$.ajax({
		type : "GET",
		url:"/index.php?m=Home&c=Cart&a=header_cart_list",//+tab,
		success: function(data){								 
			cart_cn = getCookie('cn');						
		}
	});	
  }
  $('#cart_quantity').html(cart_cn);
  $('#miniCartRightQty').html(cart_cn);
}
</script>
<style type="text/css">
.gome-layout-area {width: 990px;margin: 0 auto;overflow: hidden;margin-bottom:30px;}
.gome-part {width: 990px;overflow: hidden;margin-top: 50px;}
.gome-merchants-settled {float: left;width: 290px;overflow: hidden;}
.mr60 {margin-right: 60px;}
.mt45 {margin-top: 45px;}
.gome-merchants-settled span {float: left;}
.settled-list { float: left;margin: 0 0 0 19px;width: 181px; height: 90px;
}
.settled-list li.list-title {
    font: bold 16px/16px '微软雅黑';background: none;padding: 0;height: 24px;margin-bottom: 3px;
}
.settled-list li {
    list-style: none;
    background: url(/Template/pc/soubao/Static/images/list-point.jpg) no-repeat center left;
    padding: 0 0 0 14px;font: normal 12px/22px '新宋体';overflow: hidden;height: 22px;
}
.settled-list li a {
    width: 130px;overflow: hidden;white-space: nowrap;
    text-overflow: ellipsis;color: #888888;float: left;text-decoration: none;
}
.settled-process-title {
    width: 990px;text-align: left;font: normal 24px/24px '微软雅黑';margin-bottom:40px;
}
.settled-process {
    width: 990px;overflow: hidden;margin: 20px 0;background: #fafafa;border-top: 1px solid #e8e8e8;
}
.settled-process-title span {float: left;}
.settled-process-title a {
    float: right;font: normal 12px/12px '新宋体';color: #0066cc;margin: 12px 0 0 0;
}
.settled-merchants-title {
    width: 990px;text-align: left;font: 400 24px/24px '微软雅黑';border-bottom: 1px solid #e8e8e8;
}
.settled-merchants-title span {float: left;}
.merchants-list {float: left;margin-left: 50px;}
.merchants-list li {
    list-style: none;float: left;
    font: 400 12px/22px '新宋体';color: #5e5e5e;
    text-align: center;width: 150px;
    height: 34px; margin-right: 6px;cursor: pointer;
}
.merchants-list li.active {border-bottom: 4px solid #c00;height: 30px; color: #c00;}
.merchants-tab-con {
    float: left;width: 990px;overflow: hidden;margin: 30px 0 0;display: none;
}
.merchants-tab-con img {float: left;margin: 1px 0 0 1px;}
#cms_first_dom{width:100%}
.bgs{width:100%;height:300px;background-position:50% 0px;background-repeat:no-repeat;margin-bottom:20px}
.zs_kv_box{position:relative;width:1190px;height:300px;margin:0 auto}
.p_c_list{position:relative;overflow:hidden}.p_c_list ul{position:absolute}
.p_c_list ul li{display:inline-block;float:left;margin-right:10px}
.p_c_hd{position:absolute;bottom:10px;right:280px;z-index:8}
.p_c_hd ul li{width:12px;height:12px;border-radius:50%;text-indent:-9999px;margin-right:10px;background:#999;border:1px #999 solid;float:left;cursor:pointer}
.p_c_hd ul li.on{background:#fff}.kv_enter{position:absolute;top:0px;right:0px;width:250px;height:300px;z-index:5}
.en_btn{position:absolute;left:35px;top:60px;width:180px;height:40px;background-color:#f93;border-radius:5px;-moz-border-radius:5px;-ms-border-radius:5px;-o-border-radius:5px;-moz-border-radius:5px;line-height:40px;text-align:center;z-index:5}
.en_btn a{font-family:'microsoft yahei';font-size:16px;color:#fff}
.en_btn_check{top:160px}
.en_bg{filter:alpha(opacity=30);-moz-opacity:.3;-khtml-opacity:.3;opacity:.3;width:250px;height:300px;background:#000;z-index:0}
</style>
<div id="cms_first_dom">
	<div id="anchor_div1343768" showbegintime="" showendtime="" isrelatedpro="0" data-tpa="m1343768">
		<div class="bgs" id="bgs" style="background-color: rgb(176, 176, 178);">
			<div class="zs_kv_box" id="pic_change">
				<div class="kv_enter">
					<div class="en_btn"><a href="<?php echo U('Newjoin/agreement');?>">立即入驻</a></div>
					<div class="en_btn en_btn_check"><a href="<?php echo U('Newjoin/agreement');?>">查询入驻进度</a></div>
					<div class="en_word"></div>
					<div class="en_bg"></div>
				</div>
				<div class="p_c_list" id="p_c_list" style="width: 1190px; height: 300px;">
					<ul style="height: 300px;">
						<li style="width: 1190px; height: 300px;"><a href="#" target="_blank"><img src="/Template/pc/soubao/Static/images/ChEi1VZOfxKAIxDuAAMyOSmDp6o48200_980x260.jpg" style="width: 980px; height: 260px;"></a></li>
						<li style="width: 1190px; height: 300px;"><a href="" target="_blank"><img src="/Template/pc/soubao/Static/images/ChEi2VarLLqAKgfNAAGy66GXUgM18600_718x252.jpg" style="width: 980px; height: 260px;"></a></li>
						<li style="width: 1190px; height: 300px;"><a href="" target="_blank"><img src="/Template/pc/soubao/Static/images/ChEi11ZOf0CAIQpJAALagKKoyh451000_980x260.jpg" style="width: 980px; height: 260px;"></a></li>
						<li style="width: 1190px; height: 300px;"><a href="" target="_blank"><img src="/Template/pc/soubao/Static/images/ChEbu1ZOf1SAUc92AAGT_H-E6dI45200_980x260.jpg" style="width: 980px; height: 260px;"></a></li>
					</ul>
				</div>
				<div class="p_c_hd" id="p_c_hd">
					<ul></ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="gome-layout-area">
    	<div class="gome-part">
	    			<div class="gome-merchants-settled   mr60"> 
					<span><img width="90" height="90" src="http://img13.gomein.net.cn/image/prodimg/promimg/topics/201412/20141222113505.jpg"></span>
			            <ul class="settled-list">
			              <li class="list-title"><a href="" target="_blank">信息公告</a></li>
			              		<li><a href="" target="_blank" title="【通知】商品规格参数数据维护工作安排">【通知】商品规格参数数据维护工作安排</a></li>
			              		<li><a href="" target="_blank" title="【功能优化】商品级广告语功能增加">【功能优化】商品级广告语功能增加</a></li>
			              		<li><a href="" target="_blank" title="【功能优化】商品级广告语功能增加">【功能优化】商品级广告语功能增加</a></li>
			            </ul>
          			</div>
	    			<div class="gome-merchants-settled   mr60"> 
							<span><img width="90" height="90" src="http://img14.gomein.net.cn/image/prodimg/promimg/topics/201412/20141222113832.jpg"></span>
			            <ul class="settled-list">
			              <li class="list-title"><a href="" target="_blank">招商标准</a></li>
			              		<li><a href="" target="_blank" title="招商方向">招商方向</a></li>
			              		<li><a href="" target="_blank" title="招商政策">招商政策</a></li>
			              		<li><a href="" target="_blank" title="入驻资质">入驻资质</a></li>
			            </ul>
          			</div>
	    			<div class="gome-merchants-settled   "> 
							<span><img width="90" height="90" src="http://img10.gomein.net.cn/image/prodimg/promimg/topics/201412/20141222114426.jpg"></span>
			            <ul class="settled-list">
			              <li class="list-title"><a href="" target="_blank">资费标准</a></li>
			              		<li><a href="" target="_blank" title="资费标准">资费标准</a></li>
			              		<li><a href="" target="_blank" title="代运资费">代运资费</a></li>
			              		<li><a href="" target="_blank" title="入驻须知">入驻须知</a></li>
			            </ul>
          			</div>
	    			<div class="gome-merchants-settled mt45 mr60"> 
							<span><img width="90" height="90" src="http://img11.gomein.net.cn/image/prodimg/promimg/topics/201412/20141222114116.jpg"></span>
			            <ul class="settled-list">
			              <li class="list-title"><a href="http://help.gome.com.cn/question/246.html" target="_blank">TPSHOP优势</a></li>
			              		<li><a href="" target="_blank" title="发展优势">发展优势</a></li>
			              		<li><a href="" target="_blank" title="物流优势">物流优势</a></li>
			              		<li><a href="" target="_blank" title="品牌优势">品牌优势</a></li>
			            </ul>
          			</div>
	    			<div class="gome-merchants-settled mt45 mr60"> 
							<span><img width="90" height="90" src="http://img12.gomein.net.cn/image/prodimg/promimg/topics/201412/20141222114302.jpg"></span>
			            <ul class="settled-list">
			              <li class="list-title"><a href="http://help.gome.com.cn/seller" target="_blank">帮助中心</a></li>
			              		<li><a href="" target="_blank" title="平台总则">平台总则</a></li>
			              		<li><a href="" target="_blank" title="业务规范">业务规范</a></li>
			              		<li><a href="" target="_blank" title="店铺促销">店铺促销</a></li>
			            </ul>
          			</div>
			    		<div class="gome-merchants-settled mt45">
			                <span><img src="http://app.gomein.net.cn/images/icon6.jpg" width="90" height="90"></span>
			                <ul class="settled-list">
				              <li class="list-title"><a href="" target="_blank">联系方式</a></li>
				              <li>入驻咨询QQ群：216961593</li>
				              <li><a href="" target="_blank" class="blue" title="招商电话点此链接">招商电话点此链接</a></li>
				              <li><a href="" target="_blank" class="blue" title="caobaocang@yolo24.com">0755-86140485</a></li>
			                </ul>
			            </div>
      </div>
      <div class="gome-part">
      	<div class="settled-process-title clearfix"><span>入驻流程</span><a href="" class="blue" target="_blank">查看入驻标准 &gt;</a></div>
          <div class="settled-process mt45">
          		<img src="/Template/pc/soubao/Static/images/20141222115236.jpg" width="990" height="225">
          </div>
      </div>
      <div class="gome-part" id="merchants-tab">
        <div class="settled-merchants-title clearfix">
            <span>热招品牌</span>
            <ul class="merchants-list" id="merchants-list">
                <?php
 $md5_key = md5("select * from `__PREFIX__brand` where status = 0 group by cat_name "); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__brand` where status = 0 group by cat_name "); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li class="<?php if($k == 0): ?>active<?php endif; ?>"><?php echo ($v[cat_name]); ?></li>
                        <!--<li class="active">汽车用品</li>--><?php endforeach; ?>
            </ul>
        </div>
		  	<?php
 $md5_key = md5("select * from `__PREFIX__brand` group by cat_name"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__brand` group by cat_name"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><div class="merchants-tab-con" style="display: <?php if($k == 0): ?>block <?php else: ?>none<?php endif; ?>;">
						<?php
 $md5_key = md5("select * from `__PREFIX__brand` where cat_name = '$v[cat_name]'"); $result_name = $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__brand` where cat_name = '$v[cat_name]'"); S("sql_".$md5_key,$sql_result_v2,1); } foreach($sql_result_v2 as $k2=>$v2): ?><img src="<?php echo ($v2[logo]); ?>" width="164" height="58" alt="<?php echo ($v2[name]); ?>"><?php endforeach; ?>
                    </div><?php endforeach; ?>
            </div>
    </div>
<div class="fn-cms-footer">
  <div class="m-footer-g">
    <div class="footer-map">
      <ul class="fn-clear">
        <li class="map"><i class="footer-icon z-icon"></i><strong class="tit">正品低价</strong><br/>
          <span class="desc">正品行货 品质保障</span>
        </li>
        <li class="line"></li>
        <li class="map"><i class="footer-icon q-icon"></i><strong class="tit">品类齐全</strong><br/>
          <span class="desc">品类齐全 选择丰富</span>
        </li>
        <li class="line"></li>
        <li class="map"><i class="footer-icon k-icon"></i><strong class="tit">快速配送</strong><br/>
          <span class="desc">多仓直发 极速配送</span>
        </li>
        <li class="line"></li>
        <li class="map"><i class="footer-icon t-icon"></i><strong class="tit">售后无忧</strong><br/>
          <span class="desc">7天无理由退货</span>
        </li>
      </ul>
    </div>
    <div class="server-list">
      <ul class="fn-clear">
	    <?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where parent_id = 2"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where parent_id = 2"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li><i class="list-icon icon<?php echo ($k+1); ?>"></i>
          <dl class="list-item">
            <dt><?php echo ($v[cat_name]); ?></dt>
            <?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1"); $result_name = $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__article` where cat_id = $v[cat_id]  and is_open=1"); S("sql_".$md5_key,$sql_result_v2,1); } foreach($sql_result_v2 as $k2=>$v2): ?><dd><a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>"><?php echo ($v2[title]); ?></a></dd><?php endforeach; ?>
          </dl>
        </li><?php endforeach; ?>
        <li class="app-item">
          <p>TPshop官网</p>
          <img width="90" height="90" title="" alt="TPshop网客户端" src="/Template/pc/soubao/Static/images/qrcode_vmall_app01.png">
        </li>
      </ul>
    </div>
    <div class="site-info">
      <div class="foot-nav">
        <?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = 5 and is_open=1"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article` where cat_id = 5 and is_open=1"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><a href="<?php echo U('Home/Article/detail',array('article_id'=>$v[article_id]));?>" target="_blank"><?php echo ($v[title]); ?></a>|<?php endforeach; ?>
	      <a href="<?php echo U('Newjoin/index');?>" target="_blank">商家入驻</a>| 
	      <a href="<?php echo U('Article/detail',array('article_id'=>19));?>" target="_blank">招商标准</a>| 
	      <a href="" style="cursor:default;text-decoration:none;">客服热线 <?php echo ($tpshop_config['shop_info_phone']); ?></a>
	  </div>
      <div class="link">
        <p>
        Copyright © 2016-2025 <?php echo ($tpshop_config['shop_info_store_name']); ?>  版权所有 保留一切权利 备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?>
        
        <!--您好,请您给TPshop留个友情链接-->
        &nbsp;&nbsp;<a href="http://www.tp-shop.cn/">TPshop开源商城</a>
        <!--您好,请您给TPshop留个友情链接-->         
        </p>
      </div>
      <div class="inline-box logowall"><a href="" class="item shgs" target="_blank"></a><a href="" class="item shwl" target="_blank"></a><a href="" class="item cxwz" target="_blank"></a><a href="" class="item kxwz" target="_blank"></a><a href="" class="item hyyz" target="_blank"></a></div>
    </div>
  </div>
</div>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/common.js"></script> 

<script type='text/javascript'>
$(document).ready(function(){
    move_pic();
    $('#merchants-list li').each(function(i,o){
    	$(o).hover(function(){
    		$(o).siblings().removeClass('active');
    		$(o).addClass('active');
    		$('.merchants-tab-con').hide();
    		$('.merchants-tab-con').eq(i).show();
    	});
    })
});
function move_pic() {
	var p_width = 1190;//图片宽度
	var p_height = 300;//图片高度
	var speed = 500;//滑动快慢
	var interval_speed = 5000//自动滑动间隔时间
	
	var p_now = 0;//当前显示第几屏
	var one_pic = 1;//每屏显示图片数量
	var bgs = $("#bgs");
	var pic_change = $("#pic_change");
	var p_c_list = $("#p_c_list");
	var pic_ul = p_c_list.find("ul");
	var pic_li = p_c_list.find("li");
	var p_num = pic_li.length;//屏数，小按钮数量
	var p_c_hd = $("#p_c_hd");
	var hd_ul = p_c_hd.find("ul");
	var k=0;//根据p_num判断小按钮数量
	var html_li = "<li></li>";
	for(k;k<p_num;k++){
		hd_ul.append(html_li);
	}
        
	var hd_li = p_c_hd.find("li");
	var box_width = p_width*one_pic+(one_pic-1)*10;//外框宽度	
	var all_width = (p_width+10)*p_num;//ul框架宽度
	
	//滑动
	function slideAnim(p_now){
		pic_ul.stop(true,false).animate({left:-(p_width+10)*p_now},speed);
		change_hd_li(p_now);
		change_color(p_now);
	}
	//变换背景颜色	
	function change_color(p_now){
		if(p_now==0){
		bgs.css("background-color","#C7422F");	
			}
		else if(p_now==1){
		bgs.css("background-color","#004797");	
			}
		else if(p_now==2){
		bgs.css("background-color","#313b33");	
			}
		else if(p_now==3){
		bgs.css("background-color","#b0b0b2");	
			}
		}	
	//变换小按钮样式	
	function change_hd_li(p_now){
		hd_li.removeClass("on");
    	hd_li.eq(p_now).addClass("on");	
	}
	//点击小按钮滑动
	hd_li.click(function() {
		var li_n = $(this);
    	p_now = li_n.index();
		slideAnim(p_now);
	});	
		
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
 	pic_change.hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			p_now++;
			if(p_now == p_num) {p_now = 0;}
			slideAnim(p_now);
		},interval_speed);
	}).trigger("mouseleave");
	
	//init
	function init(){
		bgs.css("background-color","#C7422F");
		p_c_list.css({
			width:box_width,
			height:p_height
		});
		pic_ul.css({
			width:all_width+10,
			height:p_height
		});
		pic_li.css({
			width:p_width,
			height:p_height
		});	
		pic_li.find("img").css({
			width:p_width,
			height:p_height
		});
		hd_li.eq(p_now).addClass("on");	
	}//init------end
	init();		
}
</script>
</body>
</html>