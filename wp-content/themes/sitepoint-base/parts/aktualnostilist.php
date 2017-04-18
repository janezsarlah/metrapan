
<?php
$max_aktualnosti = 100;
$col = 0;
?>
<div class="aktualnostlist" style="">
<div class="grid-container">
<div class="line"></div>
<div class="aktualnostlist-maintitle"></div>
</div>
	<div class="aktualnostlist-content grid-container">
		
		<ul>
			<?php
            $args = array(
            'post_type' => 'aktualnosti'
            );
            $aktualnosti = get_posts($args);
            
			foreach ($aktualnosti as $key => $aktualnost){
			
			if($col < $max_aktualnosti){
				$title = $aktualnost -> post_title;
				$link = $aktualnost -> guid;
				$text = get_post_field('post_content', $aktualnost->ID);
                $datum = get_the_date("d.m.Y", $aktualnost->ID);
			?>
			
			<li>
                    <div class="aktualnostlist-datum"><?php echo $datum; ?></div>
					<div class="aktualnostlist-title"><?php echo $title; ?></div>
					
					<hr class="redline">
					<div class="aktualnostlist-container">
						
						<div class="aktualnostlist-text"><?php echo $text; ?></div>
                        <!--div class="showMore button1 aktualnost-btn"><a href="<?php //echo $link;?>">Pokaži več</a></div-->
					</div>
				<hr>
			</li>
			
			<?php
			$col = $col + 1;
			}
			}
			?>
		</ul>
	</div>
</div>
