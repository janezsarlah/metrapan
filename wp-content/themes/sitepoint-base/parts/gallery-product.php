<div class="">
<ul class="imageGallery" style="vertical-align:bottom !important;">
<?php
	//echo json_encode($value);
	foreach ($value["gallery-product"] as $key => $image) {
		?>
		<li style="width:100%; padding-top: 20px; vertical-align:middle;" class="imageGallery-container"><img src="<?=$image['sizes']['large']?>"></li>
		<?php
		# code...
	}
?>
</ul>
</div>
<script type="text/javascript">

	jQuery(function($){


		var slides = 1;

		if(slides>3) slides=1;

		if($(window).width()<768) slides=1;

		if($(window).width()<550) slides=1;
		
		var slider = jQuery(".imageGallery").bxSlider({
		  minSlides: 1,
		  maxSlides: 1,
		  slideWidth: jQuery(".imageGallery-container").width(),
		  slideMargin: 5,
	  	  nextText: '<i style="background-color: rgba(0,0,0, 0.4);" class="fa fa-chevron-right" aria-hidden="true"></i>',
		  prevText: '<i style="background-color: rgba(0,0,0, 0.4);" class="fa fa-chevron-left" aria-hidden="true"></i>',
		  pager: false,
		});

		jQuery(window).resize(function(){
			
			slides = 1;
			if($(window).width()<768) slides=1;

			if($(window).width()<550) slides=1;
			
			console.log(slides);

			slider.reloadSlider({
			  minSlides: 1,
			  maxSlides: 1,
			  slideWidth: jQuery(".imageGallery-container").width(),
			  slideMargin: 5,
		  	  nextText: '<i class="fa fa-chevron-right" aria-hidden="true"></i>',
			  prevText: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
			  pager: false
			});
			
		});
	});

	


</script>