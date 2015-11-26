<?php
namespace Module\Ajax;
use \helper\RequestUtil as R;
/**
 * 验证码检测
 */
class VerifyCode extends \Lib\common\Application{
    public function __construct(){
		// -------------发表评论评价：是否有帮助--------------
		 $act=trim(R::getParams('act'));
		 $code=trim(R::getParams('code'));
		 if (!isset($_SESSION['captcha'][$act]) || $code != $_SESSION['captcha'][$act] ){
		 	die('0');
		 }else{
		 	die('1');
		 }
    }
}