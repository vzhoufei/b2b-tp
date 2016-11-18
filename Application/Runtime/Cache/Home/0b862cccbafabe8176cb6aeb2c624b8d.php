<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=8">
<title>评论-<?php echo ($tpshop_config['shop_info_store_title']); ?></title>
<meta http-equiv="keywords" content="<?php echo ($tpshop_config['shop_info_store_keyword']); ?>" />
<meta name="description" content="<?php echo ($tpshop_config['shop_info_store_desc']); ?>" />
</head>
<body> 
<!-- 头部-s -->
<link href="/Template/pc/soubao/Static/css/common_www.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/public.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/default.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/art_skin_order.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/common.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/message.index.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="/Template/pc/soubao/Static/css/minicart.css">
<script  type="text/javascript" src="/Template/pc/soubao/Static/js/jquery-1.9.0.min.js"></script>
<script src="/Public/js/global.js"></script>
<!--[if lt IE 9]>
		<script src="js/html5.js"></script>
		<![endif]-->
<style type="text/css">
#global-topbar .topbar-right #msg_center {
	background: none;
}
.topbar-right #msg_center .tips {
	position: absolute;
	left: -30px;
	top: 28px;
	min-width: 70px;
	max-width: 132px;
	height: 20px;
 *line-height: 19px;
	border-radius: 2px;
	padding: 0px 20px 0 10px;
	background: #666;
	color: #fff;/*display: none;*/
}
#msg_center .tips .tip-cnt {
	color: #fff;
	text-decoration: none;
}
#msg_center .tips .tip-cnt span {
	display: block;
	white-space: nowrap;
	overflow: hidden;
	text-overflow: ellipsis;
}
.tips .tip-t {
	position: absolute;
	left: 72px;
	top: -11px;
	width: 0;
	height: 0;
	font-size: 0;
	border-width: 6px;
	border-style: dashed dashed solid dashed;
	border-color: transparent transparent #666 transparent;
}
.tips .tip-times {
	position: absolute;
	display: block;
	right: 5px;
	top: 0px;
	font-size: 16px;
	font-style: normal;
	color: #bfb5b5;
	cursor: pointer;
}
.tips .tip-times:hover {
	color: #fff;
}
#global-topbar .topbar-right #msg_center .num {
	color: #f00;
}
#show_category {
	float:left
}
.catagories {
	display:none
}
#show_category:hover .catagories {
	display:block
}
.catagory-detail {
	display:none;
	min-height:456px
}
#global-nav .catagories li:hover {
	margin-right: -10px;
	color: #fff;
	background: #f22e00;
}
#global-nav .catagories li:hover h3 {
	color:#FFF
}
#global-nav .catagories li h3 a:hover {
	color:#FFF
}
ul.catagories li:hover:after {
	content:"";
	position:absolute;
	border-right:2px solid #f22e00;
	right:-2px;
	height:30px;
	z-index:199;
}
ul.catagories li:hover .catagory-detail {
	display:block
}
.icon-feiniu:before{
	content:'';
	background-image:none;
	display:none;
}
</style>
<div id="global-topbar">
  <div class="topbar-wrapper clearfix">
    <ul class="topbar-left">
      <li class="dropdown my-location">
        <span class="current-place"></span>
        <i class="icon-location icon-down"></i> </li>
    </ul>
    <ul class="topbar-right" id="topbar-right">
      <li id="wellcome_wording"><a href="<?php echo U('Home/user/index');?>"><?php echo ($user['nickname']); ?></a></li>
      <li id="link_signin" style="display: none;"></li>
      <?php if($user_id > 0): ?><li id="link_signup"><a href="<?php echo U('Home/user/logout');?>" class="signup target_no">[退出]</a></li><?php endif; ?>
      <li><a href="<?php echo U('Home/user/index');?>">我的TPshop</a></li>
      <li><a href="<?php echo U('Home/Article/detail',array('article_id'=>17));?>" target="_blank">帮助中心</a></li>
    </ul>
  </div>
