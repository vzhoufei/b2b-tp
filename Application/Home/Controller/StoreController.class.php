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
 * Date: 2016-05-28
 */

namespace Home\Controller;

use Seller\Model\StoreDecorationModel;
use Think\Controller;

class StoreController extends Controller {
	public $navigation = array();
	public $store = array();

	public function _initialize() {
		$store_id = I('store_id', 1);
		$store_info = M('store')->where(array('store_id' => $store_id))->find();
		if ($store_info) {
			if ($store_info['store_state'] == 0) {
				$this->error('该店铺不存在或者已关闭', U('Index/index'));
			}
			// zhoufei
			C('VIEW_PATH', './Merchants_tpl/pc/'); //模板路径
			C('DEFAULT_THEME', M('store')->where(array('store_id' => $store_id))->getField('tpl')); //模板名称
			define('STYLE', substr(C('VIEW_PATH') . C('DEFAULT_THEME'), 1));
			$this->assign('db', C('DB_PREFIX')); //表前缀
			C('DOMAIN', 'http://' . $_SERVER['HTTP_HOST']);

			// zhoufei
			if (is_mobile()) {
				header("location:" . C('DOMAIN') . '/Mobile/Store/index/store_id/' . $store_id);
			}

			$store_info['store_slide'] = explode(',', $store_info['store_slide']);
			$store_info['store_slide_url'] = explode(',', $store_info['store_slide_url']);
			$store_info['store_presales'] = unserialize($store_info['store_presales']);
			$store_info['store_aftersales'] = unserialize($store_info['store_aftersales']);
			$this->navigation = M('store_navigation')->field('sn_content', true)->where(array('sn_store_id' => $store_id, 'sn_is_show' => 1))->select(); //店铺导航

			//相册导航
			if ($photo = M('photo')->where(array('store_id' => $store_id, 'is_nav' => 1, 'status' => 1))->find()) {

				$this->navigation[] = array('sn_title' => '公司相册', 'sn_is_list' => 2);
				$this->navigation[] = array('sn_title' => '在线留言', 'sn_is_list' => 3);

			}
			$this->assign('user', session('user'));
			$decoration_id = I('decoration_id', 0);
			if ($store_info['store_decoration_switch'] > 0 && $decoration_id == 0) {
				$model_store_decoration = new StoreDecorationModel();
				$decoration_info = $model_store_decoration->getStoreDecorationInfoDetail($store_info['store_decoration_switch'], $store_id);
				if ($decoration_info) {
					$this->_output_decoration_info($decoration_info);
				}
				$store_info['store_theme'] = 'default';
			}
			$config = M('config')->where(array('name' => 'store_name'))->find();
			$store_info['copyright'] = $config['value'] . ' 版权所有';
			$this->store = $store_info;
			$this->assign('store', $store_info);
			$this->assign('action', ACTION_NAME);

			// zhoufei

			$store_id = $this->store['store_id'];
			//店铺内部分类
			$store_goods_class_list = M('store_goods_class')->where(array('store_id' => $store_id, 'is_show' => '1'))->select(); //zhoufei 增加了 ,'is_show'=>'1'
			if ($store_goods_class_list) {
				$sub_cat = $main_cat = array();
				foreach ($store_goods_class_list as $val) {
					if ($val['parent_id'] == 0) {
						$main_cat[] = $val;
					} else {
						$sub_cat[$val['parent_id']][] = $val;
					}
				}
				$this->assign('main_cat', $main_cat);
				$this->assign('sub_cat', $sub_cat);
			}

			$link_cat = M('store_goods_class')->where(array('store_id' => $store_id, 'is_nav_show'))->select();
			if ($link_cat) {
				$cat_id = get_arr_column($link_cat, 'cat_id');
				$cat_id = implode(',', $cat_id);
				$map = array('store_id' => $store_id, 'is_on_sale' => 1);
				$map['_string'] = "store_cat_id1 in ($cat_id) OR store_cat_id2 in($cat_id)";
				$cat_goods = M('goods')->field('goods_content', true)->where($map)->order('goods_id desc')->select();
			}
			$this->assign('link_cat', $link_cat); //zhoufei

			// zhoufei
		} else {
			$this->error('该店铺不存在或者已关闭', U('Index/index'));
		}
	}

