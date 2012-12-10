
<? include 'parts/header.php'; ?>


<header>
<nav>
<a href="/<?= APP ?>/login" id="navLanding" class="selected">Log in</a><!--  
--><a href="/<?= APP ?>/register" id="navTour">Register</a>
</nav>
</header>

<? include 'parts/notifications.php'; ?>

<div class="main flexCenterVertical">
	
	<form action="/<?= APP ?>/login" method="post" style="text-align: center;">
	
		<input type="text" name="login" placeholder="Email" value="test_myapp@yopmail.com" style="height: 24px;padding-left: 7px;font-size: 16px;">
		<input type="password" name="password" placeholder="Password" value="1" style="height: 24px;padding-left: 7px;font-size: 16px;">
		<input type="submit" value="Log in"  style="height: 24px;vertical-align: middle;">
	</form>

</div>


<? include 'parts/footer.php'; ?>