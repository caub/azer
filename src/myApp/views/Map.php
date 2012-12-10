<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width" />
<title><?= APPLICATION_NAME ?></title> 

<link href="/application/myApp/css/app.css" rel="stylesheet" />
<script src="/lib/jquery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/application/myApp/javascript/map.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>

</head>
<body style="overflow-y: hidden;">
	
<header style="position: absolute;top: 0;z-index: 1;">
<nav>
<a href="/<?= APP ?>">Home</a><!--    
--><a href="/<?= APP ?>/search">Search</a><!--  
--><a href="/<?= APP ?>/map" class="selected">Map</a><!--  
--><a href="/<?= APP ?>/inbox">Messages</a>
</nav>
</header>
	
	<? include 'parts/notifications.php'; ?>
	
	<div id="map_canvas" style="top: 40px;"></div>
	
	<div id="map_label">
		type=
		<input id="library2" type="checkbox" checked="checked" onchange="getPOIs();">
		<label for="library2" style="background-color:#77ffff;">libraries</label>
		<input id="grocery2" type="checkbox" onchange="getPOIs();">
		<label for="grocery2" style="background-color:#77ff77;">groceries</label>
		<br>
		Within <input onchange="rad = parseFloat($(this).val()*180/(Math.PI*6371));$('#radius_value').html(this.value);google.maps.event.trigger(map, 'dragend');" 
			id="radius" type="range" placeholder="radius" value="0.5" min="0.1" max="50" step="0.1" style="vertical-align: middle;"> 
		<span id="radius_value">0.5</span> km
	</div>
	
	
</body>
</html>
