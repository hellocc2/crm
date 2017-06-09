<div class="image-row">
	<div class="row">
	<?php foreach ($images as $image) { ?>
		<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 banner-box">
			<a href="<?php echo $image['link']; ?>" >
				<img class="img-responsive" src="<?php echo $image['image']; ?>">
			</a>
		</div>
	<?php } ?>
	</div>
</div>
