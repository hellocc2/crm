<?php
namespace Module\Member;
use Helper\RequestUtil as R;

class Index extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
	
		
		
		
	
       $tpl->display('member_index.html');   

	}
}