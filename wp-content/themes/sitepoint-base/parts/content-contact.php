<?php 
	
	$contactPE = $value['content_contact_pe'];
	$contactList = $value['content-contact-contacts'];

?>


<div class="contact grid-container">
	<?php if ( $contactPE ) : ?>
		<div class="contact-title"><?php echo $contactPE; ?></div>
	<?php endif; ?>

	<?php if ( $contactList ) : ?>
		<div class="contact-list">
			<?php foreach ( $contactList as $item ) : ?>
				<div class="contact-list-item">
					<div class="contact-sector-title"><?php echo $item['content_contact-sector']; ?></div>
					<div class="contact-sector-text"><?php echo $item['content_contact-contact']; ?></div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>