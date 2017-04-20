<div class="">
<ul class="imageGallery" style="vertical-align:bottom !important;">
<?php
	//echo json_encode($value);
	
	$numOfSlides = count( $value["gallery-product"] );

	foreach ($value["gallery-product"] as $key => $image) {
		?>
		<li style="width:100%; padding-top: 20px; vertical-align:middle;" class="imageGallery-container">
			<div class="image-container">
				<img src="<?=$image['sizes']['large']?>">
			</div>	
		</li>
		<?php
		# code...
	}
?>
</ul>
</div>
<script type="text/javascript">

	jQuery(function($){
		var params = {
			infiniteLoop: true,
			pager: false,
			adaptiveHeight: true,
			nextText: '<div class="next"><span></span></div>',
			prevText: '<div class="prev"><span></span></div>'
		};

		if ( <?php echo $numOfSlides; ?> < 2 ) {
			params.infiniteLoop = false;	
			params.controls = false;	
		} 

		var slider = jQuery(".imageGallery").bxSlider(params);
		
	});

</script>