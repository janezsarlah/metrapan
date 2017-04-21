<?php 
	


	$contactPE = $value['content_contact_pe'];
	$openingTime = $value['opening_time'];
	$contactList = $value['content-contact-contacts'];

	//debug($contactList);
?>


<div class="contact grid-container">
	<?php if ( $contactPE ) : ?>
		<div class="contact-title"><?php echo $contactPE; ?></div>
	<?php endif; ?>

	<?php if ( $openingTime ) : ?>
		<div class="opening-time">
			<?php echo $openingTime; ?>
			<div class="contact-line"></div>	
		</div>
	<?php endif; ?>

	<?php if ( $contactList ) : ?>
		<div class="contact-list">
			<?php foreach ( $contactList as $item ) : ?>
				<div class="contact-sector-title"><?php echo $item['content_contact-sector']; ?></div>
				<div class="contact-list-item">
					<?php $contactsList = $item['content_contact-contact-list']; ?>
					
					<?php if ( $contactsList ) : ?>

						<?php foreach ( $contactsList as $listItem ) : ?>

							<div class="contact-item"><?php echo $listItem['content_contact-contact-list-item']; ?></div>

						<?php endforeach; ?>

					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>