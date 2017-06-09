<div class="<?php echo str_replace('_','-',$blockid); ?> <?php echo $blockcls;?>" id="pavo-<?php echo str_replace('_','-',$blockid); ?>">
  <div class="container">
    <div class="inside space-padding-tb-40">
      <div class="row">    
        <div class="col-md-12 col-sm-12 col-xs-12 column text-center">
          <?php if( $content=$helper->getLangConfig('widget_papal') ) {?>
              <?php echo $content; ?>
          <?php } ?> 
        </div>
   
      </div>
    </div>
  </div>
</div>

