<?php
namespace Module\Ajax;
use \helper\RequestUtil as R;
/**
 * 投票数据
 * @sinc 2015-11-24
 */
class star extends \Lib\common\Application{
    public function __construct(){
		$memberid=R::getParams('memberid');
		$school_id=R::getParams('school_id');//学校ID
		$school_satisfy=R::getParams('school_satisfy');//满意度类别
		$school_score=R::getParams('school_score');//评分
		
		$data=array();
		$data['memberid']=$memberid;
		$data['school_id']=$school_id;
		$data['school_satisfy']=$school_satisfy;
		$data['school_score']=$school_score;
		
		$school=new \Model\School();
		$res=$school->insertSchoolScore($data);
		if($res){
			$result=array('flag'=>1,'msg'=>'成功');	
		}else{
			$result=array('flag'=>-1,'msg'=>'失败');	
		}
		
		echo json_encode($result);
		exit;
		
    }
}