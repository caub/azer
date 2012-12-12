
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">  

<head> 

	<title><?= APP_NAME ?></title> 
			
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="viewport" content="width=device-width" />
	
	<!-- CSS -->
	<link href="/myApp/css/app.css" rel="stylesheet" />
	
	<!-- JS -->
	<script src="/myApp/javascript/jquery-1.8.2.min.js"></script>
	<script src="/myApp/javascript/map.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript">
		var accessToken = '<?= $_SESSION['accessToken'] ?>';
		var app_name = '<?= APP_NAME ?>';
		var backend = '<?= BACKEND_URL ?>';
	</script>

</head>
		
<body class="flexCenterVertical">