	public function index() {
		$store_id = $this->store['store_id'];

		//热门商品排行
		$hot_goods = M('goods')->field('goods_content', true)->where(array('store_id' => $store_id, 'is_on_sale' => 1,'is_hot'=>1))->order('sales_sum desc')->limit(10)->select();
		//收藏商品排行
		$collect_goods = M('goods')->field('goods_content', true)->where(array('store_id' => $store_id, 'is_on_sale' => 1))->order('collect_sum desc')->limit(10)->select();
		//新品
		$new_goods = M('goods')->field('goods_content', true)->where(array('store_id' => $store_id, 'is_new' => 1, 'is_on_sale' => 1))->order('goods_id desc')->limit(10)->select();
		//推荐商品
		$recomend_goods = M('goods')->field('goods_content', true)->where(array('store_id' => $store_id, 'is_recommend' => 1, 'is_on_sale' => 1))->order('goods_id desc')->limit(10)->select();

		// dump($recomend_goods);exit;

		$goods_id_arr = array_merge(get_arr_column($new_goods, 'goods_id'), get_arr_column($recomend_goods, 'goods_id'));
		if ($goods_id_arr) {
			$goods_images = M('goods_images')->where("goods_id in (" . implode(',', $goods_id_arr) . ")")->cache(true)->select();
		}

		$texts = M('store_mod')->where('store_id = ' . $store_id)->select();

		foreach (unserialize($texts[0]['content']) as $v) {
			$text[] = htmlspecialchars_decode($v);
		}

		$this->assign('text', $text);
		$this->assign('sn_store_id', $store_id);
		$this->assign('hot_goods', $hot_goods);
		$this->assign('collect_goods', $collect_goods);
		$this->assign('new_goods', $new_goods);
		$this->assign('recomend_goods', $recomend_goods);
		$this->assign('navigation', $this->navigation);
		$this->assign('goods_images', $goods_images); //相册图片
		$this->assign('recommend', $this->recommend());
		$this->assign('recommend_news', $this->recommend_news());
		$this->assign('photo', $this->photo());
		$this->display('/index');
	}

	/**
	 * 首页推荐 产品
	 */
	public function recommend() {
		//查询首页推荐栏目
		$product_m = M('goods');
		$recommend = M('store_goods_class')->where(array('store_id' => $this->store['store_id'], 'is_show' => 1, 'is_recommend' => 1))->select();
		foreach ($recommend as &$v) {
			// 查询推荐商品
			$v['cat_id_goods'] = $product_m->where('(' . 'store_cat_id1 = ' . $v['cat_id'] . ' or store_cat_id2 = ' . $v['cat_id'] . ')' . 'and is_on_sale = 1')->field('goods_id,goods_name,original_img,shop_price')->limit($v['show_num'])->select();
		}
		return $recommend;
	}

	/**
	 * 首页推荐 文章
	 */
	public function recommend_news() {
		//查询首页推荐栏目
		$store_art_m = M('store_art');
		$recommend = M('store_navigation')->where(array('sn_store_id' => $this->store['store_id'], 'sn_is_list' => 1, 'sn_is_show' => 1, 'sn_is_home' => 1))->select();
		foreach ($recommend as &$v) {
			// 查询推荐商品
			$v['news'] = $store_art_m->where(array('sn_id' => $v['sn_id'], 'is_show' => 1))->field('id,sn_id,title,author,timer,pc_click,keyword,description,newsimg')->limit($v['sn_show_num'])->select();
		}
		// echo '<pre>';
		// print_r($recommend);exit;

		return $recommend;
	}

	/**
	 * 相册首页显示
	 */
	public function photo() {
		$photoimg = M('photoimg');
		$photo = M('photo')->where(array('store_id' => $this->store['store_id'], 'home' => 1, 'status' => 1))->select();
		foreach ($photo as &$v) {
			$v['photoimg'] = $photoimg->where(array('photoid' => $v['id']))->select();
		}

		return $photo;
	}