</div>
<div class="wrapper clearfix" id="global-header">
  <div id="hd-banner" class="wrapper"> 
    <!--
		<a href="" target="_blank"><img src="/Template/pc/soubao/Static/images/201602261202471456459367_kk-0.jpg" width="1220" height="60" alt""></a>
	--> 
  </div>
  <div id="headerall" class="wrapper clearfix"> <a href="/" title="首页" class="logohref">
    <h1 id="hd-logo" class="icon-feiniu">
      <img src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>"/>
    </h1>
    </a>
<!--搜索框-->
    <div id="hd-search">
      <div class="search-form">
		<form name="sourch_form" id="sourch_form" method="post" action="<?php echo U("/Home/Goods/search");?>">
		  <input type="text" data-role="input-search" autocomplete="off" class="search-keyword"  name="q" id="q" value="<?php echo ($_POST['search_key']); ?>" placeholder="搜索关键字"/>
          <button class="btn-search" type="submit"onclick="if($.trim($('#q').val()) != '') $('#sourch_form').submit();">搜索</button>
        </form>
      </div>
      <div class="hd-hot-keywords">
        <ul id="hotsearch">
        	<?php if(is_array($tpshop_config["hot_keywords"])): foreach($tpshop_config["hot_keywords"] as $k=>$wd): ?><li><a href="<?php echo U('Home/Goods/search',array('q'=>$wd));?>" <?php if($k == 0): ?>class="ht"<?php endif; ?>><?php echo ($wd); ?></a></li><?php endforeach; endif; ?>          
        </ul>
      </div>
    </div>
<!--搜索框  end -->    
    <!--鼠标移动上去 显示购物车-->
    <div id="hd-my-cart">
      <span class="icon-cart-gwc">
      <span class="quantity col888"><b><em class="cart_quantity"></em></b></span>
      </span>
      <p class="icon-cart-hd">我的购物车</p>
      <div id="show_minicart" style="display:none;">
            <?php if(count($cartList) == 0): ?><div id="content_test">
                  <div id="minicart" class="ui_poptip minicart minicartContent">
                    <div class="ui_poptip_container">
                      <div class="ui_poptip_arrow poptip_up"></div>
                      <div class="ui_poptip_content">
                        <span class="nop emptycart">购物车中没有TPshop商品哟！</span>
                      </div>
                    </div>
                  </div>
                </div>
            <?php else: ?>
                <div id="content_test">
                  <div class="ui_poptip minicart minicartContent" id="minicart">
                    <div class="ui_poptip_container">
                      <div class="ui_poptip_arrow poptip_up"></div>
                      <div class="ui_poptip_content">
                        <div class="mini_product">
                          <p class="mini_tit">最新加入商品</p>
                          <div class="cart_con js_cart_top">
                            <?php if(is_array($cartList)): foreach($cartList as $k=>$v): ?><div class="one_active js_camp_list">
                                <ul class="ul_product   js_cart_pro_list" cart_id="798325">
                                  <li><a class="pdetail" href=""><img src="<?php echo (goods_thum_images($v["goods_id"],60,60)); ?>">
                                    <p>
                                      <span class="name"><?php echo ($v[goods_name]); ?></span>
                                      <span class="price"><em class="symbol">¥</em><?php echo ($v[goods_price]); ?></span>
                                    </p>
                                    </a>
                                    <div class="mini_op">                                    
                                    <a class="delete js_delete" onclick="header_cart_del(<?php echo ($v["id"]); ?>);" href="javascript:void(0);">删除</a>
                                    </div>
                                  </li>
                                </ul>
                              </div><?php endforeach; endif; ?>
                          </div>
                          <div class="mini_total clearfix">
                            <p class="cart_num">共<span class="num" id="total_qty"><?php echo ($cart_total_price[anum]); ?></span>件商品</p>
                            <p class="cart_total">
                              <span class="tit">共计</span>
                              <span class="price"><em class="symbol">¥</em>
                              <span id="total_pay"><?php echo ($cart_total_price[total_fee]); ?></span>
                              </span>
                            </p>
                          </div>
                          <p class="cart_bot"><a class="cart_buy" href="<?php echo U('Home/Cart/cart');?>">去购物车结算</a></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><?php endif; ?>       
      </div>
    </div>
    <!--鼠标移动上去 显示购物车 end--> 
  </div>
  <div id="header"></div>
