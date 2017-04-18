<?php

/**
 * Main Editor_Messages Class.
 */
class Editor_Messages {

	/**
	 * Messages
	 */
	public $array_messages = array(
		'messages' => array(
			'message_1' => array(
				'text' => 'Our WooCommerce integration add-on is almost ready for realese. Price growths with every update. <strong>Buy it today to save 30%!</strong>',
				'link' => 'https://livecomposerplugin.com/downloads/woocommerce-page-builder/?utm_source=editing-sreen&utm_medium=editor-messages&utm_campaign=woo-integration',
				'icon' => 'dslc-icon-shopping-cart',
				'color' => '',
			),
			'message_2' => array(
				'text' => 'Extend the page builder with our official extensions bundle. Save $10 with <strong>10USDOFF</strong> coupon.',
				'link' => 'https://livecomposerplugin.com/downloads/bundle-buy-all-extensions/?utm_source=editing-sreen&utm_medium=editor-messages&utm_campaign=all-extensions',
				'icon' => 'dslc-icon-cubes',
				'color' => '',
			),
			'message_3' => array(
				'text' => 'Live Composer developers recommend WP Engine for their best-in-class architecture to keep WordPress fast and secure.',
				'link' => 'http://www.shareasale.com/r.cfm?B=779590&U=871461&M=41388&urllink=',
				'icon' => 'dslc-icon-codepen ',
				'color' => '',
			),
			'message_4' => array(
				'text' => 'Do you need high-quality website content fast? Get $20 free joining bonus at Contentmart.com USE CODE: <strong>JOIN20</strong>',
				'link' => 'http://www.shareasale.com/r.cfm?B=965751&U=871461&M=65777&urllink=',
				'icon' => 'dslc-icon-pencil',
				'color' => '',
			),
			'message_5' => array(
				'text' => 'LinkFool! We build natural links, each month, to help our customers grow their SEO rankings without fear of being banned by the search engines.',
				'link' => 'http://www.shareasale.com/r.cfm?B=381388&U=871461&M=35654&urllink=',
				'icon' => 'dslc-icon-link',
				'color' => '',
			),
		),
		'can_hide' => 0,
	);

	/**
	 * Display the editor messages
	 */
	public function dslc_print_editor_messages() {
	?>
	    <div class="dslca_editor_messages_section">
	    	<a href="#" class="dslca_editor_messages_title"><?php echo __( 'Live Composer Updates', 'live-composer-page-builder' ); ?></a>
	    	<a href="#" class="dslca_editor_messages_hide"><span class="dslc-icon dslc-icon-remove"></span><?php echo __( 'Hide this Line', 'live-composer-page-builder' ); ?></a>
	    	<ul id="editor_messages">
	    		<?php

	    		if ( false === get_option( 'dslc_editor_messages' ) ) {

	    			$dslc_messages = $this->array_messages;
	    			add_option( 'dslc_editor_messages', $dslc_messages );
	    		}

	    		$array = get_option( 'dslc_editor_messages' );

	    		foreach ( $array as $key => $messages ) {
	    			if ( 'can_hide' !== $key ) {
	    				foreach ( $messages as $message ) { ?>
	    				<li>
	    					<span class="dslc-icon <?php echo $message['icon']; ?>"></span><?php echo $message['text']; ?><a href="<?php echo $message['link']; ?>" target="_blank"></a>
	    				</li>
	    			<?php }
	    			}
	    		}
	    		?>
	    	</ul>
	    </div>
	<?php
	}
}
