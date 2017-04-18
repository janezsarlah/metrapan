<?php 
/** 
 * Plugin Name: Ajax Products
 * Description: This is a plugin that allows us to print objects with ajax
 * Version: 1.0.0
 * Author: Jan Centrih
 * License: GPL2
 */

add_action("wp_ajax_nopriv_my_user_test", "my_user_test");
add_action("wp_ajax_my_user_test", "my_user_test");

function my_user_test() {
    
    $btn_value = $_GET["value"];
    $post_type = $_GET["post_type"];
    $html = " "; 

    $args = array( 'post_type' => $post_type,
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => isset($btn_value) ? $btn_value : '');

    /*if ($btn_value == 11)
    {
        $args = array( 'post_type' => 'products',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'plocevinaste');
    }
    
    if ($btn_value == 12)
    {
        $args = array( 'post_type' => 'products',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'posip');
    }
    
    if ($btn_value == 13)
    {
        $args = array( 'post_type' => 'products',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'ravne');
    }
    
    if ($btn_value == 14)
    {
        $args = array( 'post_type' => 'products',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'polikarbonatne');
    }
    
    if ($btn_value == 15)
    {
        $args = array( 'post_type' => 'products',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'fasadni');
    }
    
    if ($btn_value == 2)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null);
    }
    if ($btn_value == 21)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'zlebovi');
    }
    if ($btn_value == 22)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'kljuke');
    }
    if ($btn_value == 23)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'kotlicki');
    }
    if ($btn_value == 24)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'zakljucki');
    }
    if ($btn_value == 25)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'vogalniki');
    }
    
    if ($btn_value == 31)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'odtocne');
    }
    if ($btn_value == 32)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'objemke');
    }
    if ($btn_value == 33)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'kolena');
    }
    if ($btn_value == 34)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'izogibi');
    }
    if ($btn_value == 35)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'lovilcivode');
    }
    
    if ($btn_value == 41)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'obrobe');
    }
    if ($btn_value == 42)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'snegolovi');
    }
    if ($btn_value == 43)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'lovilcinecistoce');
    }
    if ($btn_value == 44)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'pred_pticami');
    }
    if ($btn_value == 45)
    {
        $args = array( 'post_type' => 'products2',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null,
                    'kategorijeproduktov' => 'strelovodi');
    }
    
    if ($btn_value == 3)
    {
        $args = array( 'post_type' => 'products3',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null);
    }
    
    if ($btn_value == 4)
    {
        $args = array( 'post_type' => 'products4',
                   'posts_per_page' => 500,
                    'post_status' => 'any',
                    'post_parent' => null);
    }*/
    
    
    $posts = get_posts($args);
    $st = 0;
    $html = "<div class='produktlist'><ul>";
    foreach($posts as $post){
        $text = get_post_field("post_content", $post->ID);
        $title = $post -> post_title;
        $image = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID),"large" )[0];
        $link = $post -> guid;
        
        $html .= "<li>";
        
        $html .= "<div class='produktlist-title'>".$title."</div>";
        $html .= "<div class='produktlist-text'>".$text."</div>";
        $html .= "<a href='".$link."'><div class='produktlist-imagecontainer' style='background-image: url(".$image.");'></div></a>";
        $html .= "<div class='showmore button1 produktlist-btn'><a href='".$link."'>Več</a></div>";
        $html .= "</li>";
    }
    $html .= "</ul></div>";
    
    //$html = ;
    
    /*if($html == null){
        $html = " ";
    }*/
    
    
    //$image = get_post_field("post_content", "515");
    
    
    $res = new stdClass();
    $res->error = false;
    $res->errorMessage = "Sporocilo napake... Neki";
    $res->data = new stdClass();
    $res->data->html = $html;
    $res->data->btnvalue = $btn_value;
    echo json_encode($res);
    wp_die();
   /*if ( !wp_verify_nonce( $_REQUEST['nonce'], "my_user_test_nonce")) {
      exit("No naughty business please");
   }  


   $vote_count = get_post_meta($_REQUEST["post_id"], "votes", true);
   $vote_count = ($vote_count == '') ? 0 : $vote_count;
   $new_vote_count = $vote_count + 1;

   $vote = update_post_meta($_REQUEST["post_id"], "votes", $new_vote_count);

   if($vote === false) {
      $result['type'] = "error";
      $result['vote_count'] = $vote_count;
   }
   else {
      $result['type'] = "success";
      $result['vote_count'] = $new_vote_count;
   }

   if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
      $result = json_encode($result);
      echo $result;
   }
   else {
      header("Location: ".$_SERVER["HTTP_REFERER"]);
   }

   die(); 
*/
}