</div>
<nav id="global-nav" class="clearfix">
  <div class="wrapper">
    <div id="show_category">
      <span class="catagories-title"><i class="icon"></i><a style="color:#fff;text-decoration:none;" href="javascript:void(0);" >全部商品分类</a></span>
      <ul class="catagories">
        <?php if(is_array($goods_category_tree)): foreach($goods_category_tree as $k=>$v): ?><li cate_id="C24640">
            <span class="icon-drink"></span>
            <h3 class="catagory"><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id]));?>"><?php echo ($v[name]); ?></a></h3>
            <div class="catagory-detail clearfix cate_loading">
              <div class="sub-item J_cate_item hide">
                <div class="col fl">
                  <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if(($k2 % 3) == 0): ?><dl class="fixed">
                        <dt> <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2[name]); ?></a> </dt>
                        <dd>
                          <?php if(is_array($v2[sub_menu])): foreach($v2[sub_menu] as $k3=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>"><?php echo ($v3[name]); ?></a><?php endforeach; endif; ?>
                        </dd>
                      </dl><?php endif; endforeach; endif; ?>
                </div>
                <div class="col fl">
                  <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if(($k2 % 3) == 1): ?><dl class="fixed">
                        <dt> <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2[name]); ?></a> </dt>
                        <dd>
                          <?php if(is_array($v2[sub_menu])): foreach($v2[sub_menu] as $k3=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>"><?php echo ($v3[name]); ?></a><?php endforeach; endif; ?>
                        </dd>
                      </dl><?php endif; endforeach; endif; ?>
                </div>
                <div class="col fl">
                  <?php if(is_array($v[tmenu])): foreach($v[tmenu] as $k2=>$v2): if(($k2 % 3) == 2): ?><dl class="fixed">
                        <dt> <a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v2[id]));?>"><?php echo ($v2[name]); ?></a> </dt>
                        <dd>
                          <?php if(is_array($v2[sub_menu])): foreach($v2[sub_menu] as $k3=>$v3): ?><a href="<?php echo U('Home/Goods/goodsList',array('id'=>$v3[id]));?>"><?php echo ($v3[name]); ?></a><?php endforeach; endif; ?>
                        </dd>
                      </dl><?php endif; endforeach; endif; ?>
                </div>
                <div class="col brand fl">
                  <ul class="fixed">
                   <?php if(is_array($v["brand"])): $i = 0; $__LIST__ = $v["brand"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$br): $mod = ($i % 2 );++$i;?><li class="lst" <?php if(($mod) == "1"): ?>even<?php endif; ?>>
	                  	<a href="" target="_blank">
	                  	<img class="nav-prod" src="/Template/pc/soubao/Static/images/loading.gif" alt="" data-images="<?php echo ($br["logo"]); ?>" height="40" width="80"></a>
	                  </li><?php endforeach; endif; else: echo "" ;endif; ?> 
                  </ul>
                  <!--分类商品图片-->
                      <a class="ad mt15" href="<?php echo U('Home/Goods/goodsList',array('id'=>$v[id]));?>"> 
	                      <img src="<?php echo ($v[image]); ?>" height="150" width="210"> 
                      </a> 
                  <!--分类商品图片 end-->                     
                  </div>
              </div>
            </div>
          </li><?php endforeach; endif; ?>
      </ul>
    </div>
    <ul class="horizontal-nav">
      <li is_fresh="0"><a class="" href="/">
        <span>首页</span>
        <i class=""></i></a></li>
      <?php
 $md5_key = md5("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("SELECT * FROM `__PREFIX__navigation` where is_show = 1 ORDER BY `sort` DESC"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li is_fresh="0"> 
          <a <?php if($v[is_new] == 1): ?>target="_blank"<?php endif; ?>href="<?php echo ($v[url]); ?>" >
          <span><?php echo ($v[name]); ?></span>
          <i class=""></i> </a> </li><?php endforeach; ?>
    </ul>
  </div>
</nav>
<script>
/**
* 鼠标移动端到头部购物车上面 就ajax 加载
*/
// 鼠标是否移动到了上方
var header_cart_list_over = 0;
var cart_cn = getCookie('cn');
$("#hd-my-cart").hover(function(){
   $("#show_minicart").show(); // 显示购物车列表			
      if(header_cart_list_over == 1) return false;
       header_cart_list_over = 1;
   		$.ajax({
   			type : "GET",
   			url:"/index.php?m=Home&c=Cart&a=header_cart_list&template=header_cart_list2",//+tab,
   			success: function(data){	
   				//cart_cn = getCookie('cn');
   			 	$("#hd-my-cart > #show_minicart").html(data);							
   			}
   		});	
},function(){
	 (typeof(t) == "undefined") || clearTimeout(t); 	 
	 t = setTimeout(function () { 
			header_cart_list_over = 0; /// 标识鼠标已经离开	        
	  }, 2000);		
      $("#show_minicart").hide();//  隐藏购物车列表
});

$('.cart_quantity').html(cart_cn);
// 购物车 显示隐藏
/*
$("#hd-my-cart").hover(function(){
	$("#show_minicart").show(); // 显示购物车列表	
}).mouseleave(function(){
	$("#show_minicart").hide();//  隐藏购物车列表	
});
*/
// ajax 删除购物车的商品
function header_cart_del(ids)
{
	$.ajax({
		type : "POST",
		url:"<?php echo U('Home/Cart/ajaxDelCart');?>",//+tab,
		data:{ids:ids}, // 
	    dataType:'json',		
		success: function(data){
		  // alert(data.msg);
		   if(data.status == 1)				
			{
				header_cart_list_over = 0; /// 标识鼠标已经离开
				$("#hd-my-cart > .icon-cart-hd").trigger('mouseenter');	 // 无法触发 hover 改为 trigger('mouseenter');//hover修改为mouseenter/mouseleave/mouseover/mouseout
			}
		}
	});
}
</script>
<script src="/Public/js/global.js"></script>
<script src="/Public/js/pc_common.js"></script>
<script src="/Public/js/layer/layer.js"></script><!-- 弹窗js 参考文档 http://layer.layui.com/-->  
<!-- 头部-e -->
<link rel="stylesheet" href="/Template/pc/soubao/Static/css/favorite.css">

<div class="wrap">
  <div class="bread_crumbs"> <a href="<?php echo U('Home/User/index');?>" class="crumbs_font">我的TPshop</a>&gt;<span class="color">我的评价</span></div>
  <!--菜单--> 
  <div class="sideBar_nav">
<dl>
  <dt>交易中心 </dt>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'order_list'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/order_list');?>">我的订单</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'comment'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/comment');?>">我的评价</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'coupon'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/coupon');?>">优惠券</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'account'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/account');?>">我的积分</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'goods_collect'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/goods_collect');?>">我的收藏</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'withdrawals'): ?>active<?php endif; ?>" href="<?php echo U('User/withdrawals');?>">申请提现</a></dd>  
