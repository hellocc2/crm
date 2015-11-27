<?php
namespace Module\Ajax;
use \helper\RequestUtil as R;
/**
 * 添加评论
 * @sinc 2015-11-27
 */
class comment extends \Lib\common\Application{
    public function __construct(){
		$verifycode=strtolower(R::getParams ('verifycode'));//验证码
		$comcont=R::getParams ('comcont');//评论内容
		$memberid=343421;
		$id=R::getParams ('commentid');//评论ID(类别具体ID)
		$cid=R::getParams ('commentcat');//评论类别(学校/专业/职称)
		
		$code = strtolower($_SESSION ['captcha'] ['comment']);
		// if($verifycode!=$code){
			// \helper\Js::alertForward('My_NewGuests_input_code_error',$alertForwardUrl,1);	
		// }
		
		switch($cid){
			case '1'://写入学校评论数据
				$data=array();
				$data['school_id']=$id;
				$data['school_comment']=$comcont;
				$data['memberid']=$memberid;
				$comm=new \Model\Comment();
				$res=$comm->insertSchoolComment($data);
				
			break;
			
			
		}
		
		if($res){
			$result=array('flag'=>1,'msg'=>'成功');	
		}else{
			$result=array('flag'=>-1,'msg'=>'失败');	
		}
		
		echo json_encode($result);
		exit;
		
    }
}