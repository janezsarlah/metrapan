
<?php
$max_cars = 100;
if(is_front_page()) $max_cars=8;
?>
<div class="grid-container carListing">
	<?php
	if($value["title"]!=""){
	?>
	<div class="line"></div>
	<h1><?=$value["title"]?></h1>
	<?php
	}
	?>
	<ul>
	<?php
	foreach ($value["featured_cars"] as $key => $car) {
		if($key<$max_cars)
		{
			$image = wp_get_attachment_image_src(get_post_thumbnail_id( $car->ID),"large" )[0];
			$title = $car->post_title;
			$link = $car->guid;
			$status = get_field("car_new_status", $car->ID);
			if($status[0]=="new") $status = "<div class='carListing-badge'>NOVO</div>";
			 
			?>
			<li>
				<a href="<?=$link?>">
					<div class="carListing-container" style="background-image:url(<?=$image?>);">
						<?=$status?>
						<div class="carListing-title"><?=$title?></div>
						<div class="carListing-overlay"></div>
					</div>
				</a>
			</li>
			<?php
		}
	}

	?>
	</ul>
	<?php if(is_front_page()){ ?>
	<div class="showMore button1"><a href="<?=get_post_type_archive_link('cars');?>"><?php pll_e("Pokaži več");?></a></div>
	<?php } ?>
</div>
