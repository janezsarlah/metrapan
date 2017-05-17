<?php

	$args = array(
		'posts_per_page' => 3,
		'post_type' => 'aktualnosti',
		'post_status' => 'publish'
	);
	            
	$aktualnosti = get_posts($args);

?>

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
			<?php if ( count( $aktualnosti ) > 2 ) : ?>
				<div class="archive-container-button">
					<a class="archive-button button1" href="<?php echo get_field('link', get_the_ID()) ?>">Arhiv</a>
				</div>
			<?php endif; ?>
		<?php endif; ?>	
	</div>
</div>

