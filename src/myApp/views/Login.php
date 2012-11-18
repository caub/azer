
<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>


<h2 style="text-align: center;">Log in</h2>


<br>

<form action="/<?= APP ?>/login" method="post" style="text-align: center;">

	<input type="text" name="login" placeholder="Email" value="test_myapp@yopmail.com">
	<input type="password" name="password" placeholder="Password" value="1">
	<input type="submit" value="Sign in">
	 
	or 
	<a href="/<?= APP ?>/register">Register</a>
</form>


<? include 'parts/footer.php'; ?>