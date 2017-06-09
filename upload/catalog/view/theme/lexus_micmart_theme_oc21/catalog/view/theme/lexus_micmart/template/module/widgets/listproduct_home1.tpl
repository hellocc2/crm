<?php
	$span = 12/$cols;
	$id = rand(1,9)+substr(md5($heading_title),0,3);
	$themeConfig = (array)$this->config->get('themecontrol');
	$listingConfig = array(
		'category_pzoom'    => 1,
		'quickview'         => 0,
		'product_layout'	=> 'default',
		'enable_paneltool'	=> 0
	);
	$listingConfig = array_merge($listingConfig, $themeConfig );
	$quickview     = $listingConfig['quickview'];
	$categoryPzoom = isset($themeConfig['category_pzoom']) ? $themeConfig['category_pzoom']:0;

	$theme = $this->config->get('config_template');

	if( $listingConfig['enable_paneltool'] && isset($_COOKIE[$theme.'_productlayout']) && $_COOKIE[$theme.'_productlayout'] ){
		$listingConfig['product_layout'] = trim($_COOKIE[$theme.'_productlayout']);
	}
	$productLayout = DIR_TEMPLATE.$this->config->get('config_template').'/template/common/product/'.$listingConfig['product_layout'].'.tpl';
	if( !is_file($productLayout) ){
		$listingConfig['product_layout'] = 'default';
	}
	$productLayout = DIR_TEMPLATE.$this->config->get('config_template').'/template/common/product/'.$listingConfig['product_layout'].'.tpl';
	
	$load = $this->registry->get("load");
	$language = $load->language("module/themecontrol");
	$quick_view = $language['quick_view'];
	$button_cart = $this->language->get('button_cart');
	
?>


<div class="listproduct effect-carousel space-padding-t20">
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
				<li><a href="<?php echo $category["href"] ?>"><i class="fa fa-plus font-size-7 font-sie-7"></i><?php echo $category["name"] ?></a></li>
				<?php endforeach ?>
			</ul>
			<?php endif ?>
		</div>
	</div>
	<!-- banner -->
	<?php if(!empty($banner)) { ?>
	<div class="banner effect-v9 hidden-sm hidden-xs ">
		<a href="#"><img class="img-responsive" src="<?php echo $banner; ?>" alt="img"></a>
	</div>
	<?php } ?>
	<!-- column 1 -->			
	<div class="list box-products slide" id="carousel<?php echo $id;?>">
	
		<div class="carousel-inner product-grid"  >
			<?php $pages = array_chunk( $list1, $itemsperpage); ?>
			<?php foreach ($pages as  $k => $tproducts ) {   ?>
			<div class="item <?php if($k==0) {?>active<?php } ?> products-block col-nopadding">
				<?php foreach( $tproducts as $i => $product ) {  $i=$i+1;?>
					<?php if( $i%$cols == 1 || $cols == 1) { ?>
					<div class="row products-row <?php ;if($i == count($tproducts) - $cols +1) { echo "last";} ?>"><?php //start box-product?>
					<?php } ?>
						<div class="col-md-<?php echo $span;?> col-sm-<?php echo $span;?> col-xs-12 <?php if($i%$cols == 0) { echo "last";} ?> product-col border">
							<?php require( $productLayout );  ?>
						</div>

					<?php if( $i%$cols == 0 || $i==count($tproducts) ) { ?>
					</div><?php //end box-product?>
					<?php } ?>
				<?php } //endforeach; ?>
			</div>
		  <?php } ?>
		</div>
	<?php if( count($list1) > $itemsperpage ) { ?>
		<div class="carousel-controls-v1">
			<a class="carousel-control carousel-sm left" href="#carousel<?php echo $id;?>"   data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="carousel-control carousel-sm right" href="#carousel<?php echo $id;?>"  data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>
		<?php } ?>
	</div>
</div>