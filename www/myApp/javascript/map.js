var map;

var latlng; // the center point if the map

var markers = {}; //list of markers on the map

var rad = 0.005; //radius of search

var accessToken; //backend API accessToken

var pinMarker;

var app_name = "myApp"; //should be passed by ajax also

$(function() {

	markerList = {};
	
	latlng = new google.maps.LatLng(43.616548616564, 7.0685118565707);

	map = new google.maps.Map(document.getElementById("map_canvas"), {
		zoom : 15,
		mapTypeId : google.maps.MapTypeId.ROADMAP
	});

	pinMarker = new google.maps.Marker({
		map : map,
		draggable: true,
		icon: '/application/myApp/img/pin'
	});

	pinMarker.setPosition(new google.maps.LatLng(latlng.lat()+0.0025, latlng.lng()-0.010));
	map.setCenter(latlng);

	var infowindow = new google.maps.InfoWindow({
		content : "Drag me<br /> " +
				"<button onclick='addPOI();'>Add POI here</button><br />" +
				"<input id='library' type='checkbox' checked='checked'/>"+
				"<label for='library'>library</label>"+
				"<input id='grocery' type='checkbox'/>"+
				"<label for='grocery'>grocery</label><br />"+
				"<textarea id='content'></textarea>"
	});
	//infowindow.open(map, marker);
	google.maps.event.addListener(pinMarker, 'click', function(event) {
		infowindow.open(map, pinMarker);
	});
	google.maps.event.addListener(pinMarker, 'dragend', function(event) {
		console.log('marker ' + event.latLng.lat() + ' ' + event.latLng.lng());
	});

	google.maps.event.addListener(map, 'drag', function() {
		
		var center = map.getCenter();
		var c = Math.cos(center.lat()* Math.PI / 180);
		rectangle.setBounds(new google.maps.LatLngBounds(
				new google.maps.LatLng(center.lat()-c*rad, center.lng()-rad),
				new google.maps.LatLng(center.lat()+c*rad, center.lng()+rad)));

	});

	google.maps.event.addListener(map, 'dragend', function() {
		
		var center = map.getCenter();
		var c = Math.cos(center.lat()* Math.PI / 180);
		rectangle.setBounds(new google.maps.LatLngBounds(
				new google.maps.LatLng(center.lat()-c*rad, center.lng()-rad),
				new google.maps.LatLng(center.lat()+c*rad, center.lng()+rad)));
		getPOIs();
	});

	rectangle = new google.maps.Rectangle();
	var rectOptions = {
		strokeColor : "#FF0000",
		strokeOpacity : 0.8,
		strokeWeight : 2,
		fillOpacity : 0,
		map : map
	};
	
	rectangle.setOptions(rectOptions);
	
	/*
	 * if (navigator.geolocation) {
	 * navigator.geolocation.watchPosition(displayPosition, displayError,
	 * {enableHighAccuracy : true, timeout: 5000, maximumAge: 0}); }
	 */
	
	// get a backend access token
	$.get('/application/myApp/xhr_session_token.php', 
		function(res){
			accessToken = res;
			google.maps.event.trigger(map, 'dragend');
	});
	

});


function getPOIs(){
	
	clearOverlays();
	
	var types = [];
	
	//alphabetical order
	if ($('#grocery2').prop('checked'))
		types.push("grocery");
	if ($('#library2').prop('checked'))
		types.push("library");
	
	var coords = [
        rectangle.getBounds().getSouthWest().lat(),
        rectangle.getBounds().getSouthWest().lng(),
        rectangle.getBounds().getNorthEast().lat(),
        rectangle.getBounds().getNorthEast().lng()
    ];
	
	//get geocells then results
	
	$.get('/backend/GeoCellHandler?position='+coords.join('|'), function(response){
		cells = response.dataObject.results;
		var predicates = [];
		for( var i in cells){
			predicates.push({"position": [cells[i]], "type": types});
		}
		
		//yes I know indented cbs suck, can be improved with trigger event
		$.get("/backend/PublishHandler",
			{
				code: 1,
				application: app_name,
				accessToken: accessToken,
				predicates: JSON.stringify(predicates)
			}, function(res){
				if (res.status==200){
					for (var i in res.dataObject.results){
						var item = res.dataObject.results[i];
						if (rectangle.getBounds().contains(new google.maps.LatLng(item.lat, item.lng)))
							addMarker(item.lat, item.lng, item.type, item.id, item.content);
					}
				}
		});
	});

}


