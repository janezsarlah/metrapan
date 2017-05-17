
<?php
$max_aktualnosti = 4;
$col = 0;
?>
<div class="aktualnost" style="background-image: url('http://meltal.oss-dev.av-studio.si/metrapan/wp-content/uploads/2017/04/bgaktualno.jpg')">
<div class="grid-container">
<div class="line"></div>
<div class="aktualnost-maintitle">Aktualno</div>
</div>
	<div class="aktualnost-content grid-container">
		
		<ul>
			<?php
			foreach ($value["aktualnosti"] as $key => $aktualnost){
			
			if($col < $max_aktualnosti){
				$title = $aktualnost -> post_title;
				$link = $aktualnost -> guid;
				$text = get_post_field('post_content', $aktualnost->ID);
                $datum = get_the_date("d.m.Y", $aktualnost->ID);
			?>
			
			<li class="topicality-list-item">
                    <div class="aktualnost-datum"><?php echo $datum; ?></div>
					<div class="aktualnost-title"><?php echo $title; ?></div>
					
					<hr class="redline">
					<div class="aktualnost-container">
						
						<div class="aktualnost-text"><?php echo $text; ?></div>
                        <div class="showMore button1 aktualnost-btn"><a href="<?php echo $link;?>">Pokaži več</a></div>
					</div>
				
			</li>
			
			<?php
			$col = $col + 1;
			}
			}
			?>
		</ul>
        <div class="aktualnost-vec"><a href="http://meltal.oss-dev.av-studio.si/metrapan/si/aktualno/">Vsa obvestila ></a></div>
	</div>
</div>
