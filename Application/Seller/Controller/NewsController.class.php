<?php
/**
*	@author 金龙
*	2016/11/30
*	文章管理
*/
namespace Seller\Controller;
class NewsController extends BaseController {

	public function NewsList()
	{	
		$id = (!empty($_GET['type']))?$_GET['type']:0;

		$_GET['p'] = (empty($_GET['p']))?0:$_GET['p'];

		$list= M('store_art')->where('sn_id = '.$id.' and store = '.STORE_ID)->page($_GET['p'].',10')->select();

		$nav = M('store_navigation')->where("sn_store_id=".STORE_ID)->getfield('sn_id,sn_title');

		foreach ($list as $key => $val) {
			$list[$key]['is_show'] = $val['is_show']>0 ? '显示' : '隐藏';
			$list[$key]['sn_id'] = (empty($nav[$val['sn_id']]))?'所有':$nav[$val['sn_id']];
		}

		$count = M('store_art')->where('sn_id = '.$id.' and store = '.STORE_ID)->count();

		$Page = new \Think\Page($count,10);
		$show = $Page->show();
		$this->assign('page',$show);


		$this->assign('nav',$nav);
		$this->assign('list',$list);
		$this->display();
	}

	public function addNews()
	{
		$nav = M('store_navigation')->where("sn_store_id=".STORE_ID)->select();
		
		$this->assign('nav',$nav);
		$this->assign('all',0);
		$this->display();
	}
	public function uddNews()
	{
		$nav = M('store_navigation')->where("sn_store_id=".STORE_ID)->select();

		$info = M('store_art')->where('id = '.$_GET['id'].' and store = '.STORE_ID)->select();
		
		$this->assign('info',$info[0]);
		$this->assign('nav',$nav);
		$this->display();
	}
	public function newsHandle(){
		$data = I('post.');
		$data['timer'] = time();
		if($data['act'] == 'del'){
			$r = M('store_art')->where('id='.$data['id'])->delete();
			if($r) exit(json_encode(1));
		}
		if(empty($data['id'])){
			$data['store'] = STORE_ID;
			$r = M('store_art')->add($data);
		}else{
			$r = M('store_art')->where('id='.$data['id'])->save($data);
		}
		if($r){
			$this->success("操作成功",U('News/NewsList'));
		}else{
			$this->error("操作失败",U('News/NewsList'));
		}
	}
}