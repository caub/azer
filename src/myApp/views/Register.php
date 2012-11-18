
<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>
<a href="javascript:history.go(-1)">Back</a>

<h1>Register</h1>


<br>

<form action="/<?= APP ?>/register" method="post">

	<input type="hidden" name="method" value="create">
	<input type="email" name="email" placeholder="email">
	
	<input type="password" name="password" placeholder="password">
	<!-- <input type="password" name="confirm" placeholder="password confirmation">  -->
	
	<input type="submit" value="Register">
	
</form>


<? include 'parts/footer.php'; ?>