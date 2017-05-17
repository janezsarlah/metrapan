<?php 



?>


<div class="newsBox" style="background-image:url(<?=wp_get_attachment_image_src( $value["newslblock_image"], 'large' )[0];?>)">
	<div class="newsBox-content grid-container">
		<div class="line"></div>
		<div class="newsBox-title">
			
			<?=$value["newslblock_title"];?>
		</div>
		<div class="newsBox-form">
			<?=do_shortcode($value["newslblock_form"]);?>
		</div>
	</div>
	
	<div class="newsBox-overlay"></div>
</div>