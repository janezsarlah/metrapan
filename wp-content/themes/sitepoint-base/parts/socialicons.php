
<div class="socialIcons">
	<ul>
		<?php
		foreach ($value["icon_item"] as $key => $icon) {
			?>
			<li><a target="_blank" href="<?=$icon["link"]?>"><i class="fa <?=$icon["icon"]?>" aria-hidden="true"></i></a></li>
			<?php
		}
		?>
	</ul>
</div>