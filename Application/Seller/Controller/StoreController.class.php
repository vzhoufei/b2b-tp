<?php
/**
 * tpshop
 * ============================================================================
 * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: 当燃      
 * Date: 2016-05-29
 */

namespace Seller\Controller;
use Think\Page;

class StoreController extends BaseController{


	/**
	 * 选择模板周飞
	 */
	public function store_tpl()
	{
		// $template = array(
			
		// 	'fuzhuang'=>'服装、饰品、个人护理',
		// 	'wenhua'=>'文化、广告、设计服务',
		// 	'wujin'=>'五金、设备、工业制品',
		// 	'it'=>'IT、互联网、行业门户',
		// 	'jiaoyu'=>'教育、政府、机构组织',
		// 	'huagong'=>'化工、原材料、农畜牧',
		// 	'jinrong'=>'金融、运输、工商服务',
		// 	'shipin'=>'食品、茶饮、养生保健',
		// 	'shuma'=>'数码、家具、家居百货',
		// 	'hunqing'=>'婚庆、摄影、生活服务',
		// 	'canyin'=>'餐饮、酒店、旅游服务',
		// 	'lipin'=>'礼品、玩具、小商品',
		// 	);


		$template = array(
			array(
				'name'=>'服装、饰品、个人护理',
				'key'=>'fuzhuang',
				'son'=>array(
					'fuzhuang'=>'服装',
					'shipin'=>'饰品',
					'xiemaoxiangbao'=>'鞋帽箱包',
					'huwaiyongpin'=>'户外用品',
					'meironghufu'=>'美容护肤',
					),
				),
			array( 
				'name'=>'文化、广告、设计服务',
				'key'=>'wenhua',
				'son'=>array(

						'guanggao'=>'广告',
						'wenhuachuanmei'=>'文化传媒',
						'yinshuabaoz'=>'印刷包装',
						'zhanlansheji'=>'展览设计',
						'yuanlinsheji'=>'园林设计',
					),

				),
			array( 
				'name'=>'五金、设备、工业制品',
				'key'=>'wujin',
				'son'=>array(

						'wujin'=>'广告',
						'wenhuachuanmei'=>'五金',
						'menchuangzhaoming'=>'门窗照明',
						'qichepeijian'=>'汽车汽配',
						'dianzidiangong'=>'电子电工',
						'yiqiqicai'=>'仪器器材',
						'anquanjiankong'=>'安防监控',
					),

				),
			array( 
				'name'=>'it、互联网、行业门户 ',
				'key'=>'it',
				'son'=>array(
					),

				),
			array( 
				'name'=>'教育、政府、机构组织',
				'key'=>'jiaoyu',
				'son'=>array(

						'xuexiao'=>'学校',
						'zhengfu'=>'政府',
						'yiyuan'=>'医院',
						'jiaoyupeixun'=>'教育培训',
						'jigouzuzhi'=>'机构组织',
					),

				),
			array( 
				'name'=>'化工、原材料、农畜牧  ',
				'key'=>'huagong',
				'son'=>array(

						'jianzhujiancai'=>'建筑建材',
						'fangzhifuliao'=>'纺织辅料',
						'huagongtuliao'=>'化工涂料',
						'xiangjiaosuliao'=>'橡胶塑料',
						'huanbaohuishou'=>'环保回收',
						'nongyexumu'=>'农业畜牧',
					),

				),
			array( 
				'name'=>'金融、运输、工商服务  ',
				'key'=>'jinrong',
				'son'=>array(

						'maoyi'=>'贸易',
						'yunshu'=>'运输',
						'fangdichan'=>'房地产',
						'jinrongbaoxian'=>'金融保险',
						'falvfuwu'=>'法律服务',
					),

				),
			array( 
				'name'=>'食品、茶饮、养生保健  ',
				'key'=>'shipin',
				'son'=>array(

						'shuguo'=>'蔬果',
						'chaye'=>'茶叶',
						'jiulei'=>'酒类',
						'shipinyinliao'=>'食品饮料',
					),

				),
			array( 
				'name'=>'数码、家具、家居百货  ',
				'key'=>'shuma',
				'son'=>array(

						'diannao'=>'电脑',
						'dianqi'=>'电器',
						'shoujishuma'=>'手机数码',
						'jiasijiaju'=>'家私家具',
						'jiasijiafang'=>'家居家纺',
						'riyongbaihuo'=>'日用百货',
					),

				),
			array( 
				'name'=>'婚庆、摄影、生活服务',
				'key'=>'sheying',
				'son'=>array(

						'xianhua'=>'鲜花',
						'hunqing'=>'婚庆',
						'sheying'=>'摄影',
						'chongwu'=>'宠物',
						'zhuangxui'=>'装修',
						'shenghuofuwu'=>'生活服务',
					),

				),
			array( 
				'name'=>'餐饮、酒店、旅游服务',
				'key'=>'canyin',
				'son'=>array(

						'yinliao'=>'餐饮',
						'jiudian'=>'酒店',
						'lvyou'=>'旅游',
					),

				),
			array( 
				'name'=>'礼品、玩具、小商品',
				'key'=>'lipin',
				'son'=>array(

						'lipin'=>'礼品',
						'wenju'=>'文具',
						'wanjuyueqi'=>'玩具乐器',
					),

				),


);
		$tpl_class = I('tpl');
		$tpls = M('store')->where('store_id = '.session('store_id'))->getField('tpl');
		$tpl = I('t','pc');

		$layer = I('layer');
		if($layer){

			$arr = scandir("./Merchants_tpl/$tpl/$tpl_class/");
			foreach($arr as $v){
				if($v == '.' || $v == '..'){continue;}
				if($v == '.' || $v == '..'){continue;}
				$arrs[ $v ] = scandir("./Merchants_tpl/$tpl/$tpl_class/$v");

			}

			foreach($arrs as $kk=>$vc){
				foreach($vc as $vb){
					if($vb != '.' && $vb != '..'){

						$array[] = $kk.'/'.$vb;
					}
				}
			}
		}else{

				$array = scandir("./Merchants_tpl/$tpl/$tpl_class/");
		}
		
        $m = ($tpl == 'pc') ? 'Home' : 'Mobile';
        $y = 6;//每页显示个数
		$p = $_GET['p']?$_GET['p']:1;//页码
        $num = $p * $y;//当前页码乘每页显示的个数 等于当前页显示的最大数
        $n = $num - $y + 1;//当前显示的最大数减去每页显示的条数加一等于当前页显示的最小数
         foreach($array as $key => $val)
         {
                if($val == '.' || $val == '..' ){continue;}
                $i += 1;

                if($i >= $n && $i <= $num){
                 	$template_config[$val] = include "./Merchants_tpl/$tpl/$tpl_class/$val/config.php";
                }
                $count += 1;//总数
         }

// dump($template_config);exit;
         $number = ceil($count / $y);//共多少页
         $page = "<li><a href='".$this->mypage(1)."'>首页</a></li>";
         if($p != 1){$page .= "<li><a href='".$this->mypage($_GET['p']-1)."'>上一页</a></li>";}
         for($j = 1;$j <= $number;$j++){
         if($p == $j){ 
         	$page .= "<li><a class='current' href='".$this->mypage($j)."'>{$j}</a></li>";
         }else{
         	$page .= "<li><a href='".$this->mypage($j)."'>{$j}</a></li>";
         }
         }
         if($p != $number){$page .= "<li><a href='".$this->mypage($p+1)."'>下一页</a>";}
         $page .= "<li><a href='".$this->mypage($number)."'>末页</a></li>";
         $page .= "<li>{$count}条结果  .  {$p}/{$number}</li>";
         $this->assign('page',$page);
		$this->assign('tpl',$tpl);   
        $this->assign('template',$template);
        $this->assign('default_theme',$tpls);
        $this->assign('template_config',$template_config);
        $this->display();
	}


