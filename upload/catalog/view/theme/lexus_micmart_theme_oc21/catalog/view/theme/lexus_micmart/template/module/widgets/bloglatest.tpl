<?php $objlang = $this->registry->get('language'); ?>
<?php if( !empty($blogs) ) { ?>
<div class="widget-blogs panel latest-posts-v4<?php echo $addition_cls; ?> <?php if ( isset($stylecls)&&$stylecls) { ?>box-<?php echo $stylecls; ?><?php } ?>">
	<?php if( $show_title ) { ?>
	<div class="panel-heading"><h4 class="panel-title"><?php echo $heading_title?></h4></div>
	<?php } ?>
	<div class="widget-inner">	 
		<div class="row">
			<?php foreach( $blogs as $key => $blog ) { $key = $key + 1;?>
			<?php $style = ( $key > $cols )?"left":"right";  ?>
			<div class="col-lg-<?php echo floor(12/$cols);?> col-md-<?php echo floor(12/$cols);?> col-sm-6 col-xs-12 <?php echo $style; ?>">
				<div class="latest-posts-body">	
					<?php if( $blog['thumb']  )  { ?>			
					<div class="latest-posts-image pull-left">
					  	<a class="" href="#">
							<img src="<?php echo $blog['thumb'];?>" title="<?php echo $blog['title'];?>" alt="<?php echo $blog['title'];?>" class="img-responsive"/>
					  	</a>
					</div>
					<?php } ?>
					<div class="latest-posts-meta media-body">
						<h6 class="latest-posts-title">
							<a href="<?php echo $blog['link'];?>" title="<?php echo $blog['title'];?>"><?php echo $blog['title'];?></a>
						</h6>
                        <div class="latest-posts-profile">                       		 
								<span class="created"><?php echo date("d M, Y",strtotime($blog['created']));?></span>
								<span class="comment"><i class="fa fa-comments-o"></i><?php echo $objlang->get("text_comment_count");?><?php echo $blog['comment_count'];?></span>																			
						</div>	
						<div class="posts-meta">												
							<div class="description space-10">
								<?php $blog['description'] = strip_tags($blog['description']); ?>
								<?php echo utf8_substr( $blog['description'],0, 150);?>...
							</div>	
							<div class="btn-more-link hidden">
								<a href="<?php echo $blog['link'];?>" class="readmore btn btn-link"><?php echo $objlang->get('text_readmore');?></a>
							</div>
						</div>
					</div>					
				</div> <!-- end latest-posts-body -->
			</div>
			<?php if( ( $key%$cols==0 || $key == count($blogs)) ){  ?>
			<?php } ?>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>