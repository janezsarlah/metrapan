<div class="imageGallery-container">
<ul class="imageGallery">
<?php
	//echo json_encode($value);
	foreach ($value["gallery"] as $key => $image) {
		?>
		<li><img src="<?=$image['sizes']['large']?>"></li></li>
		<?php
		# code...
	}
?>
</ul>
</div>
<script type="text/javascript">

	jQuery(function($){


		var slides = <?=count($value["gallery"])?>;

		if(slides>3) slides=3;

		if($(window).width()<768) slides=2;

		if($(window).width()<550) slides=1;
		
		var slider = jQuery(".imageGallery").bxSlider({
		  minSlides: slides,
		  maxSlides: slides,
		  slideWidth: jQuery(".imageGallery-container").width()/slides,
		  slideMargin: 5,
	  	  nextText: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
		  prevText: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
		  pager: false
		});

		jQuery(window).resize(function(){
			
			slides = 3;
			if($(window).width()<768) slides=2;

			if($(window).width()<550) slides=1;
			
			console.log(slides);

			slider.reloadSlider({
			  minSlides: slides,
			  maxSlides: slides,
			  slideWidth: jQuery(".imageGallery-container").width()/slides,
			  slideMargin: 5,
		  	  nextText: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
			  prevText: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
			  pager: false
			});
			
		});
	});

	


</script>