	//处理分页
	public function mypage($p)
	{
		$url = (strstr($_SERVER['REQUEST_URI'],'p='))?$_SERVER['REQUEST_URI']:$_SERVER['REQUEST_URI'].'&p=';

		return str_replace('p='.$_GET['p'], 'p='.$p, $url);
	}




	/**
	 * 修改配置文件 周飞
	 */
	 public function changeTemplate()
   {
   		$key['tpl'] = I('tplclass').'/'.I('key');
   		$key['mtpl'] = I('mtpl');
   		$t = I('t','pc');
   		$tpl = ($t == 'pc')?'Home':'Mobile';
   		$store = M('store');
		$tpl = $store->where('store_id = '.session('store_id'))->field('tpl')->find();
		if(!$tpl){$this->success("请先配置您的店铺!",U('store_setting'));exit;}

		$res = $store->where('store_id = '.session('store_id'))->save($key);
		if((int)I('tnameid')){
			// $this->deletedata(session('store_id'));
			// $this->import((int)I('tnameid'));


		}
		if($res){
   			$this->success("操作成功!!!");
		}else{

   			$this->success("操作失败!!!");
		}

   }


   //为新用户复制数据
   public function import($store_id)
   {


   	//自定义导航
   	$nav = M('store_navigation');
   	$article = M('store_art');
   	$navigation = $nav->where(array('sn_store_id'=>$store_id))->select();//自定义导航
   	if($navigation){

	   	foreach($navigation as &$vv){
	   		$sn_id = $vv['sn_id'];
	   		$vv['sn_store_id'] = session('store_id');
	   		unset($vv['sn_id']);
	   		$res = $nav->add($vv);
	   		$articles = $article->where(array('sn_id'=>$sn_id))->select();//文章
	   		if($articles){

		   		foreach($articles as &$v_art){
		   			$v_art['store'] = session('store_id');
		   			$v_art['sn_id'] = $res;
		   			unset($v_art['id']);
		   		}
		   		
				   		$article->addAll($articles);
		   			
		   		
	   		}

	   	}
   	}





   	// 分类
   	$class = M('store_goods_class');
   	$goods_m = M('goods');
   	$goods_class = $class->where(array('store_id'=>$store_id,'parent_id'=>0))->select();//查询一级分类
   	if($goods_class){
   		//循环复制分类
	   	foreach($goods_class as &$vo){
	   		$parent_id = $vo['cat_id'];
	   		$vo['store_id'] = session('store_id');
	   		unset($vo['cat_id']);
	   		$res = $class->add($vo);
	   		$goods = $goods_m->where(array('store_id'=>$store_id,'store_cat_id1'=>$parent_id,'store_cat_id2'=>0))->select();//查询一级分类商品
	   		if($goods){

	   			foreach($goods as &$v_goods){
	   				$v_goods['store_id'] = session('store_id');
	   				$v_goods['store_cat_id1'] = $res;
	   				$v_goods['goods_id'] = null;

	   			}
	   				foreach($goods as $vc){

	   					$goods_m->add($vc);
	   				}
	   			
	   			
	   		}

	   		
	   		$son = $class->where(array('store_id'=>$store_id,'parent_id'=>$parent_id))->select();//查询二级分类
	   		if($son){
	   			foreach($son as &$vson){
	   				$goodsid = $vson['cat_id'];
		   			$vson['parent_id'] = $res;
		   			$vson['store_id'] = session('store_id');
		   			unset($vson['cat_id']);
		   			$res2 = $class->add($vson);
		   			$goods2 = $goods_m->where(array('store_id'=>$store_id,'store_cat_id1'=>$parent_id,'store_cat_id2'=>$goodsid))->select();//查询二级分类商品
			   		if($goods2){

			   			foreach($goods2 as &$v_goods2){
			   				$v_goods2['store_id'] = session('store_id');
			   				$v_goods2['store_cat_id1'] = $res;
			   				$v_goods2['store_cat_id2'] = $res2;
			   				$v_goods2['goods_id'] = null;

			   			}
			   				
			   				foreach($goods2 as $vz){

			   					$goods_m->add($vz);//添加二级分类商品
			   				}
			   				
			   				
			   			
			   		}


	   			}

	   		}

	   	}



	   		
   	}

   		// 配置数据和幻灯图片
   		$yd_store = M('store');
   		$store = $yd_store->where(array('store_id'=>$store_id))->field('store_logo,store_banner,seo_keywords,seo_description,store_zy,store_slide,store_slide_url,mb_slide,mb_slide_url,copyright,store_qq,store_phone,store_aliwangwang,city_id,district,store_address')->find();
   		if($store){
   			$yd_store->where(array('store_id'=>session('store_id')))->save();
   		}

   		//自定义模块
   		$store_mod = M('store_mod');
   		$texts = $store_mod->where(array('store_id'=>$store_id))->field('content')->find();
   		if($texts){
   			
	   		if($store_mod->where(array('store_id'=>session('store_id')))->find()){
	   			$store_mod->where(array('store_id'=>session('store_id')))->save($texts);
	   		}else{
		   		$texts['store_id'] = session('store_id');
		   		$store_mod->add($texts);

	   			
	   		}
   		}


   		$photo_m = M('photo');
   		$photoimg_m = M('photoimg');
   		$photo = $photo_m->where(array('store_id'=>$store_id))->select();
   		if($photo){

	   		foreach($photo as &$vv){
	   			$photoimg = $photoimg_m->where(array('photoid'=>$vv['id']))->select();
	   			$vv['store_id'] = session('store_id');
	   			unset($vv['id']);
	   			$res5 = $photo_m->add($vv);
	   			if($photoimg){
	   				foreach($photoimg as $vvv){
	   					unset($vvv['id']);
	   					$vvv['photoid'] = $res5;
	   					$photoimg_m->add($vvv);
	   				}
	   			}

	   		}

   		}


   }