	/**
	 * 相册列表
	 */
	public function photolist() {
		$photoimg = M('photoimg');
		$photolist = M('photo')->where(array('store_id' => $this->store['store_id'], 'status' => 1))->select();
		foreach ($photolist as &$v) {
			$v['photoimg'] = $photoimg->where(array('photoid' => $v['id']))->select();
		}
		$this->assign('photolist', $photolist);
			$this->assign('navigation',$this->navigation);
		$this->display('/photolist');
	}

	/**
	 * 收藏店铺
	 */
	function collect_store() {
		$user_id = cookie('user_id');
		$store_id = $this->store['store_id'];
		$type = I('type', 0);
		if ($type == 1) {
			//删除收藏店铺
			M('store_collect')->where(array('user_id' => $user_id, 'store_id' => $store_id))->delete();
			$store_collect = M('store')->where(array('store_id' => $store_id))->getField('store_collect');
			if ($store_collect > 0) {
				M('store')->where(array('store_id' => $store_id))->setDec('store_collect');
			}
			exit(json_encode(array('status' => 1, 'msg' => '成功取消收藏')));
		}
		$count = M('store_collect')->where(array('user_id' => $user_id, 'store_id' => $store_id))->count();
		if ($count > 0) {
			exit(json_encode(array('status' => 0, 'msg' => '您已收藏过该店铺', 'result' => array())));
		}

		$data = array(
			'store_id' => $store_id,
			'user_id' => $user_id,
			'add_time' => time(),
		);
		$data['user_name'] = M('users')->where(array('user_id' => $user_id))->getField('nickname');
		$data['store_name'] = M('store')->where(array('store_id' => $store_id))->getField('store_name');
		M('store_collect')->add($data);
		M('store')->where(array('store_id' => $store_id))->setInc('store_collect');
		exit(json_encode(array('status' => 1, 'msg' => '收藏成功')));
	}

	function goods_list() {
		$store_id = I('store_id', 1);
		$cat_id = I('cat_id', 0);
		$key = I('key', 'is_new');
		$sort = I('sort', 'desc');
		$keyword = urldecode(trim(I('keyword', '')));
		$map = array('store_id' => $store_id, 'is_on_sale' => 1);
		$keyword && $map['goods_name'] = array('like', '%' . $keyword . '%');

		$cat_name = "全部商品";
		if ($cat_id > 0) {
			$map['_string'] = "store_cat_id1=$cat_id OR store_cat_id2=$cat_id";
			$cat_name = M('store_goods_class')->where(array('cat_id' => $cat_id))->getField('cat_name');
		}
		$filter_goods_id = M('goods')->where($map)->cache(true)->getField("goods_id", true);
		$count = count($filter_goods_id);
		$Page = new \Think\Page($count, 20);
		if ($count > 0) {
			$goods_list = M('goods')->where("(goods_id in (" . implode(',', $filter_goods_id) . ")) and is_on_sale = 1")->order("$key $sort")->limit($Page->firstRow . ',' . $Page->listRows)->select();
			$filter_goods_id2 = get_arr_column($goods_list, 'goods_id');
			if ($filter_goods_id2) {
				$goods_images = M('goods_images')->where("goods_id in (" . implode(',', $filter_goods_id2) . ")")->cache(true)->select();
			}
		}

		$sort = ($sort == 'desc') ? 'asc' : 'desc';
		$this->assign('sort', $sort);
		$this->assign('keys', $key);
		$link_arr = array(
			array('key' => 'is_new', 'name' => '新品', 'url' => U('Store/goods_list', array('store_id' => $store_id, 'key' => 'is_new', 'sort' => $sort, 'cat_id' => $cat_id, 'keyword' => $keyword))),
			array('key' => 'shop_price', 'name' => '价格', 'url' => U('Store/goods_list', array('store_id' => $store_id, 'key' => 'shop_price', 'sort' => $sort, 'cat_id' => $cat_id, 'keyword' => $keyword))),
			array('key' => 'sales_sum', 'name' => '销量', 'url' => U('Store/goods_list', array('store_id' => $store_id, 'key' => 'sales_sum', 'sort' => $sort, 'cat_id' => $cat_id, 'keyword' => $keyword))),
			array('key' => 'collect_sum', 'name' => '收藏', 'url' => U('Store/goods_list', array('store_id' => $store_id, 'key' => 'collect_sum', 'sort' => $sort, 'cat_id' => $cat_id, 'keyword' => $keyword))),
			array('key' => 'is_recommend', 'name' => '人气', 'url' => U('Store/goods_list', array('store_id' => $store_id, 'key' => 'is_recommend', 'sort' => $sort, 'cat_id' => $cat_id, 'keyword' => $keyword))),
		);

		//栏目信息
		$navlist = M('store_goods_class')->where(array('store_id' => $store_id, 'cat_id' => $cat_id))->find();
		$this->assign('navlist', $navlist);
		$this->assign('link_arr', $link_arr);
		$this->assign('goods_list', $goods_list);
		$this->assign('goods_images', $goods_images); //相册图片
		$this->assign('cat_name', $cat_name);
		$page_show = $Page->show(); // 分页显示输出
		$this->assign('page_show', $page_show); // 赋值分页输出
		$this->assign('navigation', $this->navigation);
		$this->assign('keyword', $keyword);
		$this->display('/goods_list');
	}

