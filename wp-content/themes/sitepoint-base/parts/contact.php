<?php


?>
<div class="contact" style="<?php if(is_page(26)){ echo "margin-bottom: -40px !important;"; } ?>">

	<div id="map"></div>
	<div class="grid-container">
	<div class="contact-window"></div>
</div>
</div>

<script type="text/javascript">

    //var locations;
    jQuery(function($){

		$(".home #map").width($(window).width());
		$(".single #map").width($(".grid-container").width());



    });
    jQuery(window).resize(function($){
		jQuery(".home #map").width(jQuery(window).width());
		jQuery(".single #map").width(jQuery(".grid-container").width());

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
				jQuery(".contact-window").html("<h3><?php pll_e('Kontakt');?></h3>"+locations[0]["description"]+"<div class='contact-btn button1'><a href='#'>Kje kupiti</a></div>");
				
			},
			error: function(errorThrown){
			      console.log(errorThrown);	
			} 
		});


        
    }
    function initMap(locations){

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
                    jQuery(".contact-window").html("<h3><?php pll_e('Kontakt');?></h3>"+locations[i]["description"]+"<div class='contact-btn button1'><a href='#'>Kje kupiti</a></div>");
                }
            })(marker, i));        
       		

        }

    }

</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRlpND6_OXuaawSawkaxvHXy1FaaFI0BI&callback=getLocations"></script>