<?php
/*
 * Template Name: Deals page
 * Description: Template for deals page
*/

$args = [
	'posts_per_page' => -1,
	'post_type' => 'akcije',
];
	            
$aktualnosti = get_posts($args);

?>

<?php get_header(); ?> 

<?php if ( count( $aktualnosti ) > 0 && $aktualnosti != null ) : ?>	

	<?php 
		$dealBanner = get_the_post_thumbnail_url( $aktualnosti[0]->ID, 'full' );
		$dealTitle = get_the_title( $aktualnosti[0]->ID );
		$dealText = get_post_field( 'post_content', $aktualnosti[0]->ID );
	?>

	<div class="main-deal">
		<div class="deal-banner"><img src="<?php echo $dealBanner; ?>"></div>
		<div class="grid-container">
			<div class="title"><?php echo $dealTitle; ?></div>
			<div class="text"><?php echo $dealText; ?></div>
		</div>
		<div class="seperator"></div>	
	</div>

<?php endif; ?>

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

	<div class="entry-content">
		<div class="aktualnostlist">

			<div class="aktualnostlist-content">
				<?php if ( count( $aktualnosti ) > 0 && $aktualnosti != null ) : ?>	
					<ul class="topicality-list">
						<?php $first = true; ?>
						<?php foreach ( $aktualnosti as $aktualnost ) : ?>
							<?php if ( !$first ) : ?>
					            <?php
									$title = $aktualnost->post_title;
									$link = $aktualnost->guid;

									$text = get_post_field( 'text', $aktualnost->ID );
			
									$text = strlen($text) < 220 ? $text : substr($text, 0, 220);
					                $date = get_the_date( 'd.m.Y', $aktualnost->ID );
								?>
								
								<li class="topicality-list-item">
				         
									<div class="aktualnostlist-title"><?php echo $title; ?></div>
									<div class="aktualnostlist-title-seperator"></div>
									<div class="aktualnostlist-container">
										<div class="aktualnostlist-text"><?php echo $text; ?></div>
				                        <div class="showMore button1 aktualnost-btn"><a href="<?php echo $link;?>">Pokaži več</a></div>
									</div>
									<div class="aktualnostlist-entry-seperator"></div>
								</li>
							<?php else : ?>
								<?php $first = false; ?>
							<?php endif; ?>
							
						<?php endforeach; ?>	
					</ul>
				<?php endif; ?>	
			</div>
		</div>
	</div>
	</article>
</div>

<?php get_footer(); ?>