	function store_news() {
		$sn_id = I('sn_id');
		$navlist = M('store_navigation')->where(array('sn_store_id' => $this->store['store_id'], 'sn_id' => $sn_id))->find();
		$this->assign('banner', $banner);
		$navlist['sn_content'] = htmlspecialchars_decode($navlist['sn_content']);
		$this->assign('navlist', $navlist);
		$this->assign('navigation', $this->navigation);
		// dump($navlist);exit;
		$this->display('/store_news');
	}

	public function dynamic() {
		$this->assign('navigation', $this->navigation);
		$type = I('type');
		if (empty($type)) {

		}
		$map = array('store_id' => $this->store['store_id'], 'is_on_sale' => 1);
		$count = M('goods')->field('goods_content', true)->where($map)->count();
		$Page = new \Think\Page($count, 8);
		$goods_list = M('goods')->field('goods_content', true)->where($map)->limit($Page->firstRow . ',' . $Page->listRows)->select();
		$page_show = $Page->show(); // 分页显示输出
		$this->assign('page_show', $page_show); // 赋值分页输出
		$this->assign('goods_list', $goods_list);
		$this->display('/dynamic');
	}

	public function decoration_preview() {
		$decoration_id = I('decoration_id');
		$model_store_decoration = new StoreDecorationModel();
		$decoration_info = $model_store_decoration->getStoreDecorationInfoDetail($decoration_id, $this->store['store_id']);
		if ($decoration_info) {
			$this->_output_decoration_info($decoration_info);
		} else {
			//showMessage(L('param_error'), '', 'error');
		}
		$this->display('/decoration_preview');
	}

	private function _output_decoration_info($decoration_info) {
		$model_store_decoration = new StoreDecorationModel();
		$decoration_info['decoration_background_style'] = $model_store_decoration->getDecorationBackgroundStyle($decoration_info['decoration_setting']);
		$this->assign('output', $decoration_info);
	}

	public function store_ma() {
		require_once 'ThinkPHP/Library/Vendor/phpqrcode/phpqrcode.php';
		error_reporting(E_ERROR);
		\QRcode::png(U('Store/index', array('store_id' => $this->store['store_id'])));
	}

	public function search() {
		$keywords = I('get.keywords');
		$cat_id = I('get.store_id');
		if (!$keywords || !$cat_id) {$this->redirect('Index/index');}
		$map['store_id'] = array('eq', $cat_id);
		$where['goods_name'] = array('like', '%' . $keywords . '%');
		$where['keywords'] = array('like', '%' . $keywords . '%');
		$where['goods_remark'] = array('like', '%' . $keywords . '%');
		$where['_logic'] = 'or';
		$map['_complex'] = $where;
		$m = M('goods');
		$goods = $m->where($map)->select();
		$this->assign('goods_list', $goods);
		$this->display('/goods_list');
	}

