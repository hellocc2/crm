<?php
use Helper\ResponseUtil as rew;
/**
 * Smarty plugin
 */

function smarty_function_html_headnav($params, &$smarty)
{
    $html='';
	$html='<div class="container">
    <div class="navbar-header">
       <a href="'.rew::rewrite(array('url'=>'?module=index&action=index','isxs'=>'no')).'" class="navbar-brand">主页</a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation">
      <ul class="nav navbar-nav">';
	
	$data=array();
	$data['nav_status']=1;
			
	//获取导航
	$nav=new \Model\Nav();
	$res_nav=$nav->selectNav($data);
	
	  
	if(!empty($res_nav)){
		foreach($res_nav as $nav){
				$url=rew::rewrite(array('url'=>'?module=catgory&action=index&id='.$nav['nav_cateid'],'isxs'=>'no'));
				$html.='<li><a href='.$url.'>'.$nav['nav_name'].'</a></li>';
			
		}
	}

	$html.='
      </ul>
      <ul class="nav navbar-right navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
          <ul class="dropdown-menu" style="padding:12px;">
            <form class="form-inline">
              <button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control pull-left" placeholder="Search">
            </form>
          </ul>
        </li>
      </ul>
    </nav>
  </div>';
	return $html;

}

?>
