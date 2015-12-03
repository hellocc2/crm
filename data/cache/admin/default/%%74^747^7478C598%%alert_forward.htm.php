<?php /* Smarty version 2.6.18, created on 2015-12-03 11:16:25
         compiled from alert_forward.htm */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite', 'alert_forward.htm', 19, false),)), $this); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<style type="text/css">
.msg_icon {
    margin: 0 auto;
    padding: 280px 10px 50px;
    text-align: center;
    background: url("<?php echo $this->_tpl_vars['image_global_url']; ?>
empty.png?v=1.0") center 30px no-repeat;
}
.msg_icon p {
    line-height: 180%;color: #ff825a;font-size: 18px;
}
.msg_icon a{color: #999;}
</style>
<div class="m-box">
	<div class="w">
		
		<div class="msg_icon">
		<p><a href='<?php echo smarty_function_rewrite(array('url' => "?module=index&action=index"), $this);?>
'><?php echo $this->_tpl_vars['lang']['head_Home']; ?>
</a></p>
		<?php if ($this->_tpl_vars['msg']): ?><p><?php echo $this->_tpl_vars['msg']; ?>
</p><?php endif; ?>
		<?php if ($this->_tpl_vars['url']): ?>
			<p><a href="<?php echo $this->_tpl_vars['url']; ?>
">[跳转]</a></p>
		<?php else: ?>
			<p>
			<a href="javascript:history.back();">[返回]</a>
			</p>
		<?php endif; ?>
	</div>

	</div></div>




<?php if ($this->_tpl_vars['timeout'] > 0): ?>
 <script>setTimeout(
		 <?php if ($this->_tpl_vars['url']): ?>
	  		"window.location='<?php echo $this->_tpl_vars['url']; ?>
'"
	  	 <?php else: ?>
	  		"history.back()"
	 	 <?php endif; ?>
	  	, <?php echo $this->_tpl_vars['timeout']; ?>
);
 </script>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>