<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="utf-8" />
    <meta name="renderer" content="webkit|ie-comp|ie-stand" />
    <meta http-equiv="Cache-control" content="public" max-age="no-cache" />
    <link rel="shortcut icon"  href="http://static02.fn-mart.com/img/feiniu_favicon.ico" />
    <link rel="apple-touch-icon" sizes="114x114" href="http://static02.fn-mart.com/images/touch-icon-iphone-136.png" />
    <link rel="alternate" media="only screen and (max-width:640px)" href="http://m.tp-shop.cn/category/C18973">
    <meta name="applicable-device" content="pc">
    <meta name="mobile-agent" content="format=html5;url=http://m.tp-shop.cn/category/C18973">
    <title>商品列表-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
    <meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
    <meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
    <!--[if lte IE 9]>
    <script src="http://static02.fn-mart.com/js/html5.js"></script>
    <script src="http://static02.fn-mart.com/js/IE9.js"></script>
    <link rel="stylesheet" type="text/css" href="http://static02.fn-mart.com/css/ie.css"/>
    <![endif]-->
    <link rel="stylesheet" href="/Template/pc/soubao/Static/css/integral.css">
    <link rel="stylesheet" href="/Template/pc/soubao/Static/css/page.css">
    <style type="text/css">
        .num{bottom: 0 !important;}
    </style>
</head>
<body>
<script type="text/javascript" src="/Public/js/jquery-1.10.2.min.js"></script>
<script src="/Public/js/global.js"></script>
<script src="/Public/js/layer/layer.js"></script> 
<link rel="stylesheet" type="text/css" href="/Template/pc/soubao/Static/css/common.min.css">
<link rel="stylesheet" type="text/css" href="/Template/pc/soubao/Static/css/main.min.css">
<div class="fn-cms-top">
<?php $pid =1;$ad_position = M("ad_position")->cache(true,TPSHOP_CACHE_TIME)->getField("position_id,position_name,ad_width,ad_height");$result = D("ad")->where("pid=$pid  and enabled = 1 and start_time < 1479366000 and end_time > 1479366000 ")->order("orderby desc")->cache(true,TPSHOP_CACHE_TIME)->limit("1")->select(); if(!in_array($pid,array_keys($ad_position)) && $pid) { M("ad_position")->add(array( "position_id"=>$pid, "position_name"=>CONTROLLER_NAME."页面自动增加广告位 $pid ", "is_open"=>1, "position_desc"=>CONTROLLER_NAME."页面", )); delFile(RUNTIME_PATH); } $c = 1- count($result); if($c > 0 && $_GET[edit_ad]) { for($i = 0; $i < $c; $i++) { $result[] = array( "ad_code" => "/Public/images/not_adv.jpg", "ad_link" => "/index.php?m=Admin&c=Ad&a=ad&pid=$pid", "title" =>"暂无广告图片", "not_adv" => 1, "target" => 0, ); } } foreach($result as $key=>$v): $v[position] = $ad_position[$v[pid]]; if($_GET[edit_ad] && $v[not_adv] == 0 ) { $v[style] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; $v[ad_link] = "/index.php?m=Admin&c=Ad&a=ad&act=edit&ad_id=$v[ad_id]"; $v[title] = $ad_position[$v[pid]][position_name]."===".$v[ad_name]; $v[target] = 0; } ?><div fnp="m-top-banner" style="background:<?php echo ($v["bgcolor"]); ?>;" class="m-top-banner rel editable" moduleId="2010053" style="position:relative;min-height:35px;">
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
      <li class="fl dropdown my-feiniu"><a class="menu-item" target="_blank" href="<?php echo U('/Home/User/index');?>">
        <span>我的商城</span>
        <i class="dd"></i></a>
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
  <div class="t-main">
    <div class="tb-tabs">
      <div class="tb-tabs-up">
      	<a href="<?php echo U('Home/Cart/cart');?>" class="i-cart" data-role="ico-cart">
        <span class="text">购物车</span><span id ="miniCartRightQty" class="num"></span></a>
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
        <a href="" target="_blank" class="i-ico i-ico-ur" data-role="ico-btn">
        <span>意见反馈</span>
        <i></i></a><a href="" class="i-ico i-ico-gotop" data-role="ico-gotop"><em></em>
        <span>返回顶部</span>
        <i></i></a></div>
      <div class="my-cart-shim"></div>
    </div>
    <div class="my-cart">
      <div class="mn-c-top" ><a href="<?php echo U('Home/Cart/cart');?>">我的购物车</a><i data-role="cart-close-btn"></i></div>
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
    	<a href="/" target="_blank" class="item fl"><img height="60" width="160" src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>"></a>
    	<!-- <a href="" target="_blank" class="item fl"><img height="60" width="140" src="/Template/pc/soubao/Static/images/csmrrvbluvoamtx8aaeoswlm7gg007.gif"></a>-->
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

        </div>
      </div>
    </div>
  </div>
