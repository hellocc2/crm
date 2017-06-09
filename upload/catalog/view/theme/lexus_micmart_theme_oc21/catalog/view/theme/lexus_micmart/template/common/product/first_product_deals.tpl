<?php 
$load = $this->registry->get("load");
$language = $load->language("module/themecontrol");
$text_sale = $language['text_sale'];
$ourl = $this->registry->get('url'); 
$objlang = $this->registry->get('language'); 


if(!empty($first_product)) {
?>
<div class="product-block item-default" itemtype="http://schema.org/Product" itemscope> 
  <div class="block-img text-center">
      <?php if (isset($first_product['thumb'])) {    ?>
        
        <div class="image">
          <?php if( $first_product['special'] ) {   ?>
            <span class="product-label sale"><span class="product-label-special"><?php echo $objlang->get('text_sale'); ?></span></span>
          <?php } ?>
          <a class="img" itemprop="url" title="<?php echo $first_product['name']; ?>" href="<?php echo $first_product['href']; ?>">
            <img class="img-responsive" itemprop="image" src="<?php echo $first_product['thumb']; ?>" title="<?php echo $first_product['name']; ?>" alt="<?php echo $first_product['name']; ?>" />
          </a>
        </div>
      <?php } ?>
    
    </div>
           
    <div class="product-meta">      
      <div class="top">
         <h3 class="name" itemprop="name"><a href="<?php echo $first_product['href']; ?>"><?php echo $first_product['name']; ?></a></h3>
          <?php if ( isset($first_product['rating']) ) { ?>
          <div class="rating">
            <?php for ($is = 1; $is <= 5; $is++) { ?>
            <?php if ($first_product['rating'] < $is) { ?>
            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span>
            <?php } else { ?>
            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i>
            </span>
            <?php } ?>
            <?php } ?>
          </div>
        <?php } ?> 
         
        <?php if( isset($first_product['description']) ){ ?> 
          <div class="description" itemprop="description"><?php echo utf8_substr( strip_tags($first_product['description']),0,220);?>...</div>
        <?php } ?>  
      
        <?php if ($first_product['price']) { ?>
        <div class="price" itemtype="http://schema.org/Offer" itemscope itemprop="offers">
          <?php if (!$first_product['special']) {  ?>
            <span class="price-new"><?php echo $first_product['price']; ?></span>
            <?php if( preg_match( '#(\d+).?(\d+)#',  $first_product['price'], $p ) ) { ?> 
            <meta content="<?php echo $p[0]; ?>" itemprop="price">
            <?php } ?>
          <?php } else { ?>
            <span class="price-new"><?php echo $first_product['special']; ?></span>
            <span class="price-old"><?php echo $first_product['price']; ?></span> 
            <?php if( preg_match( '#(\d+).?(\d+)#',  $first_product['special'], $p ) ) { ?> 
            <meta content="<?php echo $p[0]; ?>" itemprop="price">
            <?php } ?>

          <?php } ?>
        </div>
        <?php } ?>         
    
      </div>
      <div class="bottom">
        <div class="action">          
            <div class="wishlist">
                <button class="btn btn-dark btn-sm " type="button" title="<?php echo $objlang->get("button_wishlist"); ?>" onclick="wishlist.addwishlist('<?php echo $first_product['product_id']; ?>');"><i class="fa fa-heart"></i><span class=""><?php echo $objlang->get('button_wishlist'); ?></span></button> 
            </div>      
              
			<div class="compare">     
			<button class="btn btn-dark btn-sm" type="button" title="<?php echo $objlang->get("button_compare"); ?>" onclick="compare.addcompare('<?php echo $first_product['product_id']; ?>');"><i class="fa fa-refresh"></i><span class=""><?php echo $objlang->get('button_compare'); ?></span></button> 
			</div>  
			<!-- zoom image-->
			<?php if( isset($categoryPzoom) && $categoryPzoom ) { $zimage = str_replace( "cache/","", preg_replace("#-\d+x\d+#", "",  $first_product['thumb'] ));  ?>
			<div class="zoom ">
			  <a href="<?php echo $zimage;?>" class="product-zoom btn btn-dark btn-sm" title="<?php echo $first_product['name']; ?>">
			  <i class="fa fa-search-plus"></i>
			  <span>
			  <?php echo $objlang->get('zoom'); ?></span>
			  </a>
			</div>
			<?php } ?> 

			<?php if ( isset($quickview) && $quickview ) { ?>
			<div class="quickview">
			 <a class="iframe-link  btn btn-dark btn-sm" href="<?php echo $ourl->link('themecontrol/product','product_id='.$first_product['product_id']);?>" title="<?php echo $objlang->get('quick_view'); ?>">
			 <i class="fa fa-eye"></i>
			<span><?php echo $objlang->get('quick_view'); ?></span>
			</a>
			</div>
			<?php } ?>
        </div>
        <div class="bottom-last space-padding-t20">      
			<?php if( !isset($listingConfig['catalog_mode']) || !$listingConfig['catalog_mode'] ) { ?>
			<div class="cart">            
			<button data-loading-text="Loading..." class="btn btn-primary btn-md radius-5x" type="button" onclick="cart.addcart('<?php echo $first_product['product_id']; ?>');">
			  <span class=""><?php echo $objlang->get('button_cart'); ?></span>
			</button>
			</div>
			<?php } ?>
		</div>
    </div>
    
  </div>  
</div>
<div id="item_countdown_<?php echo $first_product['product_id']; ?>" class="item-countdown space-padding-lr-20"></div>
<script type="text/javascript">
  jQuery(document).ready(function($){
	$("#item_countdown_<?php echo $first_product['product_id']; ?>").lofCountDown({
	  formatStyle:2,
	  TargetDate:"<?php echo date('m/d/Y G:i:s', strtotime($first_product['date_end_string'])); ?>",
	  DisplayFormat:"<ul class='list-inline'><li>%%D%% <div><?php echo $objlang->get("text_days");?></div></li><li> %%H%% <div><?php echo $objlang->get("text_hours");?></div></li><li> %%M%% <div><?php echo $objlang->get("text_minutes");?></div></li><li> %%S%% <div><?php echo $objlang->get("text_seconds");?></div></li></ul>",
	  FinishMessage: "<?php echo $objlang->get('text_finish');?>"
	});
  });
</script>
<?php } ?>