   /**
    * 清空用户数据
    */
   public function deletedata($store_id)
   {

   		   	$nav = M('store_navigation');
   			$article = M('store_art');
   			$class = M('store_goods_class');
   			$goods_m = M('goods');
   			$yd_store = M('store');
   			$store_mod = M('store_mod');
   			$photo_m = M('photo');
   			$photoimg_m = M('photoimg');
   			$str = 'store_logo,store_banner,seo_keywords,seo_description,store_zy,store_slide,store_slide_url,mb_slide,mb_slide_url,copyright,store_qq,store_phone,store_aliwangwang,city_id,district,store_address';
   			$arr = explode(',',$str);
   			foreach($arr as $v){
   				$data2[$v] = '';
   			}
   			$yd_store->where(array('store_id'=>$store_id))->save($data2);
   			$data['content'] = '';
   			$store_mod->where(array('store_id'=>$store_id))->save($data);
   			$nav->where(array('sn_store_id'=>$store_id))->delete();
   			$article->where(array('sn_store_id'=>$store_id))->delete();
   			$class->where(array('store_id'=>$store_id))->delete();
   			$goods_m->where(array('store_id'=>$store_id))->delete();
   			$photo_m->where(array('store_id'=>$store_id))->delete();
   			$photoimg_m->where(array('store_id'=>$store_id))->delete();

   			

   }


