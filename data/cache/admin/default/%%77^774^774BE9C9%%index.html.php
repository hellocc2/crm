<?php /* Smarty version 2.6.18, created on 2015-11-05 11:34:49
         compiled from index.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>学评网</title>
  <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?php echo $this->_tpl_vars['style_url']; ?>
css/style.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $this->_tpl_vars['style_url']; ?>
css/bootstrap.min.css" type="text/css" />
</head>
<body>
<!--head-->
<div class="head">
<div class="container">  
<div class="row"> 
	<div class="col-md-6"><img src="<?php echo $this->_tpl_vars['style_url']; ?>
/img/title.png"/></div>
	<div class="col-md-6">
	<form class="form-inline" style="margin-top:28px">
	<div class="form-group controls">
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
<div class="catgory">
<div class="container">  
<div class="row">
<div class="col-md-12"> 
	<ul class="nav nav-tabs">
	  <li role="presentation" class="active"><a href="#">Home</a></li>
	  <li role="presentation"><a href="#">Profile</a></li>
	  <li role="presentation"><a href="#">Messages</a></li>
	</ul>
</div>	
</div>
</div>
</div>

<!--main-->
<div class="main" style="margin-top:20px"> 
<div class="container"> 
<div class="row"> 
	<div class="col-md-3">
         <ul class="nav nav-pills nav-stacked">
		   <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
		</ul>
    </div>
	<div class="col-md-6">
         <h4>第一列</h4>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
	<div class="col-md-3">
         <h4>第一列</h4>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
</div>
</div>
</div>



<script src="<?php echo $this->_tpl_vars['style_url']; ?>
js/jquery.min.js"></script>
<script src="<?php echo $this->_tpl_vars['style_url']; ?>
js/bootstrap.min.js"></script>
</body>
</html>