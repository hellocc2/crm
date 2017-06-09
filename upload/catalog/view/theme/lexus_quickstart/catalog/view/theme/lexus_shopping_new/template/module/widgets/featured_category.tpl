<div class="widget-category clearfix <?php echo $addition_cls?>">
	<?php if( $show_title ) { ?>
	<div class="widget-heading text-center space-20"><h4 class="panel-title"><?php echo $heading_title?></h4></div>
	<?php } ?>
	<div class="widget-inner">	
		<?php if(!empty($categories)) { ?>
			<div class="box-content col-nopadding">
				<ul class="list-unstyled list-inline row">
					<?php foreach ($categories as $category): ?>
					<li class="col-xs-12 col-sm-12 col-md-4 col-lg-4 categories-info ">
						<div class="row">
							<div class="col-xs-5 col-sm-5 col-md-5 categories-info-subcategory">
								<h4><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></h4>
								<ul class="category-child">
									<?php foreach ($category['children'] as $key=>$child): ?>
									<?php if($key < 5) { ?>
									<li class="child-<?php echo $key; ?>"><a href="<?php echo $child['href']; ?>"><?php echo $child['name']; ?></a></li>
									<?php } ?>
									<?php endforeach ?>
								</ul>
								<div class="item space-top-10"><a class="btn btn-xs btn-outline-light radius-2x" href="<?php echo $category['href']; ?>"><?php echo "view all";//$category['items']; ?></a></div>
							</div>
							<div class="image col-xs-7 col-sm-7 col-md-7">
								<a href="<?php echo $category['href']; ?>">
									<?php if ($category['image'] !== '') { ?>
									<img src="image/<?php echo $category['image']; ?>" alt="" class="img-responsive">
									<?php } ?>
								</a>
							</div>
						</div>												
					</li>
					<?php endforeach ?>
				</ul>
			</div>
		<?php } ?>


	</div>
</div>