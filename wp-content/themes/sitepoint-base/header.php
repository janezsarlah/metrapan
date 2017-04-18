<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="maincontentcontainer">
 *
 * @package Sitepoint Base
 * @since Sitepoint Base 1.0
 */
?><!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta http-equiv="cleartype" content="on">

	<!-- Responsive and mobile friendly stuff -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<!-- typekit: Futura font -->
	<script src="https://use.typekit.net/ekq7wjw.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper" class="hfeed site">

	<div class="visuallyhidden skip-link"><a href="#primary"><?php esc_html_e( 'Skip to main content', 'sitepoint-base' ); ?></a></div>

	<div id="headercontainer">

		<header id="masthead" class="site-header" role="banner">

			<!-- logo -->
			<div class="grid-20 tablet-grid-20 site-title">
				<?php sitepointbase_the_custom_logo() ?>
			</div> <!-- /.grid-40.site-title -->

			<div class="header-right">

				<!-- header links widget -->
				<div class="headerTop">
				<?php if ( is_active_sidebar( 'header-1' ) ) : ?>
					<?php dynamic_sidebar( 'header-1' ); ?>
				<?php endif; ?>
				</div>

				<!-- menu -->
				
				<nav id="site-navigation" class="main-navigation" role="navigation">
					<h3 class="menu-toggle assistive-text"><i class="fa fa-bars" aria-hidden="true"></i></h3>
					<div class="assistive-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'sitepoint-base' ); ?>"><?php esc_html_e( 'Skip to content', 'sitepoint-base-theme' ); ?></a></div>
						<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_class' => 'navigation nav-menu', 'container_class' => 'navigation_container' ) ); ?>
				</nav> <!-- /.site-navigation.main-navigation -->
				

			</div>
		</header> <!-- /#masthead.grid-container.site-header -->

	</div> <!-- /#headercontainer -->

	 <!-- header slider -->
	<?php
	if(get_field("slider_category", get_the_ID()))

    	echo do_shortcode("[header-slider category='".get_field("slider_category", get_the_ID())."']");
	?>

	<?php if ( get_header_image() ) { ?>
		<div id="bannercontainer">
			<div class="banner grid-container">
				<div class="header-image grid-100">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
						<img src="<?php header_image(); ?>" srcset="<?php echo esc_attr( wp_get_attachment_image_srcset( get_custom_header()->attachment_id ) ); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
					</a>
				</div><!-- .header-image.grid-100 -->
			</div> <!-- /.banner.grid-container` -->
		</div> <!-- /#bannercontainer -->
	<?php } ?>
	<?php	do_action( 'sitepointbase_before_woocommerce' ); ?>
