<?php
namespace Module\Vote;
use Helper\RequestUtil as R;
use Helper\CheckLogin as CheckLogin;

class Index extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
        $db = \Lib\common\Db::get_db();
		$action=R::getParams ('action');
		
		$tpl->assign('action',$action);
        $tpl->display ('vote_index.html');
        

	}
}