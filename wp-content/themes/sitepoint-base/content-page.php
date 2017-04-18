<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Sitepoint Base
 * @since Sitepoint Base 1.0
 */
?>

<?php if(!is_front_page()){ ?>
<div class="<?php if(!is_page(26)){ echo "grid-container"; } ?>">
<?php } ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( !is_front_page() ) { ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php if(!is_page(236)){ if(!is_page(26)){ the_title(); } } ?></h1>
				<?php if ( has_post_thumbnail() && !is_search() && !post_password_required() ) { ?>
					<?php the_post_thumbnail( 'sitepoint_base_theme_post_feature_full_width' ); ?>
				<?php } ?>
			</header>
		<?php } ?>
		<div class="entry-content">

			<?php the_content(); ?>
			<?php wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'sitepoint-base' ),
				'after' => '</div>',
				'link_before' => '<span class="page-numbers">',
				'link_after' => '</span>'
			) ); ?>


			<?php include( get_stylesheet_directory() . '/parts/produkti_content.php'); ?>
            <?php 
            if(is_page(26)){
                include( get_stylesheet_directory() . '/parts/kontakti.php'); 
            }
            ?>
			<?php include( get_stylesheet_directory() . '/parts/content.php'); ?>
            
			

		</div><!-- /.entry-content -->
		<!--
		<footer class="entry-meta">
			<?php edit_post_link( esc_html__( 'Edit', 'sitepoint-base' ) . ' <i class="fa fa-angle-right" aria-hidden="true"></i>', '<div class="edit-link">', '</div>' ); ?>
		</footer><!-- /.entry-meta -->
	</article><!-- /#post -->
<?php if(!is_front_page()){ ?>
</div>
<?php } ?>