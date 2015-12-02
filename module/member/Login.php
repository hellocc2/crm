<?php
namespace Module\Member;
use Helper\RequestUtil as R;

class Login extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
	 	$verifycode=strtolower(R::getParams ('verifycode'));//验证码
		//var_dump($_POST);exit;
		
		$tpl->display('member_login.html');
	}
}