function addPOI(){

	var types = [];
	
	//alphabetical order
	if ($('#grocery').prop('checked'))
		types.push("grocery");
	if ($('#library').prop('checked'))
		types.push("library");
	
	
	var coords = [
	    pinMarker.getPosition().lat(),
	    pinMarker.getPosition().lng()
	];

	var time = parseInt($.now()/1000);
	var metadata = {
			"lat": pinMarker.getPosition().lat(),
			"lng": pinMarker.getPosition().lng(),
			"type": types.join(', '),
			"time": time
	};
	
	var data = {"text": encodeURIComponent($('#content').val()), "time": time};
	
	$.get('/backend/GeoCellHandler?position='+coords.join('|'), function(response){
		cells = response.dataObject.results;
		
		var predicates = [];
		for( var i in cells){
			predicates.push({"position": [cells[i]], "type": types});
		}
		$.post("/backend/PublishHandler",
			{
				code: 0,
				application: app_name,
				accessToken: accessToken,
				metadata: JSON.stringify(metadata),
				data: JSON.stringify(data),
				predicates: JSON.stringify(predicates)
			}, function(res){
				console.log(res);
		});
		
	});

}

function delPOI(id){

	console.log(id);

	$.get("/backend/PublishHandler",
		{
			code: 3,
			application: app_name,
			accessToken: accessToken,
			id: id
		}, function(res){
			console.log(res);
	});
	
}

function getDetails(id, marker){

	console.log(marker);
	
	$.get("/backend/PublishHandler",
		{
			code: 1,
			application: app_name,
			accessToken: accessToken,
			id: id
		}, function(res){
			if (res.status==200){
				var infowindow = new google.maps.InfoWindow({
					content : "<p>"+decodeURIComponent(res.dataObject.details.text||"vide...")+"</p>"
				});
				infowindow.open(map, markers[id]);
				
			}
	});

}

function addMarker(lat, lng, type, id, content){
	
	var marker = new google.maps.Marker({
		map : map,
		position: new google.maps.LatLng(lat, lng)
	})
	var pinColor = "FE7569";
	if (type.indexOf("library")>=0){
		if (type.indexOf("grocery")>=0)
			pinColor="7777ff";
		else
			pinColor="77ffff";
	} else if (type.indexOf("grocery")>=0)
		pinColor="77ff77";
	
	var pinImage = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=%E2%80%A2|" + pinColor,
	new google.maps.Size(21, 34),
	new google.maps.Point(0,0),
	new google.maps.Point(10, 34));


	var pinShadow = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_shadow",
	new google.maps.Size(40, 37),
	new google.maps.Point(0, 0),
	new google.maps.Point(12, 35));
	marker.setIcon(pinImage);
	marker.setShadow(pinShadow);
	
	var infowindow = new google.maps.InfoWindow({
		content : "I'm a "+type+"<br /> (" + lat+","+lng+")<br />"+
		(content||"")+"<br />"+
		"<a href='#' onclick='getDetails(\""+id+"\");'>details...</a> or <a href='#' onclick='delPOI(\""+id+"\");'>delete...</a><br />"
	});
	//infowindow.open(map, marker);
	google.maps.event.addListener(marker, 'click', function(event) {
		infowindow.open(map, marker);
	});
	
	markers[id] = marker;
}

function setAllMap(map) {
	for (var i in markers) {
		markers[i].setMap(map);
	}
}
// Removes the overlays from the map, but keeps them in the array.
function clearOverlays() {
	setAllMap(null);
}
// Shows any overlays currently in the array.
function showOverlays() {
	setAllMap(map);
}

// Deletes all markers in the array by removing references to them.
function deleteOverlays() {
	clearOverlays();
	markers = {};
}


/*
 * function displayPosition(position) {
 * 
 * latlng = new google.maps.LatLng(position.coords.latitude,
 * position.coords.longitude);
 * 
 * marker.setPosition(latlng); map.setCenter(latlng); if
 * (position.coords.accuracy) { console.log("acc: " + position.coords.accuracy); }
 *  } function displayError(error) { var errors = { 1 : 'Permission refusée', 2 :
 * 'Position indisponible', 3 : 'Requête expirée' }; console.log("Erreur
 * géolocalisation: " + errors[error.code]);
 *  }
 */