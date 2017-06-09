<?php
	$span = 12/$cols;
	$id = rand(1,9)+substr(md5($heading_title),0,3);
	$id1 = rand(5,9999);
	$id2 = rand(5,9999);
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
	$columns_count  = 1;
?>


<div class="listproduct-v2 producttabs space-margin-tb-20">
	<div class="clearfix">
		<div class="pull-left panel panel-v3">
			<?php if( $show_title ) { ?>
			<div class="panel-heading"><h4 class="panel-title <?php echo $addition_cls; ?>"><?php echo $heading_title?></h4></div>
			<?php } ?>
		</div>
		<div class="pull-right">
			<?php if (!empty($categories)): ?>
			<ul class="links space-padding-t30">
				<?php foreach ($categories as $category): ?>
				<li><a href="<?php echo $category["href"] ?>"><?php echo $category["name"] ?></a></li>
				<?php endforeach ?>
			</ul>
			<?php endif ?>
		</div>
	</div>
	<div class="tab-v1">
	    <ul class="nav nav-tabs" role="tablist">
	        <li class="active">
	            <a aria-expanded="true" href="#tab-<?php echo $id1;?>" class="tab1" role="tab" data-toggle="tab"><?php echo $title_1?></a>
	        </li>
	        <li>
	            <a aria-expanded="false" href="#tab-<?php echo $id2;?>" class="tab2" role="tab" data-toggle="tab"><?php echo $title_2?></a>
	        </li>
	    </ul>
	    <div class="tab-content">
	        <div class="tab-pane fade active in" id="tab-<?php echo $id1;?>">
	           <div class="box-products product-grid  owl-carousel-play" id="carousel<?php echo $id;?>" data-ride="owlcarousel">
				<?php if( count($list1) > $itemsperpage ) { ?>
					<div class="carousel-controls carousel-controls-v3">
						<a class="carousel-control carousel-sm left" href="#carousel<?php echo $id;?>"   data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="carousel-control carousel-sm right" href="#carousel<?php echo $id;?>"  data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				<?php } ?>
						<div class="owl-carousel products-block col-nopadding"  data-show="<?php echo ($columns_count); ?>" data-pagination="false" data-navigation="true">
						<?php $pages = array_chunk( $list1, $itemsperpage); ?>
						<?php foreach ($pages as  $k => $tproducts ) {   ?>
						<div class="item <?php if($k==0) {?>active<?php } ?> ">
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
				</div>
	        </div>
	        <!-- tab 2 -->
	        <div class="tab-pane fade" id="tab-<?php echo $id2;?>">
		     	<div class="box-products owl-carousel-play" id="list2<?php echo $id;?>" data-ride="owlcarousel">
				<?php if( count($list2) > $itemsperpage2 ) { ?>
					<div class="carousel-controls carousel-controls-v3">
						<a class="carousel-control carousel-sm left" href="#list2<?php echo $id;?>"   data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="carousel-control carousel-sm right" href="#list2<?php echo $id;?>"  data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				<?php } ?>
						<div class="owl-carousel product-grid"  data-show="<?php echo ($columns_count); ?>" data-pagination="false" data-navigation="true">
						<?php $pages = array_chunk( $list2, $itemsperpage2); ?>
						<?php foreach ($pages as  $k => $tproducts ) {   ?>
						<div class="item <?php if($k==0) {?>active<?php } ?> products-block col-nopadding">
							<?php foreach( $tproducts as $i => $product ) {  $i=$i+1;?>
								<?php if( $i%$cols2 == 1 || $cols2 == 1) { ?>
								<div class="row products-row <?php ;if($i == count($tproducts) - $cols2 +1) { echo "last";} ?>"><?php //start box-product?>
								<?php } ?>
									<div class="col-md-<?php echo $span;?> col-sm-<?php echo $span;?> col-xs-12 <?php if($i%$cols2 == 0) { echo "last";} ?> product-col border">
										<?php require( $productLayout );  ?>
									</div>

								<?php if( $i%$cols2 == 0 || $i==count($tproducts) ) { ?>
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
	<script type="text/javascript"><!--
		$('#list2<?php echo $id;?>').carousel({interval:false,pause:'hover'});
		$('#carousel<?php echo $id;?>').carousel({interval:false,pause:'hover'});
	--></script>
</div>