   /**
    * 绑定独立域名 周飞
    */
   public function store_domain()
   {
   	if(IS_POST){
            $store = M('store');
            $data['domain'] = I('post.domain');
            $domain = $store->where(array('store_id'=>session('store_id')))->field('domain')->find();
            if($domain['domain']){
                echo "<script>alert('您已经绑定了独立域名，如要更换，请联系客服！');window.history.go(-1);</script>";exit;
            }
            $res = $store->where(array('store_id'=>session('store_id')))->save($data);


            // $host2 = substr($data['domain'],4);

            if($res){
	            	if(PHP_OS == 'Linux'){

	                	$filename = '/usr/local/apache2/etc/extra/httpd-vhosts.conf';
	            	}elseif(PHP_OS == 'WINNT'){

	                	echo "<script>alert('系统不支持！');window.history.go(-1);</script>";exit;
	            	}
                // 写入的字符
                $word = "
<VirtualHost *:80>
ServerName {$data['domain']}
DocumentRoot /usr/local/apache2/htdocs/cdcms-websites/
<Directory  '/usr/local/apache2/htdocs/cdcms-websites/'>
  Options +Indexes +FollowSymLinks +MultiViews
  AllowOverride All
  Require local
</Directory>
</VirtualHost>
                ";

                $fh = fopen($filename, "a");
                $fwrite = fwrite($fh, $word); 
                fclose($fh);
            }


            if($fwrite){
                  system("/usr/local/apache2/bin/apachectl -k graceful",$ress);//平滑重启apache
                 
                  if($ress == 0){
                    echo "<script>alert('绑定成功');</script>";
                    $this->redirect('index/index');exit;
                  }else{
                    if($res){
                    $data2['domain'] = null;
                    $user->where('id = '.session('homeuser.id'))->save($data2);
                    }
                    echo "<script>alert('绑定失败！请联系客服！');window.history.go(-1);</script>";exit;
                  }
            }else{
                if($res){
                    $data2['domain'] = null;
                    $user->where('id = '.session('homeuser.id'))->save($data2);
                }
                echo "<script>alert('绑定失败！请重试！');window.history.go(-1);</script>";exit;
            }

        }else{
			
            $this->display();
        }
   }




