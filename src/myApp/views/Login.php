
<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>


<h1>Log in</h1>


<br>

<form action="/<?= APP ?>/authentication" method="post">
	<input type="hidden" name="method" value="read">
	<input type="text" name="login" placeholder="Email" value="test_myapp@yopmail.com">
	<input type="password" name="password" placeholder="Password" value="1">
	<input type="submit" value="Sign in">
	 
	or 
	<a href="/<?= APP ?>/register">Register</a>
</form>


<? include 'parts/footer.php'; ?>