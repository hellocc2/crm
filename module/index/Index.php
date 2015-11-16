<?php
namespace Module\Index;
use Helper\RequestUtil as R;
use Helper\CheckLogin as CheckLogin;

class Index extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
        $db = \Lib\common\Db::get_db();
		$action=R::getParams ('action');
		
		$data=array();
		$data['nav_status']=1;
				
		//获取导航
		$nav=new \Model\Nav();
		$res_nav=$nav->selectNav($data);
		//echo '<pre/>';print_r($res_nav);exit;
		if(!empty($res_nav)){
			$tpl->assign('res_nav',$res_nav);
		}
		
		//获取排名
		
		$tpl->assign('action',$action);
        $tpl->display ('index.html');
        

	}
}