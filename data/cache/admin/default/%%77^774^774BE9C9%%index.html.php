<?php /* Smarty version 2.6.18, created on 2015-11-05 17:52:57
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
	  <li role="presentation" class="active"><a href="#">Home</a></li>
	  <li role="presentation"><a href="#">Profile</a></li>
	  <li role="presentation"><a href="#">Messages</a></li>
	</ul>
</div>	
</div>
</div>
</div>

<!--main-->
<div class="main " style="margin-top:20px"> 
<div class="container "> 
<div class="row"> 
	<div class="col-md-2">
		<div class="panel-group" id="accordion">
		  <div class="panel panel-default">
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				  href="#collapse1">
				  第 1 部分
				</a><span class="caret"></span>
			</h4>			
			</div>
			<div id="collapse1" class="panel-collapse collapse">
				<ul class="list-group">
				  <li class="list-group-item">Bootply</li>
				  <li class="list-group-item">One itmus ac facilin</li>
				  <li class="list-group-item">Second eros</li>
				</ul>
			</div>
			
			<div class="panel-heading">
			  <h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" 
				  href="#collapse2">
				  第 2 部分
				</a>
			  </h4>
			</div>
			<div id="collapse2" class="panel-collapse collapse">
			  <ul class="list-group">
				  <li class="list-group-item">Bootply</li>
				  <li class="list-group-item">One itmus ac facilin</li>
				  <li class="list-group-item">Second eros</li>
				</ul>
			</div>
			
			
		  </div>
	
		</div><!--collapse-->
    </div>
	<div class="col-md-7" style="background-color:#fff">
		<div class="progroup">
		  <div class="progress" >
		  <div class="progress-bar progress-bar-info" role="progressbar" style="width: 60%">
			<span>泡桐树小学</span>
		  </div>
		  </div>
		</div>
		<div class="progroup">
		  <div class="progress">
		  <div class="progress-bar progress-bar-info" role="progressbar" style="width: 40%">
			<span>泡桐树小学</span>
		  </div>
		  </div>
		</div>
		<div class="progroup">
		  <div class="progress">
		  <div class="progress-bar progress-bar-info" role="progressbar" style="width: 20%">
			<span>泡桐树小学</span>
		  </div>
		  </div>
		</div>
		<div class="progroup">
		  <div class="progress">
		  <div class="progress-bar progress-bar-info" role="progressbar" style="width: 10%">
			<span>泡桐树小学</span>
		  </div>
		  </div>
		</div>
		
    </div>
	<div class="col-md-3">
         <h4>第一列</h4>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
    </div>
</div>
</div>
</div>


</div><!--body-->
<script src="<?php echo $this->_tpl_vars['style_url']; ?>
js/jquery.min.js"></script>
<script src="<?php echo $this->_tpl_vars['style_url']; ?>
js/bootstrap.min.js"></script>
<script type="text/javascript">
   $(function () { 
      $('.collapse').on('show.bs.collapse', function () {
        //$(this).parent('.panel-heading').addClass("glyphicon glyphicon-menu-down");
			//alert(22);
		})
   });
</script> 
</body>
</html>