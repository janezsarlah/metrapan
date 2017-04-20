<?php
/**
 * Plugin Name: Header Slider
 * Plugin URI: http://av-studio.si/
 * Description: This plugin adds awesome feel slides.
 * Version: 1.0.0
 * Author: AV Studio
 * Author URI: http://av-studio.si/
 * License: GPL2
 */

function hs_init() {
    $args = array(
        'public' => true,
        'label' => 'Slider images',
        'menu_icon' => 'dashicons-images-alt',
        'supports' => array(
            'title',
            'editor',
            'thumbnail',
            'excerpt'
        ),
        'taxonomies' => array('category')
    );
    register_post_type('hs_images', $args);


    add_shortcode('header-slider', 'hs_function');
}
add_action('init', 'hs_init');



function hs_register_scripts() {
    if (!is_admin()) {
        // register
        wp_register_script('hs-script', plugins_url('js/script.js', __FILE__), array( 'jquery' ));
        wp_register_script('hs-bx-script', plugins_url('js/modules/jquery.bxslider.js', __FILE__), array( 'jquery' ));
        // enqueue
        wp_enqueue_script('hs-script');
        wp_enqueue_script('hs-bx-script');
    }
}
 
function hs_register_styles() {
    // register
    //wp_register_style('hs_bx_styles', plugins_url('css/jquery.bxslider.css', __FILE__));
    wp_register_style('hs_styles', plugins_url('css/slider.css', __FILE__));

    // enqueue
    wp_enqueue_style('hs_styles');
    //wp_enqueue_style('hs_bx_styles');

}


add_action('wp_print_scripts', 'hs_register_scripts');
add_action('wp_print_styles', 'hs_register_styles');



function hs_function($atts = []) {
	$atts = array_change_key_case((array)$atts, CASE_LOWER);

	

    $args = array(
        'post_type' => 'hs_images',
        'posts_per_page' => 5,
        'category_id' => $atts['category'],
        'suppress_filters' => false

    );

    $result = '<ul class="header-slider">';
 
    //the loop
    $loop = new WP_Query($args);
    while ($loop->have_posts()) {
        $loop->the_post();
 		$result .= '<li>';
        $the_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $type);
        $result .='<div class="image" style="background-image:url('.$the_url[0].')">';
	    $result .='<div class="grid-container">';
        $result .='<div class="slide-content">';
        $result .='		<div class="title text"><div class="line"></div>'.wpautop(get_the_content()).'</div>';
	    $result .='     <div class="text1"><p>'.get_field("content", $post->ID).'</p></div>';
        $result .='     <div class="text"><a class="cta" href="'.get_field("slider_link", $post->ID).'">'.get_field("slider_link_name", $post->ID).'</a></div>';
        $result .='	</div>';
        $result .='</div>';
	    $result .='</div>';
        $result .= '</li>';

    }

    
    $result .= '</ul>';
    $result .= '';

    return $result;
}



?>