</dl>
<dl>
  <dt>个人中心</dt>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'info'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/info');?>">个人信息</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'message_notice'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/message_notice');?>">消息通知</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'address_list'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/address_list');?>">地址管理</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'safety_settings'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/safety_settings');?>">安全设置</a></dd>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'mywallet'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/recharge');?>">我的余额</a></dd>
</dl>
<dl class="service_center">
  <dt>服务中心</dt>
  <dd><i class="icon_square"></i><a class="target_no <?php if(strtolower(ACTION_NAME) == 'return_goods_list'): ?>active<?php endif; ?>" href="<?php echo U('Home/User/return_goods_list');?>">退货管理</a></dd>
</dl>
</div> 
  <!--菜单-->     
  <!--侧边导航栏结束-->
   <div class="col_main">
    <div class="main evaluation"> 
      <!-- themes star -->
      <div class="themes_title">
        <h3>我的评价</h3>
      </div>
      <!-- themes end -->
      <div class="ui_tab">
        <ul class="ui_tab_nav">
            <li class="<?php if($_GET['status'] != '0' and $_GET['status'] != '1'): ?>active<?php endif; ?>"><a href="<?php echo U('/Home/User/comment');?>" class="target_no">全部</a></li>
          <li class="<?php if($_GET['status'] == '0'): ?>active<?php endif; ?>"><a href="<?php echo U('/Home/User/comment',array('status'=>0));?>" class="target_no">待评论</a></li>
          <li class="last <?php if($_GET['status'] == '1'): ?>active<?php endif; ?>"><a href="<?php echo U('/Home/User/comment',array('status'=>1));?>" class="target_no">已评论</a></li>
        </ul>
        <div class="ui_tab_content">
          <div style="display:block;" id="noComment" class="ui_panel">             
            <div class="evaluation_cont">
              <div class="order_list J_order_list">
              <?php if(is_array($comment_list)): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><table width="100%" class="">
                    <tbody>
                      <tr class="list_top">
                        <td colspan="3">
                        <div class="f_left order_info"> 
                        	<span class="time num"><?php if(strlen($list['add_time']) > 10): echo ($list["add_time"]); else: echo (date('Y-m-d H:i:s',$list["add_time"])); endif; ?></span>
                            <span class="order_No"> 订单号：<small class="num"><?php echo ($list["order_sn"]); ?></small></span>
                        </div>                         
                        </td>
                      </tr>
                      <tr class="list_cont ">
                        <td class="td_01">
                          <div class="list_main clearfix"> 
                          	<a target="_blank"  class="J_hover" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$list['goods_id']));?>"> 
                            	<img alt="<?php echo ($list["goods_name"]); ?>" src="<?php echo (goods_thum_images($list["goods_id"],80,80)); ?>">
                            </a>
                            <a href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$list['goods_id']));?>" class="J_hover jj_hov" target="_blank"><?php echo ($list["goods_name"]); ?></a>  
                          </div>
                        </td>
                        <td class="td_02"><p><?php if($list['is_comment'] == 1): ?>已评价<?php else: ?>未评价<?php endif; ?></p></td>
                        <td class="td_03">
                            <?php if($list['is_comment'] == 0): ?><!--<p><a  class="btn-02" onClick="comment(<?php echo ($list["order_id"]); ?>,<?php echo ($list["goods_id"]); ?>)">立即评价1</a></p>-->
                                <p><a href="<?php echo U('Home/User/comment_list',array('order_id'=>$list['order_id'],'store_id'=>$list['store_id']));?>" class="btn-02" target="_blank">立即评价</a></p><?php endif; ?>
                            <?php if($list['is_comment'] == 1): ?><p><a  class="btn-02" href="<?php echo U('Home/Goods/goodsInfo',array('id'=>$list['goods_id']));?>">查看评价</a></p><?php endif; ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                <!--判断是否已经评论过-->
                <?php if($list['is_comment'] == 0): ?><!--添加评论区域-->
                    <div class="eval-pj pa-to-20 ov-hi" id="div_<?php echo ($list["order_id"]); ?>_<?php echo ($list["goods_id"]); ?>" style="display:none">
                        <form action="<?php echo U('Home/User/add_comment');?>" data-test="formtest" method="post">
                            <input type="hidden" name="order_id" value="<?php echo ($list["order_id"]); ?>">
                            <input type="hidden" name="goods_id" value="<?php echo ($list["goods_id"]); ?>">
                            <div class="fwypj"><p>评价与晒图</p></div>
                            <div class="fl">
                                <div class="bd-fuwo pa-to-10">
                                    <!--<textarea style="display:" class="input" id="saytext2" name="content"></textarea>-->
                                    <textarea placeholder="可输入1-200字符" name="content" id="content" cols="70" rows="12"></textarea>
                                    <!--<div onMouseOut="settext()" name="saytext" id="saytext" contenteditable="true" style="width: 509px;height: 257px;border: solid 1px #f2f4ff; background-color: #f5f5f5;color: #888;"></div>-->
                                </div>
                                <div class="eval-img ov-hi wi457 he130" id="img_container">
                                    <div class="ev-img po-re fl" id="add_img">
                                        <img src="" border="0" alt="" onClick="uploadimg('#div_<?php echo ($list["order_id"]); ?>_<?php echo ($list["goods_id"]); ?>')">
                                    </div>

                                </div>
                            </div>
                            <div class="fl pa-le-30">
                                <div class="pro-user-score cu-po">
                                    <span class="sf">商品与描述相符：</span>
                            <span>
                                <span class="starRating-area">
                                    <img onMouseMove="c(this,event)" src="/Template/pc/soubao/Static/images/start/stars0.gif" alt="">
                                    <input type="hidden" id="goods_rank" name="goods_rank" value="0">
                                </span>
                            </span>
                                </div>
                                <div class="pro-user-score cu-po">
                                    <span class="sf">客服服务质量：</span>
                            <span>
                                <span class="starRating-area">
                                    <img onMouseMove="c(this,event)" src="/Template/pc/soubao/Static/images/start/stars0.gif" alt="">
                                    <input type="hidden" id="service_rank" name="service_rank" value="0">
                                </span>
                            </span>
                                </div>
                                <div class="pro-user-score cu-po">
                                    <span class="sf">物流服务质量：</span>
                            <span>
                                <span class="starRating-area">
                                   <img onMouseMove="c(this,event)" src="/Template/pc/soubao/Static/images/start/stars0.gif" alt="">
                                    <input type="hidden" id="deliver_rank" name="deliver_rank" value="0">
                                </span>
                            </span>
                                </div>
                                <div class="merge ma-to-80 ma-le-7">
                                    <a class=" di-in-bl hb-merge" onClick="comment_submit(this)">提交</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--添加评论区域结束--><?php endif; ?>
                <!--判断是否已经评论过结束-->
                <!--已经评论过-->
                <!--已经评论过结束--><?php endforeach; endif; else: echo "" ;endif; ?>                                      
              </div>
            </div>
          </div>
        </div>
      </div>
      
	<div class="operating fixed" id="bottom">
   		<div class="fn_page clearfix">
    			<?php echo ($page); ?> 
    	</div>
    </div>      
      
      <div class="explanation">
        <h5 class="explanation_tips">评论说明</h5>
        <div class="explanation_cont">
          <p>1.成功评价商品后您可以获得TPshop积分</p>
          <p>2.评论是用户对商品的质量、使用情况、用后心得体验，服务质量所发表的感受和意见；</p>
          <p>3.请您填写商品评论星级、评论标签及商品使用体验描述，您的宝贵建议是我们不断改进服务的动力；</p>
          <p>4.您只能评论购买过的商品，对同一商品一次只能发表一条评论；</p>
          <p>5.为了让我们即时收到您的宝贵反馈，请您收到商品后的3个月之内发表评论。</p>
        </div>
      </div>
    </div>
  </div>
