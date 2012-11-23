
<? include 'parts/header.php'; ?>

<header>
<nav>
<a href="/<?= APP ?>/login" id="navLanding">Log in</a>
<a href="/<?= APP ?>/register" id="navTour" class="selected">Register</a>
<a href="http://138.96.242.20/wiki/indexes" target="_blank">Documentation</a>
</nav>
</header>

<? include 'parts/notifications.php'; ?>

<div style="margin-top: 175px;">
	
	<form action="/<?= APP ?>/register" method="post" style="text-align: center;">
	
		<input type="hidden" name="method" value="create" >
		<input type="email" name="email" placeholder="email" style="height: 24px;padding-left: 7px;font-size: 16px;">
		
		<input type="password" name="password" placeholder="password" style="height: 24px;padding-left: 7px;font-size: 16px;">
		<!-- <input type="password" name="confirm" placeholder="password confirmation">  -->
		
		<input type="submit" value="Register" style="height: 24px;vertical-align: middle;">
		
	</form>
</div>


<? include 'parts/footer.php'; ?>