<?php 

function getSecondFilter() {
	$response = '';

    $res = new stdClass();
    $res->error = true;

    if ( !isset($_POST['catSlug']) && !isset($_POST['postType']) ) return;

	$args = [ 
		'post_type' => $_POST['postType'],
        'posts_per_page' => -1,
        'post_status' => 'any',
        'post_parent' => null,
        'kategorijeproduktov' => $_POST['catSlug']
    ];

    $posts = get_posts($args);

    if ( count( $posts ) == 0 ) return;

    $categoryes = [];

    // Get all posts categoryes
    foreach ( $posts as $p ) {
    	$catObjects = get_the_terms($p->ID, 'kategorijeproduktov');

    	if ( $catObjects ) $categoryes = array_merge( $categoryes, $catObjects );
    }

    // Remove if not second filter ( has parent category )
    foreach ( $categoryes as $categoryeKey => $categoryeValue ) {
    	foreach ($categoryeValue as $key => $value) {
    		if ( $key == 'parent' && $value == 0 ) unset( $categoryes[$categoryeKey] );
    	}
    }

    // Remove duplicates
    if ( count($categoryes) > 0 ) {
    	$categoryes = unique_multidim_array( $categoryes );
    	$response = prepareList( $categoryes, $_POST['postType'] );
    }
   

    $res->error = false;
    $res->errorMessage = "Something went wrong!";
    $res->data = new stdClass();

    $res->data->html = $response;

    echo json_encode($res);
    
    wp_die();
}


add_action("wp_ajax_nopriv_getSecondFilter", "getSecondFilter");
add_action("wp_ajax_getSecondFilter", "getSecondFilter");


function my_user_test() {
    
    $btn_value = $_GET["value"];
    $post_type = $_GET["post_type"];
    $html = " "; 
    $htmlSecond = " "; 

    $args = array( 'post_type' => $post_type,
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => isset($btn_value) ? $btn_value : '');

    $posts = get_posts($args);
    $st = 0;
    $html = "<div class='produktlist'><ul>";
    $htmlSecond = "<ul>";
    foreach($posts as $post){
        $text = get_post_field("post_content", $post->ID);
        $title = $post -> post_title;
        $image = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID),"large" )[0];
        $link = $post -> guid;
        
        $html .= "<li>";
        
        $html .= "<div class='produktlist-title'>".$title."</div>";
        $html .= "<a href='".$link."'><div class='produktlist-imagecontainer' style='background-image: url(".$image.");'></div></a>";
        $html .= "<div class='produktlist-text'>".$text."</div>";
        $html .= "<div class='showmore button1 produktlist-btn'><a href='".$link."'>Več</a></div>";
        $html .= "</li>";
    }
    $html .= "</ul></div>";
    $htmlSecond .= "</ul>";
    
    
    $res = new stdClass();
    $res->error = false;
    $res->errorMessage = "Sporocilo napake... Neki";
    $res->data = new stdClass();
    $res->data->html = $html;
    $res->data->btnvalue = $btn_value;
 	$res->data = new stdClass();
    $res->data->html = $html;
    $res->data->btnvalue = $btn_value;
    echo json_encode($res);
    wp_die();

}

add_action("wp_ajax_nopriv_my_user_test", "my_user_test");
add_action("wp_ajax_my_user_test", "my_user_test");


function unique_multidim_array( $array ) { 
    $temp_array = array(); 
    $i = 0; 
    $key_array = array(); 

    foreach ( $array as $arr ) {

        if ( !in_array( $arr->term_id, $key_array ) ) { 
        	$key_array[$i] = $arr->term_id; 
            $temp_array[$i] = $arr; 
        }

    	$i++;
    }

    return $temp_array; 
} 


function prepareList( $array, $postType ) {
	$html = '';
	$html .= '<ul>';


	foreach ($array as $arr) {
        $html .= '<li>' .
             '		<div class="produkticons-iconcontainer" data-posttype="' . $postType . '" data-catslug="' . $arr->slug . '"><img src="' . get_template_directory_uri() . '/img/' . $arr->slug . '.png" class="produkticons-icon">' .
             '		<div class="produkticons-title">' . getCategoryName( $arr->slug ) . '</div></div>' .
             '	</li>' ;
	}


     $html .= '</ul>';

	return $html;
}