	/**
	 *   @author 金龙
	 *   新闻列表页
	 */
	public function newsList() {

		$storeid = $this->store['store_id'];

		$sn_id = (empty($_GET['sn'])) ? 0 : (int) $_GET['sn'];
		$_GET['p'] = (empty($_GET['p'])) ? 0 : $_GET['p'];

		$news = M('store_art')->where('(store = ' . $storeid . ' and sn_id in (0,' . $sn_id . ')) and is_show = 1')->page($_GET['p'] . ',15')->select();
		$count = M('store_art')->where('(store = ' . $storeid . ' and sn_id in (0,' . $sn_id . ')) and is_show = 1')->count();
		$page = new \Think\Page($count, 15);

		$hot_goods = M('goods')->field('goods_content', true)->where(array('store_id' => $storeid, 'is_on_sale' => 1))->order('sales_sum desc')->limit(10)->select();
		//收藏商品排行
		$collect_goods = M('goods')->field('goods_content', true)->where(array('store_id' => $storeid, 'is_on_sale' => 1))->order('collect_sum desc')->limit(10)->select();
		//新品

		//栏目信息
		$navlist = M('store_navigation')->where(array('store_id' => $storeid, 'sn_id' => $sn_id))->find();
		$this->assign('navlist', $navlist);
		// dump($navlist);exit;

		$this->assign('hot_goods', $hot_goods);
		$this->assign('collect_goods', $collect_goods);

		$this->assign('sn_id', $sn_id);
		$this->assign('navigation', $this->navigation);
		$this->assign('page', $page->show());
		$this->assign('news', $news);
		// dump($news);exit;
		$this->display('/newslist');
	}
	/**
	 *   @author 金龙
	 *   文章详情页
	 */
	public function newscontent() {
		$storeid = $this->store['store_id'];
		$sn_id = (empty($_GET['sn'])) ? 0 : (int) $_GET['sn'];
		$text = (empty($_GET['text'])) ? 0 : (int) $_GET['text'];
		$news = M('store_art')->where('store = ' . $storeid . ' and id = ' . $text)->find();

		$next = M('store_art')->where('store = ' . $storeid . ' and sn_id in (0,' . $sn_id . ') and id > ' . $text)->order('id ASC')->limit(1)->find();
		$pre = M('store_art')->where('store = ' . $storeid . ' and  sn_id in (0,' . $sn_id . ') and id < ' . $text)->order('id DESC')->limit(1)->find();
		//点击量
		M('store_art')->where('id=' . $text)->setInc('pc_click', 1);
		$banner = M('store')->where(array('store_id' => $this->store['store_id']))->getField('store_banner');
		$this->assign('banner', $banner);

		$this->assign('pre', $pre);
		$this->assign('next', $next);
		$this->assign('sn_id', $sn_id);
		$this->assign('navigation', $this->navigation);
		$this->assign('news', $news);
		$this->display('/news');
	}

	/**
	 *   @author 金龙
	 *   fun_sun GetShop AJAX拉取产品信息
	 *
	 *   @param $type 产品分类
	 *   @param $size 显示数量
	 */
	public function GetShop() {

		$cat_id = (empty($_POST['type'])) ? 0 : (int) $_POST['type']; //cat_id
		$size = (empty($_POST['size'])) ? 1 : (int) $_POST['size'];

		$store_id = (int) $_GET['store_id'];

		$map = array('store_id' => $store_id, 'is_on_sale' => 1);

		if ($cat_id > 0) {
			$map['_string'] = "store_cat_id1=$cat_id OR store_cat_id2=$cat_id";
		}

		$goodlist = M('goods')->where($map)->field('goods_id,shop_price,market_price,goods_name,original_img')->limit(0, $size)->select();
		foreach ($goodlist as $key => $value) {
			$goodlist[$key]['goods_name'] = mb_substr($value['goods_name'], 0, 20, 'utf-8');
		}

		$this->ajaxReturn($goodlist);
	}


	/**
	 * 在线留言页面
	 */
	public  function message()
	{
		$this->assign('navigation', $this->navigation);

		$this->display('/message');
	}
}