	public function store_info(){
		$store = M('store')->where("store_id=".STORE_ID)->find();
		$this->assign('store',$store);
		$apply = M('store_apply')->where("user_id=".$store['user_id'])->find();
		$this->assign('apply',$apply);
		
		$bind_class_list = M('store_bind_class')->where("store_id=".STORE_ID)->select();
		$goods_class = M('goods_category')->getField('id,name');
		for($i = 0, $j = count($bind_class_list); $i < $j; $i++) {
			$bind_class_list[$i]['class_1_name'] = $goods_class[$bind_class_list[$i]['class_1']];
			$bind_class_list[$i]['class_2_name'] = $goods_class[$bind_class_list[$i]['class_2']];
			$bind_class_list[$i]['class_3_name'] = $goods_class[$bind_class_list[$i]['class_3']];
		}
		
		$this->assign('bind_class_list',$bind_class_list);
		$this->display();
	}
	
	public function store_setting(){
		$store = M('store')->where("store_id=".STORE_ID)->find();
		if($store){
			$grade = M('store_grade')->where("sg_id=".$store['grade_id'])->find();
			$store['grade_name'] = $grade['sg_name'];
			$province = M('region')->where(array('parent_id'=>0))->select();
			$city =  M('region')->where(array('parent_id'=>$store['province_id']))->select();
			$area =  M('region')->where(array('parent_id'=>$store['city_id']))->select();
			$this->assign('province',$province);
			$this->assign('city',$city);
			$this->assign('area',$area);
		}
		$this->assign('store',$store);
		$this->display();
	}
	
	public function setting_save(){
		$data = I('post.');
		if($data['act']=='update'){
			if(!file_exists('.'.$data['themepath'].'/style/'.$data['store_theme'].'/images/preview.jpg')){
				respose(array('stat'=>'fail','msg'=>'缺少模板文件'));
			}
			if(M('store')->where("store_id=".STORE_ID)->save(array('store_theme'=>$data['store_theme']))){
				respose(array('stat'=>'ok'));
			}else{
				respose(array('stat'=>'fail','msg'=>'没有修改模板'));
			}
		}else{
			if(M('store')->where("store_id=".STORE_ID)->save($data)){
				$this->success("操作成功",U('Store/store_setting'));
			}else{
				$this->error("没有修改数据",U('Store/store_setting'));
			}
		}
	}
	
	public function store_slide(){
		$store = M('store')->where("store_id=".STORE_ID)->find();
		$store_slide = $store_slide_url = array();
		if(IS_POST){
			$store_slide = I('post.store_slide');
			$store_slide_url = I('post.store_slide_url');
			$store_slide = implode(',', $store_slide);
			$store_slide_url = implode(',', $store_slide_url);
			M('store')->where("store_id=".STORE_ID)->save(array('store_slide'=>$store_slide,'store_slide_url'=>$store_slide_url));
			$this->success("操作成功",U('Store/store_slide'));
			exit;
		}
		if($store['store_slide']){
			$store_slide = explode(',', $store['store_slide']);
			$store_slide_url = explode(',', $store['store_slide_url']);
		}
		$this->assign('store_slide',$store_slide);
		$this->assign('store_slide_url',$store_slide_url);
		$this->display();
	}
	
