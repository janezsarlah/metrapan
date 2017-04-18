
<div class="newsBox" style="background-image:url(<?=$value["image"];?>)">
	<div class="newsBox-content grid-container">
		<div class="line"></div>
		<div class="newsBox-title">
			
			<?=$value["title"];?>
		</div>
		<div class="newsBox-form">
			<?=do_shortcode($value["form"]);?>
		</div>
	</div>
	
	<div class="newsBox-overlay"></div>
</div>