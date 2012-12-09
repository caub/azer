
<? include 'parts/header.php'; ?>

<header>
<nav>
<a href="/<?= APP ?>/login" id="navLanding">Log in</a><!--  
--><a href="/<?= APP ?>/register" id="navTour" class="selected">Register</a>
</nav>
</header>

<? include 'parts/notifications.php'; ?>

<div class="main flexCenterVertical">
	
	<form action="/<?= APP ?>/register" method="post" id="loginForm" style="text-align: center;">
	
		<input type="hidden" name="method" value="create" >
		<input type="email" name="email" placeholder="email" style="height: 24px;padding-left: 7px;font-size: 16px;">
		
		<input type="password" name="password" placeholder="password" style="height: 24px;padding-left: 7px;font-size: 16px;">
		<!-- <input type="password" name="confirm" placeholder="password confirmation">  -->
		
		<input type="submit" value="Register" style="height: 24px;vertical-align: middle;">
		
	</form>
</div>


<? include 'parts/footer.php'; ?>