	public function mobile_slide(){
		$store = M('store')->where("store_id=".STORE_ID)->find();
		$store_slide = $store_slide_url = array();
		if(IS_POST){
			$store_slide = I('post.store_slide');
			$store_slide_url = I('post.store_slide_url');
			$store_slide = implode(',', $store_slide);
			$store_slide_url = implode(',', $store_slide_url);
			M('store')->where("store_id=".STORE_ID)->save(array('mb_slide'=>$store_slide,'mb_slide_url'=>$store_slide_url));
			$this->success("操作成功",U('Store/mobile_slide'));
			exit;
		}
		if($store['mb_slide']){
			$store_slide = explode(',', $store['mb_slide']);
			$store_slide_url = explode(',', $store['mb_slide_url']);
		}
		$this->assign('store_slide',$store_slide);
		$this->assign('store_slide_url',$store_slide_url);
		$this->display();
	}
	
	public function theme(){
		$template = include APP_PATH.'Common/Conf/style_inc.php';
		$theme = include APP_PATH.'/Conf/html.php';
		$this->assign('static_path',$theme['TMPL_PARSE_STRING']['__STATIC__']);
		$this->assign('template',$template);
		$store = M('store')->where("store_id=".STORE_ID)->find();
		$this->assign('store',$store);
		$this->display();
	}
	
	public function bind_class_list(){
		$bind_class_list = M('store_bind_class')->where("store_id=".STORE_ID)->select();
		$goods_class = M('goods_category')->getField('id,name');
		for($i = 0, $j = count($bind_class_list); $i < $j; $i++) {
			$bind_class_list[$i]['class_1_name'] = $goods_class[$bind_class_list[$i]['class_1']];
			$bind_class_list[$i]['class_2_name'] = $goods_class[$bind_class_list[$i]['class_2']];
			$bind_class_list[$i]['class_3_name'] = $goods_class[$bind_class_list[$i]['class_3']];
		}
		$this->assign('bind_class_list',$bind_class_list);
		$this->display();
	}
	
	public function get_bind_class(){
		$cat_list = M('goods_category')->where("parent_id = 0")->select();
		$this->assign('cat_list',$cat_list);
		if(IS_POST){
			$data = I('post.');
			$where = "class_3 =".$data['class_3']." and store_id=".STORE_ID;
			if(M('store_bind_class')->where($where)->count()>0){
				respose(array('stat'=>'fail','msg'=>'您已申请过该类目'));
			}
			$data['store_id'] = STORE_ID;
			$data['commis_rate'] = M('goods_category')->where("id=".$data['class_3'])->getField('commission');
			if(M('store_bind_class')->add($data)){
				respose(array('stat'=>'ok'));
			}else{
				respose(array('stat'=>'fail','msg'=>'操作失败'));
			}			
		}
		$this->display();
	}
	
	public function bind_class_del(){
		$data = I('post.');
		$r = M('store_bind_class')->where(array('bid'=>$data['bid']))->delete();
		if($r){
			$res = array('stat'=>'ok');
		}else{
			$res = array('stat'=>'fail','msg'=>'操作失败');
		}
		respose($res);
	}
	
	public function navigation_list(){
		$Model =  M('store_navigation');
		$res = $Model->where("sn_store_id=".STORE_ID)->order('sn_sort')->page($_GET['p'].',10')->select();
		if($res){
			foreach ($res as $val){
				$val['sn_new_open'] = $val['sn_new_open']>0 ? '开启' : '关闭';
				$val['sn_is_show'] = $val['sn_is_show']>0 ? '是' : '否';
				$list[] = $val;
			}
		}
	
		$this->assign('list',$list);


		/**
		*	@author 金龙
		*	2016/10/30
		*/
		$count = $Model->where("sn_store_id=".STORE_ID)->count();

		//$count = $Model->where('1=1')->count();
		$Page = new \Think\Page($count,10);
		$show = $Page->show();
		$this->assign('page',$show);
		$this->display();
	}
	
