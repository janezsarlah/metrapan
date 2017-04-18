
<?php
$max_prednosti = 100;
if(is_front_page()) $max_prednosti=4;
?>
<div class="grid-container prednost" style="<?php if(is_page(236)){ echo "margin-top:100px;"; } ?>">
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
	foreach ($value["prednosti"] as $key => $prednost) {
			$icon = get_field("icon", $prednost->ID);
			$title = $prednost->post_title;
			$link = $prednost->guid;
			$text = get_post_field('post_content', $prednost->ID);
			 
			?>
			<li>
				
					<div class="prednost-container" style="background-color:white;">
						<div class="prednost-icon"><img class="prednost-icon" src="<?php echo $icon[url]; ?>"></div>
						<div class="prednost-title"><?php echo $title; ?></div>
						<div class="prednost-text"><?php echo $text; ?></div>
					</div>
				
			</li>
			<?php
	}

	?>
	</ul>
</div>
