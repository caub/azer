<? include 'parts/header.php'; ?>


<?php tabbarFlex('main'); ?>

<? include 'parts/notifications.php'; ?>

<div class="main">

	
	<form style="text-align: center;margin-top: 75px;" action="/<?= APP ?>/search" id="searchForm">
		<input name="q" type="search" value="<?= $params['title'] ?>" 
		style="width: 70%;min-width:300px;height: 27px;padding-left: 7px;font-size: 16px;">
		<input type="submit" value="Search" style="height: 27px;">

		<p>searches are formed like that: <br><i style="letter-spacing: 1px;">color=blue&color=red&theme=punk | foo=bar&..=..</i></p>

	</form>
	
	
	
	<hr>
	<form action="/<?= APP ?>/posts" method="post" id="postForm" style="text-align: center;margin-bottom: 50px;">
		<h3 style="text-align: center;">Post an article:</h3>
		<input type="hidden" name="method" value="create">
		keywords: <input name="q" type="search" value="color=blue & color=red & theme=punk | color=yellow & theme=raw" 
			style="width: 70%;min-width:300px;padding-left: 7px;">
		
		<br><br>
		<textarea name="text" rows="3" style="width:600px;">blabla.....</textarea>
		<br>
		<input type="submit" value="Post" style="height: 27px;">
	</form>
</div>



<? include 'parts/footer.php'; ?>