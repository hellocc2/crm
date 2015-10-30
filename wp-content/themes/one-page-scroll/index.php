<?php
/**
 * Front page template for theme
 */

get_header();
?>
  <?php
      
      $menu_status_desktop  = esc_attr( of_get_option( 'menu_status_desktop','open'));
	  $menu_status_tablet   = esc_attr( of_get_option( 'menu_status_tablet','close'));
	  $menu_status_mobile   = esc_attr( of_get_option( 'menu_status_mobile','close'));
	  
	   $menu_status  = $menu_status_desktop;
	   $detect       = new Mobile_Detect;
	  if( $detect->isTablet() ){
		 $menu_status = $menu_status_tablet;
	   }
	  if( $detect->isMobile() && !$detect->isTablet() ){
		 $menu_status = $menu_status_mobile;
	  }
	  $class_menu    = '';
	  $content_style = '';
	  if( $menu_status == 'close' ){
	  $class_menu    = 'hide-sidebar'; 
	  $content_style = 'margin-left:0;';
	  }
?>
<div class="main_wrap">

  
  <section class="content_wrap blog_content_wrap"  style=" <?php echo $content_style;?>">
    <?php if ( get_header_image() ): ?>
  	<section class="header-image">
		<img src="<?php echo( get_header_image() ); ?>" alt="<?php echo get_bloginfo( 'title', 'display' ); ?>" />
	</section>
	<?php endif; ?>
    <?php get_template_part( 'blog', 'header' ); ?>
    
    <div class="posts-container">
    
      <div class="breadcrumb-box">
            <?php onepagescroll_breadcrumb_trail(array("before"=>"","show_browse"=>false));?>
        </div>
        
		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>

			<?php endwhile; ?>

			<?php onepagescroll_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
        </div>
  </section>
  <!--- content_wrap ends -->
   <?php get_sidebar("blog");?>
    
  <!--- sidebar ends -->
</div>
<?php
get_footer();