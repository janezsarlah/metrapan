<?php 
/*
 * Template Name: Archive page
 * Description: Template for archive page
*/

	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'aktualnosti',
		'post_status' => 'publish'
	);
	            
	$aktualnosti = get_posts($args);

?>

<?php get_header(); ?> 
<div class="grid-container">

<article class="page type-page status-publish hentry">
	


	<header class="entry-header">
		<?php if ( is_single() ) { ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php }
		else { ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
		<?php } // is_single() ?>

		
	</header> <!-- /.entry-header -->

	<div class="aktualnostlist">

		<div class="aktualnostlist-content">
			<?php if ( count( $aktualnosti ) > 0 && $aktualnosti != null ) : ?>	
				<ul class="topicality-list">
					<?php foreach ( $aktualnosti as $aktualnost ) : ?>

			            <?php
							$title = $aktualnost->post_title;
							$link = $aktualnost->guid;
							$text = get_post_field( 'post_content', $aktualnost->ID );
			                $date = get_the_date( 'd.m.Y', $aktualnost->ID );
						?>
						
						<li class="topicality-list-item">
		                    <div class="aktualnostlist-datum"><?php echo $date; ?></div>
							<div class="aktualnostlist-title"><?php echo $title; ?></div>
							<div class="aktualnostlist-title-seperator"></div>
							<div class="aktualnostlist-container">
								<div class="aktualnostlist-text"><?php echo strlen( $text ) > 150 ? substr( $text, 0, 150) . '...' : $text; ?></div>
		                        <div class="showMore button1 aktualnost-btn"><a href="<?php echo $link;?>">Pokaži več</a></div>
							</div>
							<div class="aktualnostlist-entry-seperator"></div>
						</li>
							
					<?php endforeach; ?>	
				</ul>
			<?php endif; ?>	
		</div>
	</div>

</article>
</div>
<?php get_footer(); ?>
