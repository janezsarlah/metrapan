<?php
			
//echo json_encode(get_field("content"));
$content = get_field("content", get_the_ID());

//echo json_encode($content);
if(count($content)>0 && $content != null){
	foreach ($content as $key => $value) {
		
		switch($value["acf_fc_layout"]){
			case "cars": 
				include( get_stylesheet_directory() . '/parts/cars.php');
				break;
			case "contact": 
				include( get_stylesheet_directory() . '/parts/contact.php');
				break;
			case "contact_form": 
				echo do_shortcode($value["form_shortcode"]);
				break;
			case "gallery": 
				include( get_stylesheet_directory() . '/parts/gallery.php');
				break;
			case "prednosti":
				include( get_stylesheet_directory() . '/parts/prednosti.php');
				break;
			case "boxes":
				include( get_stylesheet_directory() . '/parts/boxes.php');
				break;
			case "aktualnosti":
				include( get_stylesheet_directory() . '/parts/aktualnosti.php');
                break;
            case "ponudba":
                include( get_stylesheet_directory() . '/parts/ponudba.php');
                break;
            case "gallery-product":
                include( get_stylesheet_directory() . '/parts/gallery-product.php');
                break;
            case "aktualnosti_list":
                include( get_stylesheet_directory() . '/parts/aktualnostilist.php');
                break;
            case "content-contact":
                include( get_stylesheet_directory() . '/parts/content-contact.php');
                break;
            case "timeline_content":
                include( get_stylesheet_directory() . '/parts/timeline-content.php');
                break;
            case "newslblock":
                include( get_stylesheet_directory() . '/parts/newsbox.php');
                break;
		}
	}
}

/*$content_contact = get_field("contacts", get_the_ID());

if(count($content_contact)>0){
	foreach ($content_contact as $key => $value) {
		switch($value["acf_fc_layout"]){
            case "kontakti":
                include( get_stylesheet_directory() . '/parts/kontakti.php');
                break;
		}
	}
}*/


?>