	public function navigation(){
		$sn_id = I('sn_id',0);
		if($sn_id>0){
			$info = M('store_navigation')->where("sn_id=$sn_id")->find();
			$this->assign('info',$info);
		}
		$this->initEditor();
		$this->display();
	}
	
	public function navigationHandle(){
		$data = I('post.');
		// dump($data);

		if($data['act'] == 'del'){
		/**
		*	@author 金龙
		*	2016/10/30
		*/
			//$r = M('store_navigation')->where('sn_id='.$data['sn_id'])->delete();

			$r = M('store_navigation')->where("sn_store_id = ".STORE_ID.' and sn_id='.$data['sn_id'])->delete();
			M('store_art')->where("store = ".STORE_ID.' and sn_id = '.$data['sn_id'])->delete();

			if($r) exit(json_encode(1));
		}
		if(empty($data['sn_id'])){
			$data['sn_store_id'] = STORE_ID;
			$r = M('store_navigation')->add($data);
		}else{
			$r = M('store_navigation')->where('sn_id='.$data['sn_id'])->save($data);
		}
		if($r){
			$this->success("操作成功",U('Store/navigation_list'));
		}else{
			$this->error("操作失败",U('Store/navigation_list'));
		}
	}
	
	public function goods_class(){
		$Model =  M('store_goods_class');
		$res = $Model->where("store_id=".STORE_ID)->select();	
		$cat_list = $this->getTreeClassList(2,$res);
		$this->assign('cat_list',$cat_list);
		$this->display();
	}
	
	public function goods_class_info(){
		$cat_id = I('get.cat_id',0);
		$info['parent_id'] = I('get.parent_id',0);
		if($cat_id>0){
			$info = M('store_goods_class')->where("cat_id=$cat_id")->find();
		}
		$this->assign('info',$info);
		$parent = M('store_goods_class')->where("parent_id=0 and is_show=1 and store_id=".STORE_ID)->select();
		$this->assign('parent',$parent);
		$this->display();
	}
	
	public function goods_class_save(){
		$data = I('post.');
		if($data['act'] == 'del'){
			$r = M('store_goods_class')->where('cat_id='.$data['cat_id'].' or parent_id='.$data['cat_id'])->delete();
		}else{
			if(empty($data['cat_id'])){
				$data['store_id'] = STORE_ID;
				$r = M('store_goods_class')->add($data);
			}else{
				$r = M('store_goods_class')->where('cat_id='.$data['cat_id'])->save($data);
			}
		}
		if($r){
			$res = array('stat'=>'ok');
		}else{
			$res = array('stat'=>'fail','msg'=>'操作失败');
		}
		respose($res);
	}

	public function store_im(){
		$chat_msg = M('chat_msg')->select();
		$this->assign('chat_msg',$chat_msg);
		$this->display();
	}
	
	function store_collect(){
		$keywords = I('keywords');
		$map['store_id'] = STORE_ID;
		if(!empty($keywords)){
			$map['user_name'] = array('like',"%$keywords%");
		}
		$count = M('store_collect')->where($map)->count();
		$Page  = new \Think\Page($count,10);
		$show = $Page->show();
		$collect = M('store_collect')->where(array('store_id'=>STORE_ID))->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('page',$show);
		$this->assign('collect',$collect);
		$this->display();
	}
	
	public function store_decoration(){
		if(IS_POST){
			//店铺装修设置
			$data = I('post.');
			M('store')->where(array('store_id'=>STORE_ID))->save($data);
			$this->success("操作成功",U('Store/store_decoration'));
			exit;
		}
		$decoration = M('store_decoration')->where(array('store_id'=>STORE_ID))->find();
		if(empty($decoration)){
			$decoration = array('decoration_name'=>'默认装修','store_id'=>STORE_ID);
			$decoration['decoration_id'] = M('store_decoration')->add($decoration);
		}
		$this->assign('decoration',$decoration);
		$store = M('store')->where("store_id=".STORE_ID)->find();
		$this->assign('store',$store);
		$this->display();
	}
	
