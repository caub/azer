
<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>
<a href="javascript:history.go(-1)">Back</a>

<h2 style="text-align: center;">Register</h2>


<br>

<form action="/<?= APP ?>/register" method="post" style="text-align: center;">

	<input type="hidden" name="method" value="create">
	<input type="email" name="email" placeholder="email">
	
	<input type="password" name="password" placeholder="password">
	<!-- <input type="password" name="confirm" placeholder="password confirmation">  -->
	
	<input type="submit" value="Register">
	
</form>


<? include 'parts/footer.php'; ?>