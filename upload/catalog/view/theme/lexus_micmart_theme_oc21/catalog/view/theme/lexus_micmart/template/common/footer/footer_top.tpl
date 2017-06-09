<div class="<?php echo str_replace('_','-',$blockid); ?> <?php echo $blockcls;?>" id="pavo-<?php echo str_replace('_','-',$blockid); ?>">
  <div class="container">
    <div class="inside space-padding-tb-40">
      <div class="row">    

        <div class="col-md-4 col-sm-6 col-xs-12 column">
          <?php if( $content=$helper->getLangConfig('widget_about_us') ) {?>
          <?php echo $content; ?>            
          <?php } ?> 
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 column">
        <?php
          echo $helper->renderModule('pavnewsletter');
        ?>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 column">
          <?php if( $content=$helper->getLangConfig('widget_follow_us') ) {?>
              <?php echo $content; ?>
          <?php } ?> 
        </div>
   
      </div>
    </div>
  </div>
</div>

