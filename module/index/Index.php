<?php
namespace Module\Index;
use Helper\RequestUtil as R;

class Index extends \Lib\common\Application {
	public function __construct() {
		$tpl = \Lib\common\Template::getSmarty ();
        $catid=R::getParams('id');//nav类别ID
		$optionid=R::getParams('sid');//option选项ID
		//echo '<pre/>';print_r(R::getParams());exit;
		if(empty($catid)){
			$catid=1;//大学
		}
		
		if(empty($optionid)){
			$optionid=1;//打分选项(满意度)
		}
						
		//获取满意度选项
		$data=array();
		$data['satisfy_cat']=$catid;
			
		$nav=new \Model\Nav();
		$res_option=$nav->selectOption($data);
		//echo '<pre/>';print_r($res_option);exit;
		if(!empty($res_option['option'])){
			$tpl->assign('res_option',$res_option['option']);
		}
		
		//获取学校打分
		$score=array();
		//$score['area_id']=2;
		$score['school_satisfy']=$optionid;
		$school=new \Model\School();
		$res_school=$school->selectSchool($score);
		//echo '<pre/>';print_r($res_school);exit;
		if(!empty($res_school['school'])){
			$tpl->assign('res_school',$res_school['school']);
		}	
		
		$tpl->assign('catid',$catid);
		$tpl->assign('optionid',$optionid);
        $tpl->display ('index.html');
        

	}
}