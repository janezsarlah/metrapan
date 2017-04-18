<?php
    if (is_front_page()){
        echo "<div class='emptybox'></div>";
    }
?>
<div class="grid-container boxes">
	<ul>
	<?php
	foreach ($value["boxes"] as $key => $box) {
			$image = wp_get_attachment_image_src(get_post_thumbnail_id( $box->ID),"large" )[0];
			$title = $box->post_title;
			$link = get_field("link", $box->ID);
			?>
			
			<li>
				<a href="<?=$link?>">
					<div class="boxes-container" style="background-image:url(<?=$image?>);">
						<?=$status?>
                        <div class="boxes-yline"></div>
						<div class="boxes-title"><?=$title?></div>
						<div class="boxes-overlay"></div>
					</div>
				</a>
			</li>
			<?php
	}

	?>
	</ul>
</div>
