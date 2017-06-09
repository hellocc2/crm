<div class="banner-txt">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 details no-padding">
			<h2 class="banner-title"><?php echo $title; ?></h2>
			<?php if ($text): ?><div class="banner-desc"><?php echo $text; ?></div><?php endif ?>
			<?php if ($button): ?>
				<a href="<?php echo $href; ?>" class="button"><?php echo $button; ?></a>
			<?php endif ?>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 no-padding">
			<a href="<?php echo $href; ?>" class="banner-txt-image"><img class="img-responsive" src="<?php echo $image; ?>"></a>
		</div>
</div>