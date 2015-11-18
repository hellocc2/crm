<?php
namespace Module\Vote;
use Helper\RequestUtil as R;
use Helper\CheckLogin as CheckLogin;

class Index extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
		$id=R::getParams ('id');//1大学2专业...
		$pid=R::getParams ('pid');//学校ID,专业ID...
		
		
		$tpl->assign('action',$action);
        $tpl->display ('vote_index.html');
        

	}
}