</div>
<div style="clear: both;"></div>
<footer>
  <div id="ft-service-infr"  class="move-down">
    <div class="wrapper">
      <dl class="contact-infr">
        <dt class="icon-phone"><i class="icon-tel"></i>招商进驻</dt>
        <!--dd>CEO邮箱：<a href="mailto:ceo@feiyu.com" target="_blank">CEO@feiyu.com</a></dd-->
        <dd><a href="<?php echo U('Newjoin/index');?>" target="_blank">商家进驻</a></dd>
	    <dd><a href="<?php echo U('Article/detail',array('article_id'=>19));?>" target="_blank">招商标准</a></dd>
      </dl>
     <?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where parent_id = 2"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where parent_id = 2"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><dl class="nav-service">
        <dt><?php echo ($v[cat_name]); ?></dt>
        <?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id] and is_open=1"); $result_name = $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__article` where cat_id = $v[cat_id] and is_open=1"); S("sql_".$md5_key,$sql_result_v2,1); } foreach($sql_result_v2 as $k2=>$v2): ?><dd><a href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>"><?php echo ($v2[title]); ?></a></dd><?php endforeach; ?>
      </dl><?php endforeach; ?>
    </div>
  </div>
  <div class="wrapper" id="global-footer" style="width: 100%;">
    <p class="copyright">Copyright © 2016-2025 <?php echo ($tpshop_config['shop_info_store_name']); ?>  版权所有 保留一切权利 备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?></p>
    <dl class="authentic">
      <a target="_blank" href="" taregt="_blank"><dd class="sgs"></dd></a>
      <a target="_blank" href="" taregt="_blank"><dd class="zx110"></dd></a>
      <a target="_blank" href="" taregt="_blank"><img src="/Template/pc/soubao/Static/images/time_cnnic.jpg"></a>
      <a target="_blank" href="" taregt="_blank" class="aqlm"><img src="/Template/pc/soubao/Static/images/aqlm.jpg"></a>
    </dl>
  </div>
  <!-- /#global-footer --> 
