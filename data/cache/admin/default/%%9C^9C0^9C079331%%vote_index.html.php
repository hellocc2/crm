<?php /* Smarty version 2.6.18, created on 2015-11-24 15:35:47
         compiled from vote_index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'rewrite', 'vote_index.html', 10, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header2.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['style_url']; ?>
css/star.css?r=<?php echo $this->_tpl_vars['REVISION']; ?>
" /> 
<!--main-->
<div class="main">
<div class="container">  
<div class="row">
<div class="col-md-6"> 
	<div class="panel panel-default">
	   <div class="panel-heading">
		 <?php echo $this->_tpl_vars['res_school']['0']['school_name']; ?>
<a href='<?php echo smarty_function_rewrite(array('url' => "?module=comment&action=index&id=".($this->_tpl_vars['catid'])."&sid=".($this->_tpl_vars['sid'])), $this);?>
'>(98977条评论)</a>
	   </div>
	   <!--panel-->
			<div class="panel">
			<div class="panel-body">
			<?php if ($this->_tpl_vars['res_school']): ?>
			<?php $_from = $this->_tpl_vars['res_school']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['school']):
?>
			<?php $this->assign('schoolid', $this->_tpl_vars['school']['school_id']); ?>
			<div class="progroup">
			  <div class="progress" >
			  <div class="progress-bar progress-bar-info" role="progressbar" style="width:<?php echo $this->_tpl_vars['school']['score']; ?>
%">
				<span><?php echo $this->_tpl_vars['school']['satisfy_name']; ?>
<a href='<?php echo smarty_function_rewrite(array('url' => "?module=vote&action=index&id=".($this->_tpl_vars['catid'])."&pid=".($this->_tpl_vars['schoolid'])), $this);?>
'>(<?php echo $this->_tpl_vars['school']['membernum']; ?>
人投票)</a></span>
			  </div>
			  </div>
			</div>
			<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
		
			</div>
			</div>
		<!--panel end-->
	</div>
</div>
<div class="col-md-6"> 
	<div class="panel panel-default">
	   <div class="panel-heading">
		  <?php echo $this->_tpl_vars['res_school']['0']['school_name']; ?>

	   </div>
	   <div class="panel-body">
		 <ul  class="list-group">
		<?php if ($this->_tpl_vars['res_school']): ?>
		<?php $_from = $this->_tpl_vars['res_school']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['school']):
?>
		<?php $this->assign('satisfy_id', $this->_tpl_vars['school']['satisfy_id']); ?>
		<li id="star<?php echo $this->_tpl_vars['satisfy_id']; ?>
" satisfy="<?php echo $this->_tpl_vars['satisfy_id']; ?>
" class="list-group-item star">
			<strong><?php echo $this->_tpl_vars['school']['satisfy_name']; ?>
</strong>
			<div>
			<input name="1" type="button" class="inputstar"/>
			<input name="2" type="button" class="inputstar"/>
			<input name="3" type="button" class="inputstar"/>
			<input name="4" type="button" class="inputstar"/>
			<input name="5" type="button" class="inputstar"/>
			<input name="6" type="button" class="inputstar"/>
			<input name="7" type="button" class="inputstar"/>
			<input name="8" type="button" class="inputstar"/>
			<input name="9" type="button" class="inputstar"/>
			<input name="10" type="button" class="inputstar"/>
			<span id="starValue<?php echo $this->_tpl_vars['satisfy_id']; ?>
">
			<b><font size="5" color="#fd7d28">0</font></b>分
			</span>
			</div>
		</li>
		<?php endforeach; endif; unset($_from); ?>
		<?php endif; ?>
			
		</ul>
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
$(".inputstar").mouseover(function(){
		//我的评分
		var inputstar=$(this).parents('li').attr('id');
		var starval=$(this).nextAll('span').attr('id');
		var GradList = document.getElementById(inputstar).getElementsByTagName("input");	
		
		//移入展示
		clear(GradList);
		for(var Qi=0;Qi<this.name;Qi++){
			GradList[Qi].style.backgroundPosition = 'left center';
			
		}		
		
		star(GradList);
	})

	
	function star(GradList){
		for(var i=0;i < GradList.length;i++){
			 temp = 0;
			GradList[i].onclick = function(){
				temp = this.name;
				var starval=$(this).nextAll('span').attr('id');
				var school_id="<?php echo $this->_tpl_vars['sid']; ?>
";
				var school_satisfy=$(this).parents('li').attr('satisfy');
				var school_score=temp;
				
				//评分
				$.ajax({ 
					cache:"false",
					url: root_url+"index.php?module=ajax&action=star",
					type: "get", 
					data:"memberid="+memberid+"&school_id="+school_id+"&school_satisfy="+school_satisfy+"&school_score="+school_score,
					success: function(data){
						data = $.parseJSON( data );
						if(data.flag==1){
							document.getElementById(starval).innerHTML = '<b><font size="5" color="#fd7d28">'+temp+'</font></b>分(评分成功)';
							current(temp);
						}else{
							document.getElementById(starval).innerHTML = '<b><font size="5" color="#fd7d28">评分失败</font></b>';
						}
					}
				}); 
				//评分END
			}
			
			//移出star
			GradList[i].onmouseout = function(){
				for(var Qi=0;Qi<this.name;Qi++){
					GradList[Qi].style.backgroundPosition = 'right center';
				}
				var starval=$(this).nextAll('span').attr('id');
				var temp=document.getElementById(starval).getElementsByTagName("font")[0].innerHTML;
				current(temp);
			}
		}

		//显示当前第几颗星
		function current(temp){
			clear(GradList);
		   for(var Qii=0;Qii<temp;Qii++){
			 GradList[Qii].style.backgroundPosition = 'left center';
		   }
		}	
		
	}
	
	//清除所有
	function clear(GradList){
		for(var Qi=0;Qi<GradList.length;Qi++){
		  GradList[Qi].style.backgroundPosition = 'right center';
		}
	}



</script>

</html>