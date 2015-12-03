<?php
namespace Module\Member;
use Helper\RequestUtil as R;
use Helper\ResponseUtil as rew;

class Reg extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
	
		// if(!\helper\Verification::isemail($email)) {
			// \helper\Js::alertForward('邮箱格式错误');					
		// }
		
		if($_POST ){//var_dump($_POST);exit;
			$userpass    = R::getParams('userpass');
			$userpass2   = R::getParams('userpass2');
			$email       = R::getParams('email');
			$clientIp = \Helper\RequestUtil::getClientIp();
			
			$reg_array 	= array();
		
			$reg_array['member_email'] = $email;
			$reg_array['password'] = md5($userpass);
			$reg_array['logintime'] = time();
			$reg_array['member_ip'] = $clientIp;
			
			$mem = new \Model\Member();
			$res=$mem->memberReg($reg_array);
			//echo '<pre/>';var_dump($res);exit;
			if($res){
				$url=rew::rewrite(array('url'=>'?module=member&action=index','isxs'=>'no'));
				\helper\Js::alertForward('成功',$url);	
			}else{
				\helper\Js::alertForward('失败');
			}
			
		}
	
       $tpl->display('member_reg.html');   

	}
}