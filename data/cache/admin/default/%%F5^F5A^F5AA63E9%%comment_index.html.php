<?php /* Smarty version 2.6.18, created on 2015-11-27 16:21:50
         compiled from comment_index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite', 'comment_index.html', 50, false),array('function', 'math', 'comment_index.html', 61, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header2.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="container">

  <div class="row">
    
    <div class="col-md-8"> 
      
      <div class="panel">
        <div class="panel-body">
          
          
          
          <!--/stories-->
		  <?php if ($this->_tpl_vars['comment']): ?>
		  <?php $_from = $this->_tpl_vars['comment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['com']):
?>
		  <div class="border">
          <div class="rowline">    
            <br>
            <div class="col-md-2 col-sm-3 text-center">
              <a class="story-title" href="#">
			  <img alt="" src="<?php echo $this->_tpl_vars['com']['member_pic']; ?>
" style="width:100px;height:100px" class="img-circle">
			  </a>
            </div>
            <div class="col-md-10 col-sm-9">
			<h5><strong>14 Useful Sites for Designers</strong></h5>
              <div >
				<?php echo $this->_tpl_vars['com']['comcont']; ?>

			  </div>
            </div>
          </div>
          </div>
		  <?php endforeach; endif; unset($_from); ?>
		  <?php endif; ?>
         <!--/stories-->
          
          
          <a href="/" class="btn btn-primary pull-right btnNext">More <i class="glyphicon glyphicon-chevron-right"></i></a>
        
          
        </div>
      </div>
                                                                                       
	                                                
                                                      
   	</div><!--/col-8-->
	
	<div class="col-md-4">
		<div class="formline">
		<form action='<?php echo smarty_function_rewrite(array('url' => "?module=comment&action=Add"), $this);?>
' method="post" id="comform">
		<input type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
" name="commentid"/>
		<input type="hidden" value="<?php echo $this->_tpl_vars['sid']; ?>
" name="commentcat"/>
		  <div class="form-group">
			<label for="comment"><?php echo $this->_tpl_vars['comment']['0']['school_name']; ?>
</label>
			<textarea name="comcont" class="form-control" rows="20" id="comment"></textarea>
		  </div>
		   <div class="form-group">
			<label for="yzm">输入验证码:</label>
			<input  class="verification" name="verifycode" type="text"  maxlength=4 onFocus="this.value=''" autocomplete="off"/>
			<a href="javascript:changeimg('comment')">
				<img id="vfcodesuggest" src="?module=auth&action=captcha&act=comment&<?php echo smarty_function_math(array('equation' => 'rand(100,10000)'), $this);?>
" style="border:1px solid #e4eef9;height: 30px;" align="absmiddle" alt="换一张">
			</a>
		  </div>
		  <button type="submit" class="btn btn-default btn-add ">发表言论</button>
		</form>
		</div>
	</div><!--/col-4-->
	
	<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">评论提交</h4>
      </div>
      <div class="modal-body">
        成功!
      </div>
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
<script>
function changeimg(act)
{
	$('#vfcode'+act).attr('src','v2.crm.com/auth/captcha/?act='+ act + '&' + Math.random());
}

$(function(){
	$('#comform').submit(function(event) {
		event.preventDefault();
		$('#comform').ajaxSubmit({
			url: $('#comform').attr("action"),
			type: 'post',
			dataType: 'json',
			success: function(res){
				if (res.flag==1) {
					$('.modal-body').html("成功！");
					$('#myModal').modal('show');
				}else{
					$('.modal-body').html("失败！");
					$('#myModal').modal('show');
				}
			}
		});
		
	});
})


</script>
</html>