</footer>
<!--评论JS-->
<script>
    function c(obj,event){
        //var obj = $(obj);
        var objTop = getOffsetTop(obj);//对象x位置
        var objLeft = getOffsetLeft(obj);//对象y位置

        var mouseX = event.clientX+document.body.scrollLeft;//鼠标x位置
        var mouseY = event.clientY+document.body.scrollTop;//鼠标y位置
        //计算点击的相对位置
        var objX = mouseX-objLeft;
        var objY = mouseY-objTop;
        clickObjPosition = objX + "," + objY;
        if(objX < 13 && objX > 0){
            $(obj).attr('src','/Template/pc/soubao/Static/images/start/stars1.gif');
            $(obj).next().val(1);
        }
        if(objX < 28 && objX > 13){
            $(obj).attr('src','/Template/pc/soubao/Static/images/start/stars2.gif');
            $(obj).next().val(2);
        }
        if(objX < 43 && objX > 28){
            $(obj).attr('src','/Template/pc/soubao/Static/images/start/stars3.gif');
            $(obj).next().val(3);
        }
        if(objX < 58 && objX > 43){
            $(obj).attr('src','/Template/pc/soubao/Static/images/start/stars4.gif');
            $(obj).next().val(4);
        }
        if(objX < 74 && objX > 58){
            $(obj).attr('src','/Template/pc/soubao/Static/images/start/stars5.gif');
            $(obj).next().val(5);
        }
        //alert(clickObjPosition);
    }

    function getOffsetTop(obj){
        var tmp = obj.offsetTop;
        var val = obj.offsetParent;
        while(val != null){
            tmp += val.offsetTop;
            val = val.offsetParent;
        }
        return tmp;
    }

    function getOffsetLeft(obj){
        var tmp = obj.offsetLeft;
        var val = obj.offsetParent;
        while(val != null){
            tmp += val.offsetLeft;
            val = val.offsetParent;
        }
        return tmp;
    }
