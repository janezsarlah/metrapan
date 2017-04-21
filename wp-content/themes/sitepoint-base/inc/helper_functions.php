<?php 

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Displays data in raw format
 *
 * @param Data to be displayed
 */
function debug( $data = null ) {
    if( $data ) {
        echo '<pre>';
        print_r( $data );
        echo '</pre>';
    }
}

/**
 * Get the post categoryes
 *
 * @param Array of arguments
 * @return Array of categoryes
 */
function getPostCategorys( $args ) {
	$posts = get_posts( $args );
	$arrayOfCats = [];

	if ( count($posts) == 0 ) return $arrayOfCats;
	
	foreach ($posts as $post) {
    	$categoryes = get_the_terms($post->ID, 'kategorijeproduktov');

    	if ( $categoryes != null ) {
    		foreach ($categoryes as $cat) {
				if (!in_array( $cat->slug, $arrayOfCats) && $cat->parent == 0 ) array_push( $arrayOfCats, $cat->slug );	
    		}
    	}
	} 
		
	return $arrayOfCats;
}

/**
 * Get category object
 *
 * @param Category slug
 * @return Category object
 */
function getCategoryName( $catSlug ) {
	return get_term_by('slug',  $catSlug, 'kategorijeproduktov')->name;
}

/**
 * Get the number of associated posts
 *
 * @param Category slug
 * @return INT number of associated posts
 */
function getNumbAssociatedposts( $catSlug ) {
	return get_term_by('slug',  $catSlug, 'kategorijeproduktov')->count;
}

/**
 * Get the number of products by specific category
 *
 * @param Post type
 * @param Category slug
 * @return False if more than one post and post if one post
 */
function getNumberOfProductsByCat( $postType, $catSlug ) {
	$posts = get_posts([
		'post_type' => $postType,
        'posts_per_page' => 500,
    	'post_status' => 'any',
        'post_parent' => null,
        'kategorijeproduktov' => $catSlug
	]);

	if ( getNumbAssociatedposts( $catSlug ) > 1 ) return false;

	return $posts[0];
}