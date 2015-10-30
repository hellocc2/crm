<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
	 // $swap_icon     = 'fa fa-chevron-left';
	  $content_style = '';
	  if( $menu_status == 'close' ){
	  $class_menu    = 'hide-sidebar'; 
	//  $swap_icon     = 'fa fa-chevron-right';
	  $content_style = 'margin-left:0;';
	  }
?>

	<section  class="content_wrap blog_content_wrap" style=" <?php echo $content_style;?>">
     <?php get_template_part( 'blog', 'header' ); ?>
      <div class="posts-container">
    <div class="breadcrumb-box">
            <?php onepagescroll_breadcrumb_trail(array("before"=>"","show_browse"=>false));?>
        </div>
        
	<div id="primary" class="content-area">
    
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'onepagescroll' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'onepagescroll' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'onepagescroll' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'onepagescroll' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'onepagescroll' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'onepagescroll' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'onepagescroll' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'onepagescroll' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'onepagescroll' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'onepagescroll' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'onepagescroll' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'onepagescroll' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'onepagescroll' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'onepagescroll' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'onepagescroll' );

						else :
							_e( 'Archives', 'onepagescroll' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php onepagescroll_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
</main></div>
		</div><!-- #main -->
	</section><!-- #primary -->
<?php get_sidebar("blog");?>
<?php get_footer(); ?>