</script>
<!--评论JS结束-->

<!--上传图片JS-->
<script>
    var now_access;
    function uploadimg(div){
        now_access = $(div);
        //检查是否超过限制数量
        GetUploadify2(1,'','comment','add_img')
    }
    function delimg(file,t){
        $.get(
                "/index.php?m=Admin&c=Uploadify&a=delupload",{action:"del", filename:file},function(){}
        );
        $(t).remove();
        $('#img_container').find('#add_img').show();
    }
    function add_img(str){
        var tpl = '<div class="ev-img po-re fl comment_img" onclick="delimg(\'$IMG\',this)"><input type="hidden" name="comment_img[]" value="$IMG"><img src="$IMG" border="0" alt=""></div>';
       // var tpl = '<input type="hidden" name="comment_img[]" value="$IMG"><img width="150" height="150" src="$IMG" alt=""><button onclick="delimg(\'$IMG\',this)">删除</button>';
        str = tpl.replace(/\$IMG/g,str);
//        $('#img_container').append(str);
        $(now_access).find('#img_container').find('#add_img').before(str);
        //判断是否超过五个图片
        var obj = $(now_access).find('.comment_img');
        if(obj.length == 5){
            $(now_access).find('#img_container').find('#add_img').hide();
        }
    }
</script>
<!--上传图片JS结束-->

