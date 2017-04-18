<?php
			
//echo json_encode(get_field("content"));
$content = get_field("produkti", get_the_ID());
//debug($content[2]['produktlist']);

if(count($content) > 0){
	foreach ($content as $key => $value) {
		
		switch($value["acf_fc_layout"]){
			case "produkti_header": 
                include( get_stylesheet_directory() . '/parts/produkti.php');
				break;
            case "produkticons":
                include( get_stylesheet_directory() . '/parts/produkticons.php');
                break;
            case "produktlist":
            case "produktlist2":
            case "produktlist3":
            case "produktlist4":
                include_once( get_stylesheet_directory() . '/parts/list.php');
                break;
            	
		}
	}
}


?> 