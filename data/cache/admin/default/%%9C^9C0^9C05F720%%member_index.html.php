<?php /* Smarty version 2.6.18, created on 2015-12-03 11:43:36
         compiled from member_index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite', 'member_index.html', 11, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container">
  <div class="row">
	  <div class="col-md-5"> 
	  <div class="panel">
	  <div class="panel-body">
  
		<!--个人中心-->
		
		<form class="form-horizontal" action='<?php echo smarty_function_rewrite(array('url' => "?module=member&action=Index"), $this);?>
' method="post" id="memform">
		  <div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">登录账号</label>
			<div class="col-sm-10">
			  666@666.com
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">当前头像</label>
			<div class="col-sm-10">
			 <img src=""/>
			</div>
		  </div>
		  <div class="form-group">
			<label for="inputPassword3" class="col-sm-2 control-label">昵称</label>
			<div class="col-sm-10">
			  <input type="text" name="nickname" class="form-control" id="inputPassword3" placeholder="Password">
			</div>
		  </div>
	
		  <div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			  <button type="submit" class="btn btn-default">保存</button>
			</div>
		  </div>
		</form>
		<!--个人中心END-->
		
	   </div>
	   </div>
	   </div>
  </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</html>