<!--评论提交-->
<script>
    function comment(order_id,goods_id){
        var div = "#div_"+order_id+"_"+goods_id;
        $(div).toggle();
    }

    function comment_submit(t){
        //表单对象
        var form = $(t).parent().parent().parent();

        var service_rank = parseInt($(form).find('#service_rank').val());
        var deliver_rank = parseInt($(form).find('#deliver_rank').val());
        var goods_rank = parseInt($(form).find('#goods_rank').val());

        if(!service_rank> 0){
            //alert('请为商家服务评分');
			layer.msg('请为商家服务评分', { icon: 1, time: 2000 });   //2秒关闭（如果不配置，默认是3秒）
            return false;
        }
        if(!deliver_rank> 0){
            //alert('请为物流评分');
		    layer.msg('请为物流评分', { icon: 1, time: 2000 });   //2秒关闭（如果不配置，默认是3秒）
            return false;
        }
        if(!goods_rank> 0){
            //alert('请为商品评分');
		    layer.msg('请为商品评分', { icon: 1, time: 2000 });   //2秒关闭（如果不配置，默认是3秒）			
            return false;
        }         
        var data = $(form).serialize();
        $.ajax({
            type : "POST",
            url:"<?php echo U('Home/User/add_comment');?>",
            data :data,// 你的formid 搜索表单 序列化提交
            dataType: 'json',
            success: function(data){
                //console.log(data);
                if(data.status == 1){
                    //评论成功
                    //alert('评论成功');
					layer.msg('评论成功', {
					  icon: 1,
					  time: 2000 //2秒关闭（如果不配置，默认是3秒）
					}, function(){
		                   location.reload();
					});   					
                    //$(form).parent().remove();
                }else{
                    $(form).parent().remove();                    
					layer.alert(data.msg, {icon: 2}); //alert(data.msg);
                }
            }
        });
    }
</script>
<!--评论提交结束--> 
<script>
    $(function () {
        $("#h-s").mouseover(function () {
            $('.ec-ta-x').css('left','94px');
            $('.ec-ta-x').css('width','82px');
            $(this).addClass("cullent");
        });
        $("#h-s").mouseout(function () {
            $('.ec-ta-x').css('left','0px');
            $('.ec-ta-x').css('width','82px');
            $(this).removeClass("cullent");
        });
    });
    $(function () {
        $("#q-s").mouseover(function () {
            $('.ec-ta-x').css('left','0px');
            $(this).addClass("cullent");
        });
        $("#q-s").mouseout(function () {
            $('.ec-ta-x').css('left','0px');
        });
    });
    function settext(){
        //var text = $("#saytext").html();	
        //$('#saytext2').html(text);
    }

</script>
</body>
</html>