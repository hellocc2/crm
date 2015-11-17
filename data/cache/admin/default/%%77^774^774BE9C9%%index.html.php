<?php /* Smarty version 2.6.18, created on 2015-11-17 15:02:47
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite', 'index.html', 13, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header2.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<!--main-->
<div class="container "> 
<div class="row"> 
	<div class="col-md-2">
		<div class="panel">
		<div class="panel-body">
			<ul class="nav nav-pills nav-stacked">
			<?php if ($this->_tpl_vars['res_option']): ?>
			<?php $_from = $this->_tpl_vars['res_option']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
			<?php $this->assign('sid', $this->_tpl_vars['option']['satisfy_id']); ?>
			<?php if ($this->_tpl_vars['optionid'] == $this->_tpl_vars['sid']): ?>
			 <li class="active"><a href='<?php echo smarty_function_rewrite(array('url' => "?module=category&action=index&id=".($this->_tpl_vars['catid'])."&sid=".($this->_tpl_vars['sid'])), $this);?>
'><?php echo $this->_tpl_vars['option']['satisfy_name']; ?>
</a></li>
			<?php else: ?>
			 <li><a href='<?php echo smarty_function_rewrite(array('url' => "?module=category&action=index&id=".($this->_tpl_vars['catid'])."&sid=".($this->_tpl_vars['sid'])), $this);?>
'><?php echo $this->_tpl_vars['option']['satisfy_name']; ?>
</a></li>
			<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
			</ul>
		</div>
		</div>	
    </div>
	<div class="col-md-7" >
		<div class="panel">
		<div class="panel-body">
		<?php if ($this->_tpl_vars['res_school']): ?>
		<?php $_from = $this->_tpl_vars['res_school']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['school']):
?>
		<div class="progroup">
		  <div class="progress" >
		  <div class="progress-bar progress-bar-info" role="progressbar" style="width:<?php echo $this->_tpl_vars['school']['score']; ?>
%">
			<span><?php echo $this->_tpl_vars['school']['school_name']; ?>
<a href="?module=vote&action=Index">(<?php echo $this->_tpl_vars['school']['membernum']; ?>
人投票)</a></span>
		  </div>
		  </div>
		</div>
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
	
		</div>
		</div>		
    </div>

	<div class="col-md-3">
	<div class="panel">
	<div class="panel-body">
		<a>最新评论</a>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
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