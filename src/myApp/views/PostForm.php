
<? include 'parts/header.php'; ?>


<?php tabbar('post'); ?>

<? include 'parts/notifications.php'; ?>

<div class="main flexCenterVertical">

<form action="/<?= APP ?>/posts" method="post">
		
	<h1>Post an article:</h1>
	<input type="hidden" name="method" value="create">
	keywords: <input name="q" type="search" value="color=blue & color=red & theme=punk | color=yellow & theme=raw" 
		style="width: 70%;min-width:300px;padding-left: 7px;">
	
	<br><br>
	<textarea name="text" rows="10" cols="60">blabla.....</textarea>

	<input type="submit" value="Post" style="height: 27px;vertical-align: bottom;">
</form>
</div>



<? include 'parts/footer.php'; ?>