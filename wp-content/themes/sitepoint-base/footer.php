<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id #maincontentcontainer div and all content after.
 * There are also four footer widgets displayed. These will be displayed from
 * one to four columns, depending on how many widgets are active.
 *
 * @package Sitepoint Base
 * @since Sitepoint Base 1.0
 */
?>
	
	<?php

	//echo json_encode(get_field("firstpage_content"));
	$content = get_field("footer", get_option( 'page_on_front' ));
	
	foreach ($content as $key => $value) {
		
		switch($value["acf_fc_layout"]){
			case "news_box": 
				include( get_stylesheet_directory() . '/parts/newsbox.php');
				break;
			
		}
	}


	?>
	

	<?php	do_action( 'sitepointbase_after_woocommerce' ); ?>
	<div id="footercontainer" class="grid-container">

		<div class="grid-50 tablet-grid-50">
		<?php 
		foreach ($content as $key => $value) {
			
			switch($value["acf_fc_layout"]){
				case "social_icons": 
					include( get_stylesheet_directory() . '/parts/socialicons.php');;
					break;
				case "text": 
					include( get_stylesheet_directory() . '/parts/text.php');;		
					break;
			}
		}

		?>
		
		</div>
		<div class="grid-50 tablet-grid-50">
		
		<?php sitepointbase_the_custom_logo() ?>
		</div>

		<!--<?php get_sidebar( 'footer' ); ?>-->

		<!--
		<div class="grid-container smallprint">
			<div class="grid-100">
				<?php echo sitepointbase_get_credits() ?>
			</div> <!-- /.grid-100 -->
	<!--</div> <!-- /.grid-container.smallprint -->

	</div> <!-- /.footercontainer -->

</div> <!-- /.#wrapper.hfeed.site -->

<?php wp_footer(); ?>
</body>

</html>
