
<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>


<?php tabbar('post'); ?>

<div style="text-align: center;">
<br><br>
<form action="/<?= APP ?>/posts" method="post" id="postForm">

	<input type="hidden" name="method" value="create">
	<span style="margin-left: -70px;">key (empty ones are not used)</span><span style="margin-right: 80px;"></span><span>value</span><br>

	<input type="search" name="keys[]" value="color">
	<input type="search" name="vals[]" value="blue"><br>
	
	<input type="search" name="keys[]" value="color">
	<input type="search" name="vals[]" value="red"><br>
	
	<input type="search" name="keys[]" value="theme">
	<input type="search" name="vals[]" value="punk"><br>
	<input type="button" value="+" onclick="addFields(this);">
	
	<br><br>
	<textarea name="text" rows="3" style="width:600px;">blabla.....</textarea>
	<br>
	<input type="submit" value="Post" style="height: 27px;">

</form>

</div>

<? include 'parts/footer.php'; ?>
