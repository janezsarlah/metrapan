<?php 
	
	$tabs = get_field('tabs', get_the_ID());
	$i = 0;
?>

<?php if ( $tabs ) : ?>

	<div class="tabs grid-container">

		<ul class="tabs-titles">
			<?php foreach ( $tabs as $tab ) : ?>
				<?php $i++; ?>
				<li class="tab-link <?php echo $i == 1 ? "current" : ""; ?>" data-tab="tab-<?php echo $i; ?>"><?php echo $tab['tabs_title']; ?></li>
			<?php endforeach; ?>
		</ul>

		<?php $i = 0; ?>

		<?php foreach ( $tabs as $tab ) : ?>
			<?php $i++; ?>
			<div id="tab-<?php echo $i; ?>" class="tab-content <?php echo $i == 1 ? "current" : ""; ?>">
				<?php if ( $tab['tabs_contacts'] ) : ?>
					<div class="tab-col left">
						<div class="tab-title"><?php echo $tab['tab_subtitle']; ?></div>
						<div class="col"><?php echo $tab['tabls_location']; ?></div>
						<div class="col"><?php echo $tab['tabls_precontacts']; ?></div>
						<?php if ( $tab['tabls_location'] !== "" && $tab['tabls_precontacts'] !== "" ) : ?>
							
						<?php endif; ?>
						<div class="clearfix"></div>

						<?php foreach ( $tab['tabs_contacts'] as $t ) : ?>
							<hr>

							<div class="sector-title"><?php echo $t['tabs_contacts_list_title']; ?></div>
							<?php if ( $t['tabls_contacts_list'] ) : ?>
								<div class="sector-contact-list">
									<?php foreach ( $t['tabls_contacts_list'] as $c ) : ?>
										<div class="sector-contact"><?php echo $c['tabls_contacts_item']; ?></div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>			
						<?php endforeach; ?>
					</div>
					<div class="tab-col right">
						<?php if ( $tab['tab_map'][0]['tab_image'] ) : ?>
							<img src="<?php echo wp_get_attachment_image_src( $tab['tab_map'][0]['tab_image'], 'large' )[0]; ?>">
						<?php endif; ?>
						<script type="text/javascript">
							var map_position<?php echo $i; ?>;
						</script>
						<?php if ( $tab['tab_map'] ) : ?>
							<?php 
								$latitude = $tab['tab_map'][0]['tab_map_latitude']; 
								$longitude = $tab['tab_map'][0]['tab_map_longitude']; 
							?>
							<?php if ( $latitude > 0 && $latitude != null && $longitude > 0 && $longitude != null ) : ?>
								<script type="text/javascript">
									map_position<?php echo $i; ?> = {lat: <?php echo $latitude; ?>, lng: <?php echo $longitude; ?>};
								</script>
								<div id="map<?php echo $i; ?>"></div>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>

	</div> 

<?php endif; ?>

<script type="text/javascript">
	(function($) {
		
		$('ul.tabs-titles li').on('click', function(){
			// Connection to Google maps

			var tab_id = $(this).attr('data-tab');

			getLocations($(this).index());

			$('ul.tabs-titles li').removeClass('current');
			$('.tab-content').removeClass('current');

			$(this).addClass('current');
			$("#"+tab_id).addClass('current');
		});

		function getLocations(index) {
			var pageId="<?php echo get_the_ID(); ?>";
	    	 jQuery.ajax({
				url: ajax.ajax_url,
				type: 'post',
				dataType: 'json',
				data: {
					action: 'locations',
					post_id: pageId
				},
				success: function(locations) {
					console.log(locations);
		
					jQuery(".contact-window").html("<h3><?php pll_e('Kontakt');?></h3>"+locations[index - 1]["description"]+"");
					
				},
				error: function(errorThrown){
				      console.log(errorThrown);	
				} 
			});
    	}


		

	})(jQuery)
</script>