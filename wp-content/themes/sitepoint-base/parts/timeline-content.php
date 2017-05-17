<?php 

	$milestones = $value['timeline_content_item'];

	// Sort based on date
	/*usort($milestones, function($a, $b) {
	    return $a['timeline_content_item-date'] - $b['timeline_content_item-date'];
	});*/

	//debug($milestones);

?>


<div class="timeline">

	<?php if ( $milestones != null && count($milestones) > 0 ) : ?>
		<?php foreach ( $milestones as $milestone ) : ?>

			<?php 
				$image = $milestone['timeline_content_item_image'] > 0 ? wp_get_attachment_image_src( $milestone['timeline_content_item_image'], 'large' )[0] : get_template_directory_uri() . '/img/blank.png';
				$title = $milestone['timeline_content_item-title'];
				$text = $milestone['timeline_content_item-content']; 
				$date = date( 'Y', strtotime( $milestone['timeline_content_item-date'] ) );
			?>

			<div class="timeline-block">
				<div class="timeline-milestone animated"></div>
				<div class="timeline-content animated">
					<img src="<?php echo $image; ?>">
					<div class="timeline-title"><?php echo $title; ?></div>
					<div class="timeline-text"><?php echo $text; ?></div>
					<div class="timeline-date"><?php echo substr( $milestone['timeline_content_item-date'], strlen($milestone['timeline_content_item-date']) - 4, strlen($milestone['timeline_content_item-date']) ); ?></div>
				</div>
			</div>

			<div class="timeline-line">
				
			</div>

		<?php endforeach; ?>
	<?php endif; ?>

</div>

<script type="text/javascript">
	
	jQuery(document).ready(function($){
		var timelineBlocks = $('.timeline-block'),
			offset = 0.8;

		//hide timeline blocks which are outside the viewport
		hideBlocks(timelineBlocks, offset);

		//on scolling, show/animate timeline blocks when enter the viewport
		$(window).on('scroll', function(){
			console.log(window.requestAnimationFrame);
			(!window.requestAnimationFrame) 
				? setTimeout(function(){ showBlocks(timelineBlocks, offset); }, 100)
				: window.requestAnimationFrame(function(){ showBlocks(timelineBlocks, offset); });
		});

		function hideBlocks(blocks, offset) {
			blocks.each(function(){
				( $(this).offset().top > $(window).scrollTop()+$(window).height()*offset ) && $(this).find('.timeline-milestone, .timeline-content').addClass('is-hidden');
			});
		}

		function showBlocks(blocks, offset) {
			blocks.each(function(){
				( $(this).offset().top <= $(window).scrollTop()+$(window).height()*offset && $(this).find('.timeline-milestone').hasClass('is-hidden') ) && $(this).find('.timeline-milestone, .timeline-content').removeClass('is-hidden').addClass('bounceIn');
			});
		}
	});

</script>