<?php /* Smarty version 2.6.18, created on 2015-11-16 20:53:33
         compiled from header.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>学评网</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?php echo $this->_tpl_vars['style_url']; ?>
css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->_tpl_vars['style_url']; ?>
css/style.css" type="text/css" />
 
</head>
<body>
<div class="body" style="background-color:#f6f4f0">
<!--head-->
<div class="head">
<div class="container">  
<div class="row"> 
<div class="col-md-6"><img src="<?php echo $this->_tpl_vars['style_url']; ?>
/img/title.png"/></div>
<div class="col-md-6">
	<form class="form-inline" style="margin-top:28px">
	<div class="form-group controls input-append">
		<label for="search" class="sr-only">搜索...</label>
		<input style="width:400px" type="text" class="form-control" id="search" placeholder="搜索...">
	</div>
	<button type="submit" class="btn btn-default">Go!</button>
	</form>
	<!-- /form -->
</div>
</div>
</div>
</div>

<!--catgory-->
<div class="catgory ">
<div class="container">  
<div class="row">
<div class="col-md-12"> 
	<ul class="nav nav-tabs">
	  <li class="active"><a href="#">主页</a></li>
	   <?php if ($this->_tpl_vars['res_nav']): ?>
	  <?php $_from = $this->_tpl_vars['res_nav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nav']):
?>
	   <li><a href="<?php echo $this->_tpl_vars['nav']['nav_cateid']; ?>
"><?php echo $this->_tpl_vars['nav']['nav_name']; ?>
</a></li>
	  <?php endforeach; endif; unset($_from); ?>
	  <?php endif; ?>
	</ul>
</div>	
</div>
</div>
</div>