</div>

<div class="m-top-nav editable" moduleId="1539926" style="position:relative;min-height:35px;">
  <div class="main-container new-year">
    <div class="main-title-wrap"><a href="" target="_blank" class="main-title">
      <span class="ico"><i class="il il-lt"></i><i class="il il-lc"></i><i class="il il-lb"></i>
      <i class="il il-rt"></i><i class="il il-rc"></i><i class="il il-rb"></i></span>商城商品分类</a>
      <!--  <div class="nav-list" fnp="nav-list">
        <ul class="nav-list-warpper">
        </ul>
      </div>-->
    </div>
     
    <ul class="main-nav">
      <li class="nav-item"><a class="menu-item <?php if( CONTROLLER_NAME == 'Index' ): ?>menu-item-active"<?php endif; ?> target="_blank" href="/" style="overflow: visible;">首页 </a></li>
      <?php
 $md5_key = md5("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li class="nav-item"><a  style="overflow: visible;"   href="<?php echo ($v[url]); ?>" 
       		<?php  if($_SERVER['REQUEST_URI']==str_replace('&amp;','&',$v[url])){ echo "class='menu-item menu-item-active'";} else{ echo "class='menu-item'"; } ?>> <?php echo ($v[name]); ?> </a></li><?php endforeach; ?>
      <li class="nav-item"><a class="menu-item "  href="javascript:void();" style="overflow: visible;">TPshop商城<i class="e-hot"></i></a></li>
    </ul>     
    </div>
</div>
<div>
  <div class="J_side_nav_trigger"></div>
</div>
</div>
<script type="text/javascript"> 
$(document).ready(function(){
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
			$('#cart_quantity').html(cart_cn);					
		}
	});	
  }
  $('#cart_quantity').html(cart_cn);
  $('#miniCartRightQty').html(cart_cn);
}
</script>
<div class="content">
    	<div class="main">
        	<div class="exchange">
                <ul id="cate_ul">
                    <li <?php if(empty($_GET['id'])): ?>class="travel"<?php endif; ?> id="cate">
                        <a href="<?php echo U('Home/Goods/integralMall');?>">全部分类</a>
                    </li>
                    <?php if(is_array($store_category)): $i = 0; $__LIST__ = $store_category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$store): $mod = ($i % 2 );++$i;?><li <?php if($store['sc_id'] == $_GET['id']): ?>class="travel"<?php endif; ?>>
                            <a href="<?php echo U('Home/Goods/integralMall',array('id'=>$store['sc_id']));?>"><?php echo ($store['sc_name']); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                 </ul>
            </div>
            <div class="bdnr">
            	<div class="jffw">
                    <div id="range" style="display:inline-block;">
                        积分范围：
                        <input type="text" class="bt_" name="minValue" id="minValue" value="<?php echo ($_GET['minValue']); ?>"> -
                        <input type="text" class="bt_" name="maxValue" id="maxValue" value="<?php echo ($_GET['maxValue']); ?>">
                        <button type="button" id="selectBtn" onclick="search();"><i class="icon-key"></i>查找</button>
                    </div>
                    兑换方式：
                    <select style=" padding:0 5px;" name="brandType" id="brandType">
                         <option value="0">全部</option>
                         <option value="1" <?php if($_GET['brandType'] == 1): ?>selected="selected"<?php endif; ?>>积分+金额</option>
                         <option value="2" <?php if($_GET['brandType'] == 2): ?>selected="selected"<?php endif; ?>>全积分</option>
                    </select>　　
                    <input name="is_new" type="checkbox" <?php if($_GET['is_new'] == 1): ?>checked="checked"<?php endif; ?> value="1" id="is_new"> 新品　　
                    <input name="exchange" type="checkbox" <?php if($_GET['exchange'] == 1): ?>checked="checked"<?php endif; ?> value="" id="exchange"> 我能兑换的商品　　
                    <!--<input name="" type="checkbox" value="" id="memberShip"> 会员专享-->
                    <input name="cat_id" id="cat_id" value="<?php echo ($_GET['id']); ?>" type="hidden" />　
                    <div class="ysp" id="totlePage">共<?php echo ($goods_list_count); ?>个商品
                        <a class="prepage" href="javascript:void(0);" onclick="prePagination();">&lt;</a> 
                        <span><em id="pageIndex"><?php echo ($nowPage); ?></em>/<em id="pageCount"><?php echo ($totalPages); ?></em></span>
                        <a class="nextpage" href="javascript:void(0);" onclick="nextPagination();">&gt;</a>
                    </div>
                </div>
                <div class="jfxq">
                	<ul id="goods_ul">
                        <?php if(is_array($goods_list)): $i = 0; $__LIST__ = $goods_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($i % 2 );++$i;?><!-- <div id="jfdhsp"> -->
                            <li>
                                <p class="p1">
                                    <a target="_blank" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id']));?>">
                                        <img src="<?php echo (goods_thum_images($goods['goods_id'],200,200)); ?>" />
                                    </a>
                                </p>
                                <p class="p2">
                                    <a target="_blank" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id']));?>"><?php echo ($goods['goods_name']); ?></a>
                                </p>
                                <p class="p4">
                                    <span class="lx3">¥</span>
                                    <span class="lx1"><?php echo ($goods['shop_price']-$goods['exchange_integral']/$point_rate); ?></span>
                                    <span class="lx4">+</span>
                                    <span class="lx1"><?php echo ($goods['exchange_integral']); ?></span>
                                    <span class="lx4">积分</span>
                                    <a target="_blank" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id']));?>">立即兑换</a>
                                </p>
                            </li>
                        <!-- </div> --><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div class="djs">
					<?php echo ($page); ?>
               </div>
            </div>
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
<script>
    $(document).ready(function(){
        //切换兑换方式
        $('#brandType').change(function(){
            search();
        });
        //选中新品
        $("#is_new").bind("click", function () {
            search();
        });
        //用户能买的商品
        $("#exchange").bind("click", function () {
            search();
        });
    })

    //搜索
    function search() {
        var minValue = parseInt($('#minValue').val());//积分起始范围
        var maxValue = parseInt($('#maxValue').val());//积分截止范围
        var cat_id = $('#cat_id').val();//商品分类id
        var brandType = $('#brandType').find("option:selected").val();
        var url = "/index.php?m=Home&c=goods&a=integralMall";

        if($('#minValue').val() != ''){
            if(!isPositiveNum(minValue)){
                layer.alert('范围有误', {icon: 2});
                return false;
            }else{
                url += "&minValue="+minValue;
            }
        }

        if($('#maxValue').val() != ''){
            if(!isPositiveNum(maxValue)){
                layer.alert('范围有误', {icon: 2});
                return false;
            }else{
                url += "&maxValue="+maxValue;
            }
        }

        if($('#minValue').val() != '' && $('#maxValue').val() != '' && maxValue < minValue){
            layer.alert('范围有误', {icon: 2});
            return false;
        }


        if(minValue != '' && maxValue != '' && (maxValue >minValue)){
            url += "&minValue="+minValue+"&maxValue="+maxValue;
        }

        if(cat_id!=0 && cat_id!=''){
            url += "&id="+cat_id;
        }

        if(brandType!=''){
            url += "&brandType="+brandType;
        }

        if($("#is_new").is(":checked")){
            url += "&is_new="+1;
        }
        if($("#exchange").is(":checked")){
            url += "&exchange="+1;
        }

        window.location.href=url;
    }

    //检查是否为正整数
    function isPositiveNum(s)
    {
        var re = /^\d+$/;
        console.log(re.test(s));
        return re.test(s);
    }

</script>
</body>
</html>