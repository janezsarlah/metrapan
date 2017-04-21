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
			<div id="tab-<?php echo $i; ?>" class="tab-content current">
				<?php if ( $tab['tabs_contacts'] ) : ?>

					<div class="col"><?php echo $tab['tabls_location']; ?></div>
					<div class="col"><?php echo $tab['tabls_precontacts']; ?></div>
					<div class="clearfix"></div>
					
					<?php foreach ( $tab['tabs_contacts'] as $t ) : ?>
						<div class="sector-title"><?php echo $t['tabs_contacts_list_title']; ?></div>
						<?php if ( $t['tabls_contacts_list'] ) : ?>
							<div class="sector-contact-list">
								<?php foreach ( $t['tabls_contacts_list'] as $c ) : ?>
									<div class="sector-contact"><?php echo $c['tabls_contacts_item']; ?></div>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>			
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		<?php endforeach; ?>

	</div> 

<?php endif; ?>

<script type="text/javascript">
	(function($) {
		
		$('ul.tabs-titles li').click(function(){
			var tab_id = $(this).attr('data-tab');

			$('ul.tabs-titles li').removeClass('current');
			$('.tab-content').removeClass('current');

			$(this).addClass('current');
			$("#"+tab_id).addClass('current');
		});

	})(jQuery)
</script>