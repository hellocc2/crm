<?php
use Helper\ResponseUtil as rew;
/**
 * Smarty plugin
 */

function smarty_function_html_headnav($params, &$smarty)
{
    $html='';
	$html='<div class="container">
    <nav class="collapse navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">';
	
	$data=array();
	$data['nav_status']=1;
			
	//获取导航
	$nav=new \Model\Nav();
	$res_nav=$nav->selectNav($data);
	
	  
	if(!empty($res_nav['nav'])){
		foreach($res_nav['nav'] as $nav){
				$url=rew::rewrite(array('url'=>'?module=category&action=index&id='.$nav['nav_cateid'],'isxs'=>'no'));
				$html.='<li><a href='.$url.'>'.$nav['nav_name'].'</a></li>';
			
		}
	}

	$html.='</ul>';
	$login=rew::rewrite(array('url'=>'?module=member&action=login','isxs'=>'no'));
	$reg=rew::rewrite(array('url'=>'?module=member&action=reg','isxs'=>'no'));
	$html.='
      <ul class="nav navbar-right navbar-nav">
        <a href="'.$login.'">登录</a>|<a href="'.$reg.'">注册</a>
      </ul>';
	$html.='</nav>';

	$html.='</div>';
  

	return $html;

}

?>
