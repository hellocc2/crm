<?php
/******************************************************
 * @package Pav Product Tabs module for Opencart 1.5.x
 * @version 1.0
 * @author http://www.pavothemes.com
 * @copyright	Copyright (C) Feb 2012 PavoThemes.com <@emai:pavothemes@gmail.com>.All rights reserved.
 * @license		GNU General Public License version 2
*******************************************************/

	$id = rand(1,9)+rand();
	$tab = rand();
	$tabs_name = isset($image_featured['name']) ? $image_featured['name'] : array();
	$tabs_image = isset($image_featured['image']) ? $image_featured['image'] : array();
?>

<div class="widget-products imagetabs panel panel-v3">
	<?php if( $show_title ) { ?>
	<div class="widget-heading panel-heading"><h4 class="panel-title"><?php echo $heading_title?></h4></div>
	<?php } ?>
	<div class="tab-v2 tabs-left">
            <ul role="tablist" class="nav nav-tabs" id="image_tabs<?php echo $id;?>">
            	<?php foreach( $tabs_name as $key => $name ){?>
	                <li>
	                    <a data-toggle="tab" role="tab" href="#tab-<?php echo $key; ?>">
							<?php echo $name; ?>
						</a>
	                </li>
	            <?php } ?>
            </ul> 


	<div class="tab-content">
		<?php foreach( $tabs_image as $key => $image ) {
			$thumb = $this->model_tool_image->resize($image, $image_width, $image_height);
			$img = isset($thumb)?$thumb:$placeholder;
		?>
			<div class="tab-pane fade box-products"  id="tab-<?php echo $key; ?>">
				<img class="img-responsive" alt="img" src="<?php echo $img; ?>" />
			</div>
		<?php } // endforeach of tabs ?>
	</div>

	</div>
  	
</div>


<script>
$(function () {

	$('#image_tabs<?php echo $id;?> a:first').tab('show');
	})

	var tabChange = function () {
		var tabs = $('.imagetabs .nav-tabs > li');
		var active = tabs.filter('.active');
		var next = active.next('li').length ? active.next('li').find('a') : tabs.filter(':first-child').find('a');
		// Use the Bootsrap tab show method
		next.tab('show');
	};
	// Tab Cycle function
	var tabCycle = setInterval(tabChange, 5000);

	// Tab click event handler
	$('.imagetabs .nav-tabs li a').on('click', function (e) {
		e.preventDefault();
		// Stop the cycle
		clearInterval(tabCycle);
		// Show the clicked tabs associated tab-pane
		$(this).tab('show');
		// Start the cycle again in a predefined amount of time
		setTimeout(function () {
			//tabCycle = setInterval(tabChange, 5000);
		}, 15000);
	});
	
</script>