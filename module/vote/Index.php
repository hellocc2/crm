<?php
namespace Module\Vote;
use Helper\RequestUtil as R;
use Helper\CheckLogin as CheckLogin;

class Index extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
		$id=R::getParams ('id');//1大学2专业...
		$pid=R::getParams ('pid');//学校ID,专业ID...
		//echo '<pre/>';print_r(R::getParams ());exit;
		switch($id){
			case 1://大学
				//获取打分
				$score=array();
				//$score['area_id']=2;
				$score['school_id']=$pid;
				$school=new \Model\School();
				$res_school=$school->selectSchoolOption($score);
				//echo '<pre/>';print_r($res_school);exit;
				
				//获取评论数
				$comdata=array();
				$comdata['school_id']=$pid;
				$comres=$school->selectSchoolComment($comdata);
				
				
				if(!empty($res_school['school'])){
					$tpl->assign('res_school',$res_school['school']);
				}	
			break;
			case 2://专业
			
			break;
			case 3:
			
			break;
			case 4:
			
			break;
			
		}
		
		
		
		$tpl->assign('catid',$id);
		$tpl->assign('sid',$pid);
        $tpl->display ('vote_index.html');
        

	}
}