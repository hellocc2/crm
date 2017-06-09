<div class="service">
  <?php foreach ($services as $service) { ?>
  <div class="col-xs-4 col-sm-4 col-md-2 margi">
  <div class="icon "><img class="img-responsive center-block" src="<?php echo $service['image']; ?>"></div>
  <div class="info">
   <a href="<?php echo $service['link']; ?>">
   <div class="title"><?php echo $service['title']; ?></div>
  <div class="wenzi"><?php echo $service['text']; ?></div>
   </a>
  </div>
    </div>
  <?php } ?>
</div>
