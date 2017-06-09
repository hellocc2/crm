	
<div class="widget quick-link panel <?php echo $addition_cls; ?>">
	<?php if( $show_title ) { ?>
	<div class="widget-heading panel-heading">
		<h4 class="panel-title "><?php echo $heading_title?></h4>
	</div>
	<?php } ?>

	<?php if (!empty($categories)): ?>
		<ul class="links">
			<?php foreach ($categories as $category): ?>
			<li><a href="<?php echo $category["href"] ?>"><?php echo $category["name"] ?></a></li>
			<?php endforeach ?>
		</ul>
	<?php endif ?>

</div>