<?php
namespace Module\Member;
use Helper\RequestUtil as R;
use Helper\ResponseUtil as rew;

class Login extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
		
		if($_POST ){//echo '<pre/>';var_dump($_POST);exit;
			$email       = R::getParams('email');
			$userpass    = R::getParams('userpass');
			
			$login_array=array();
			$clientIp = \Helper\RequestUtil::getClientIp();
			$login_array['member_ip']=$clientIp;
			$login_array['member_email']=$email;
			$login_array['password']=md5($userpass);
			$login_array['logintime']=time();
			
			$loginObj = new \Model\Member();
			$res = $loginObj->memberLogin($login_array);
			
			if($res){
				$url=rew::rewrite(array('url'=>'?module=index&action=Index','isxs'=>'no'));
				\helper\Js::alertForward('成功',$url);	
			}else{
				\helper\Js::alertForward('失败');
			}						
		}
		
		$tpl->display('member_login.html');
	}
}