<?php
/**
 * The template for displaying all single posts.
 *
 * @package onepagescroll
 */

get_header(); ?>
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
	  $class_menu    = 'hide-sidebar'; ;
	  $content_style = 'margin-left:0;';
	  }
?>

  <!--- sidebar ends -->
  <section class="content_wrap blog_content_wrap" style=" <?php echo $content_style;?>">
  <?php get_template_part( 'blog', 'header' ); ?>
    <div class="posts-container">
      <div class="breadcrumb-box">
            <?php onepagescroll_breadcrumb_trail(array("before"=>"","show_browse"=>false));?>
        </div>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php onepagescroll_post_nav(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
</section>

<?php get_sidebar("blog");?>
<?php get_footer(); ?>