	/**
	 * 递归 整理分类
	 *
	 * @param int $show_deep 显示深度
	 * @param array $class_list 类别内容集合
	 * @param int $deep 深度
	 * @param int $parent_id 父类编号
	 * @param int $i 上次循环编号
	 * @return array $show_class 返回数组形式的查询结果
	 */
	private function getTreeClassList($show_deep=2,$class_list,$deep=1,$parent_id=0,$i=0){
		static $show_class = array();//树状的平行数组
		if(is_array($class_list) && !empty($class_list)) {
			$size = count($class_list);
			if($i == 0) $show_class = array();//从0开始时清空数组，防止多次调用后出现重复
			for ($i;$i < $size;$i++) {//$i为上次循环到的分类编号，避免重新从第一条开始
				$val = $class_list[$i];
				$cat_id = $val['cat_id'];
				$cat_parent_id	= $val['parent_id'];
				if($cat_parent_id == $parent_id) {
					$val['deep'] = $deep;
					$show_class[] = $val;
					if($deep < $show_deep && $deep < 2) {//本次深度小于显示深度时执行，避免取出的数据无用
						$this->getTreeClassList($show_deep,$class_list,$deep+1,$cat_id,$i+1);
					}
				}
				//if($cat_parent_id > $parent_id) break;//当前分类的父编号大于本次递归的时退出循环
			}
		}
		return $show_class;
	}
	
	private function initEditor()
	{
		$this->assign("URL_upload", U('Admin/Ueditor/imageUp',array('savepath'=>'decoration')));
		$this->assign("URL_fileUp", U('Admin/Ueditor/fileUp',array('savepath'=>'decoration')));
		$this->assign("URL_scrawlUp", U('Admin/Ueditor/scrawlUp',array('savepath'=>'decoration')));
		$this->assign("URL_getRemoteImage", U('Admin/Ueditor/getRemoteImage',array('savepath'=>'decoration')));
		$this->assign("URL_imageManager", U('Admin/Ueditor/imageManager',array('savepath'=>'decoration')));
		$this->assign("URL_imageUp", U('Admin/Ueditor/imageUp',array('savepath'=>'decoration')));
		$this->assign("URL_getMovie", U('Admin/Ueditor/getMovie',array('savepath'=>'decoration')));
		$this->assign("URL_Home", "");
	}
        
        /**
         * 三级分销设置
         */
	public function distribut(){
             // 每个店铺有一个分销 记录
            $store_distribut = M('store_distribut')->where("store_id=".STORE_ID)->find();
            if(IS_POST)
            {
                $Model = M('store_distribut');                
                if(!$Model->create())
                    $this->error("提交失败",U('Store/distribut'));
               
                $Model->store_id = STORE_ID;
                
                if($store_distribut)      
                    $Model->save();
                else
                    $Model->add();
                $this->success("操作成功",U('Store/distribut'));
                exit;
            }            
            $this->assign('config',$store_distribut);
            $this->display();
	}
	public function store_mod(){

		if(M('store_mod')->where('store_id = '.STORE_ID)->count()==0){
			M('store_mod')->add(array('store_id'=>STORE_ID));
		}

		$text = M('store_mod')->where('store_id = '.STORE_ID)->select();

		$tpls = M('store')->where('store_id = '.session('store_id'))->getField('tpl');
		$template_config = include "./Merchants_tpl/pc/$tpls/config.php";
		$template_config['mod']  = 5;

        $this->assign('template_config',$template_config);
        // dump($template_config);exit;



		$this->initEditor();
		$this->assign('text',unserialize($text[0]['content']));
		$this->display();
	}
	public function modHandle(){
		$data = I('post.');
		$DataArray = array();
		foreach ($data as $key => $value) {
			if($key=='__hash__') continue;
			$DataArray[]=$value;
		}
		$data = array(
			'content' => serialize($DataArray)
			);

		$r = M('store_mod')->where('store_id = '.STORE_ID)->save($data);

		if($r){
			$this->success("操作成功",U('store/store_mod'));
		}else{
			$this->error("操作失败",U('store/store_mod'));
		}
	}    
}