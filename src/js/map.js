// MAP
var google_map = {
        canvas: 'map-canvas',
        location: {
            lat: $('#map-canvas').data('lat'),
            lng: $('#map-canvas').data('lng')
        },
        marker: {
            info: '<h3>Visit us!</h3>',
            image: '/theme/default/assets/images/map-icon.png',
            height: 40,
            width: 40
        },
        zoom: 15
    }

function initialise() {

	var myLatlng = new google.maps.LatLng(google_map.location.lat,google_map.location.lng); // Add the coordinates
	var mapOptions = {
		zoom: google_map.zoom, // The initial zoom level when your map loads (0-20)
		minZoom: 6, // Minimum zoom level allowed (0-20)
		maxZoom: 17, // Maximum zoom level allowed (0-20)
		zoomControl:false, // Set to true if using zoomControlOptions below, or false to remove all zoom controls.
		zoomControlOptions: {
				style:google.maps.ZoomControlStyle.DEFAULT // Change to SMALL to force just the + and - buttons.
		},
		center: myLatlng, // Centre the Map to our coordinates variable
		mapTypeId: google.maps.MapTypeId.ROADMAP, // Set the type of Map
		scrollwheel: false, // Disable Mouse Scroll zooming (Essential for responsive sites!)
		// All of the below are set to true by default, so simply remove if set to true:
		panControl:false, // Set to false to disable
		mapTypeControl:false, // Disable Map/Satellite switch
		scaleControl:false, // Set to false to hide scale
		streetViewControl:false, // Set to disable to hide street view
		overviewMapControl:false, // Set to false to remove overview control
		rotateControl:false, // Set to false to disable rotate control

        styles: [{"featureType":"all","elementType":"all","stylers":[{"visibility":"simplified"}]}]
  	}
	var map = new google.maps.Map(document.getElementById(google_map.canvas), mapOptions); // Render our map within the empty div

	var image = new google.maps.MarkerImage(google_map.marker.image, null, null, null, new google.maps.Size(google_map.marker.width,google_map.marker.height)); // Create a variable for our marker image.

	var marker = new google.maps.Marker({ // Set the marker
		position: myLatlng, // Position marker to coordinates
		icon:image, //use our image as the marker
		map: map, // assign the market to our map variable
		title: google_map.marker.info // Marker ALT Text
	});

	google.maps.event.addListener(marker, 'click', function() { // Add a Click Listener to our marker
		infowindow.open(map,marker); // Open our InfoWindow
	});

	google.maps.event.addDomListener(window, 'resize', function() { map.setCenter(myLatlng); }); // Keeps the Pin Central when resizing the browser on responsive sites
}
google.maps.event.addDomListener(window, 'load', initialise); // Execute our 'initialise' function once the page has loaded.
