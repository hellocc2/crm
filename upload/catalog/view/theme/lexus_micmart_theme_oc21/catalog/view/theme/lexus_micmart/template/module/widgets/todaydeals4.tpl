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
<div class="productdeals productdeals-v4">
	
		<div class="clearfix <?php echo $addition_cls; ?> panel-v5">
			<div class="pull-left">
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
		<div class="bg-white col-nopadding">
			<div class="row">		
				<!-- col2 first product -->
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 product-v2 border-right">
					<?php require( DIR_TEMPLATE.$config->get('config_template').'/template/common/product/first_product_deals2.tpl');?>
				</div>
				<!-- col3 -->	
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="box-products  product-v4 effect-carousel"  id="widget-todaydeals-<?php echo $id;?>" data-ride="owlcarousel">			
						<?php if( count($products) > $items ) { ?>
			            <div class="carousel-controls-v1">
			           		<a class="carousel-control carousel-sm left" href="#widget-todaydeals-<?php echo $id;?>"   data-slide="prev"><i class="fa fa-angle-left"></i></a>
							<a class="carousel-control carousel-sm right" href="#widget-todaydeals-<?php echo $id;?>"  data-slide="next"><i class="fa fa-angle-right"></i></a>
						</div>

					<?php } ?>
						<div class="carousel-inner product-grid">
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
</div>
