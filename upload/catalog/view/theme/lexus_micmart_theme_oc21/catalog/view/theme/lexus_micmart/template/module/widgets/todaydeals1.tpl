<?php 
	$themeConfig = (array)$this->config->get('themecontrol');
	$listingConfig = array(
		'category_pzoom'        => 1,
		'quickview'             => 0,
		'show_swap_image'       => 0,
		'product_layout'		=> 'default',
		'enable_paneltool'	    => 0
	);
	$listingConfig = array_merge($listingConfig, $themeConfig );
	$categoryPzoom = $listingConfig['category_pzoom'];
	$quickview     = $listingConfig['quickview'];
	$swapimg       = $listingConfig['show_swap_image'];
	$categoryPzoom = isset($themeConfig['category_pzoom']) ? $themeConfig['category_pzoom']:0; 
	$span = 12/$cols; 
	$id = rand(1,9);
	$config = $this->registry->get('config');
	
?>
<div class="productdeals productdeals-v1 space-padding-t20">
	<div class="box-content">
		<div class="clearfix">
			<div class="pull-left <?php echo $addition_cls; ?> panel-v4">
				<?php if( $show_title ) { ?>
				<div class="panel-heading"><h4 class="panel-title"><?php echo $heading_title?></h4></div>
				<?php } ?>
			</div>
			<div class="pull-right">
				<?php if (!empty($categories)): ?>
				<ul class="links space-padding-r20 space-padding-t30">
					<?php foreach ($categories as $category): ?>
					<li><a href="<?php echo $category["href"] ?>"><i class="fa fa-plus font-size-7"></i><?php echo $category["name"] ?></a></li>
					<?php endforeach ?>
				</ul>
				<?php endif ?>
			</div>
		</div>
	
		<div class="row bg-white">
			<!-- col1 banner-->
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 effect-v10 hidden-sm hidden-xs <?php echo $img_class; ?>">
				<?php if(!empty($banner)) { ?>
				<a href="#"><img class="img-responsive" src="<?php echo $banner; ?>" alt="img"></a>
				<?php } ?>
			</div>
			<!-- col2 first product -->
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 product-v1 border-right">
				<?php require( DIR_TEMPLATE.$config->get('config_template').'/template/common/product/first_product_deals.tpl');?>
			</div>

			<!-- col3 -->
			

			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 list box-products slide effect-carousel-v2"  id="widget-todaydeals-<?php echo $id;?>" >
			
				<?php if( count($products) > $items ) { ?>

	            <div class="carousel-controls-v1">
	           		<a class="carousel-control carousel-sm left" href="#widget-todaydeals-<?php echo $id;?>"   data-slide="prev"><i class="fa fa-angle-left"></i></a>
					<a class="carousel-control carousel-sm right" href="#widget-todaydeals-<?php echo $id;?>"  data-slide="next"><i class="fa fa-angle-right"></i></a>
				</div>

			<?php } ?>
				<div class="carousel-inner product-grid"  >

					<?php $pages = array_chunk( $products, $items); ?>
						<?php foreach ($pages as  $k => $tproducts ) {   ?>
						<div class="item <?php if($k==0) {?>active<?php } ?>">
							<?php foreach( $tproducts as $i => $product ) {  $i=$i+1;?>
								<?php if( $i%$cols == 1 || $cols == 1) { ?>
								<div class="row products-row <?php ;if($i == count($tproducts) - $cols +1) { echo "last";} ?>"><?php //start box-product?>
								<?php } ?>
									<div class="col-lg-<?php echo $span;?> col-md-<?php echo $span;?> col-sm-6 col-xs-12 <?php if($i%$cols == 0) { echo "last";} ?> product-col border">
										<?php require( DIR_TEMPLATE.$config->get('config_template').'/template/common/product/deal_default.tpl');?>
									</div>

								<?php if( $i%$cols == 0 || $i==count($tproducts) ) { ?>
								</div><?php //end box-product?>
								<?php } ?>
							<?php } //endforeach; ?>
						</div>
				  <?php } ?>
				</div>
			</div>	



		</div>


	</div>
</div>
