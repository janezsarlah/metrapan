<?php


?>
<div class="contact" style="<?php if(is_page(26)){ echo "margin-bottom: -40px !important;"; } ?>">

    <div class="grid-container">
        <div class="contact-window-container">
            <div class="contact-window"></div>
            <!--<div class="contact-form"><?php echo do_shortcode('[caldera_form id="CF588efa5d7422a"]'); ?></div>-->
        </div>
    </div>
	<div id="map"></div>

</div>

<script type="text/javascript">

    var map1,map2,map3,map4,map5;

    //var locations;
    jQuery(function($){

		$(".home #map").width($('body').width());
		$(".single #map").width($(".grid-container").width());



    });
    jQuery(window).resize(function($){
		jQuery(".home #map").width(jQuery(window).width());
		jQuery(".single #map").width(jQuery(".grid-container").width());

    });

    function resetMap() {
        console.log(123);

        if (typeof map_position1 !== 'undefined') {
            google.maps.event.trigger(map1, 'resize');
            map1.setCenter(new google.maps.LatLng(map_position1.lat, map_position1.lng));
        }
        if (typeof map_position2 !== 'undefined') {
            google.maps.event.trigger(map2, 'resize');
            map2.setCenter(new google.maps.LatLng(map_position2.lat, map_position2.lng));
        }
        if (typeof map_position3 !== 'undefined') {
            google.maps.event.trigger(map3, 'resize');
            map3.setCenter(new google.maps.LatLng(map_position3.lat, map_position3.lng));
        }
        if (typeof map_position4 !== 'undefined') {
            google.maps.event.trigger(map4, 'resize');
            map4.setCenter(new google.maps.LatLng(map_position4.lat, map_position4.lng));
        }
        if (typeof map_position5 !== 'undefined') {
            google.maps.event.trigger(map5, 'resize');
            map5.setCenter(new google.maps.LatLng(map_position5.lat, map_position5.lng));
        }
   
    }

    jQuery('.tabs-titles li').on('click', function() {
        resetMap();
    });

    function getLocations() {
		var pageId="<?php echo get_the_ID(); ?>";
    	 jQuery.ajax({
			url: ajax.ajax_url,
			type: 'post',
			dataType: 'json',
			data: {
				action: 'locations',
				post_id: pageId
			},
			success: function(locations) {
				console.log(locations);
				initMap(locations);
				jQuery(".contact-window").html("<h3><?php pll_e('Kontakt');?></h3>"+locations[0]["description"]+"");
				
			},
			error: function(errorThrown){
			      console.log(errorThrown);	
			} 
		});


        
    }
    
    function initMap(locations) {

        var map_position = {lat: 46.069660, lng: 14.711750};
        var infoWindow = new google.maps.InfoWindow({map: map});
        var infoBubble;

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: map_position,
          scrollwheel: false,
          styles: [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}],
        });
        var marker,i;

        if (typeof map_position1 !== 'undefined') {
            map1 = new google.maps.Map(document.getElementById('map1'), {
              zoom: 12,
              center: map_position1,
              scrollwheel: false,
              styles: [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}],
            });
            var marker1;
            marker1 = new google.maps.Marker({
                position: new google.maps.LatLng(map_position1.lat, map_position1.lng),
                map: map1,
                icon: "<?php echo get_template_directory_uri(); ?>/img/marker.png"
            });
        }

        if (typeof map_position2 !== 'undefined') {
            map2 = new google.maps.Map(document.getElementById('map2'), {
              zoom: 12,
              center: map_position2,
              scrollwheel: false,
              styles: [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}],
            });  
            var marker2;
            marker2 = new google.maps.Marker({
                position: new google.maps.LatLng(map_position2.lat, map_position2.lng),
                map: map2,
                icon: "<?php echo get_template_directory_uri(); ?>/img/marker.png"
            });  
        }

        if (typeof map_position3 !== 'undefined') {
            map3 = new google.maps.Map(document.getElementById('map3'), {
              zoom: 12,
              center: map_position3,
              scrollwheel: false,
              styles: [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}],
            });
            var marker3;
            marker3 = new google.maps.Marker({
                position: new google.maps.LatLng(map_position3.lat, map_position3.lng),
                map: map3,
                icon: "<?php echo get_template_directory_uri(); ?>/img/marker.png"
            });
        }

        if (typeof map_position4 !== 'undefined') {
            map4 = new google.maps.Map(document.getElementById('map4'), {
              zoom: 12,
              center: map_position4,
              scrollwheel: false,
              styles: [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}],
            });
            var marker4;
            marker4 = new google.maps.Marker({
                position: new google.maps.LatLng(map_position4.lat, map_position4.lng),
                map: map4,
                icon: "<?php echo get_template_directory_uri(); ?>/img/marker.png"
            });
        }

        if (typeof map_position5 !== 'undefined') {
            map5 = new google.maps.Map(document.getElementById('map5'), {
              zoom: 12,
              center: map_position5,
              scrollwheel: false,
              styles: [{"featureType":"administrative","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"landscape","elementType":"all","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","elementType":"all","stylers":[{"saturation":-100},{"lightness":"50"},{"visibility":"simplified"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":"-100"}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"all","stylers":[{"lightness":"30"}]},{"featureType":"road.local","elementType":"all","stylers":[{"lightness":"40"}]},{"featureType":"transit","elementType":"all","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]},{"featureType":"water","elementType":"labels","stylers":[{"lightness":-25},{"saturation":-100}]}],
            });
            var marker5;
            marker5 = new google.maps.Marker({
                position: new google.maps.LatLng(map_position5.lat, map_position5.lng),
                map: map5,
                icon: "<?php echo get_template_directory_uri(); ?>/img/marker.png"
            });
        }

        function handleLocationError(browserHasGeolocation, infoWindow, map_position) {
            infoWindow.setPosition(map_position);
            infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                      'Error: Your browser doesn\'t support geolocation.');
        }

        for (i = 0; i < locations.length; i++) {  

            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i]["latitude"], locations[i]["longitude"]),
                map: map,
                icon: "<?php echo get_template_directory_uri(); ?>/img/marker.png"
            });
            
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {

                    //console.log(locations[i]["description"]);
                    jQuery(".contact-window").html("<h3><?php pll_e('Kontakt');?></h3>"+locations[i]["description"]);
                }
            })(marker, i));        
       	
        }
    }

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRlpND6_OXuaawSawkaxvHXy1FaaFI0BI&callback=getLocations"></script>