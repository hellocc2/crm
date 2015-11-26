<?php
namespace Module\Comment;
use Helper\RequestUtil as R;
use Helper\CheckLogin as CheckLogin;

class Index extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
       	$id=R::getParams ('id');//类别ID:1学校2专业
		$sid=R::getParams ('sid');//学校|专业对应ID
		
		
		
		
		
		switch($id){
			case 1:
				$data=array();
				$data['school_id']=$school_id;
				
				
				//查找评论
				$comm=new \Model\Comment();
				$res=$comm->selectSchoolComment($data);
				//echo '<pre/>';var_dump($res);exit;
				if(!empty($res['school'])){
					$tpl->assign('comment',$res['school']);
				}
			break;
			case 2:
			
			break;
		}
		
		$tpl->assign('id',$id);
		$tpl->assign('sid',$sid);
        $tpl->display ('comment_index.html');
        

	}
}