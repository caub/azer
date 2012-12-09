
<? include 'parts/header.php'; ?>

<header>
<nav>
<a href="/<?= APP ?>/login" id="navLanding">Log in</a>
<a href="/<?= APP ?>/register" id="navTour">Register</a>
<a href="/<?= APP ?>/test" class="selected">Test area</a>
</nav>
</header>

<? include 'parts/notifications.php'; ?>

<div class="main flexCenterVertical" style="text-align: justify;">
	
	<h2>a redis chat</h2>
	<iframe src="http://138.96.242.20/redis/" style="width: 500px;height: 200px;" title="redis chat"></iframe>
	<p>
	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	
	</p>
	<h2>a map search using <a href="http://138.96.242.20/wiki/indexes#In_summary" target="_blank">geocells and cassandra</a></h2>
	<iframe src="http://138.96.242.20/mymap" style="width: 600px;height: 700px;" title="map"></iframe>
	
</div>


<? include 'parts/footer.php'; ?>