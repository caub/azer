<? include 'parts/header.php'; ?>


<?php tabbar('search'); ?>

<? include 'parts/notifications.php'; ?>

<div class="main flexCenterVertical">

	<br>
	<form style="text-align: center;" action="/<?= APP_NAME ?>/search">
		<input id="q" name="q" type="search" value="<?= $other['title'] ?>" placeholder="color=blue&color=red" 
		style="min-width:350px;height: 27px;padding-left: 7px;font-size: 16px;">
		<input type="submit" value="Search" style="height: 27px;vertical-align: 0%;">
		<input type="button" value="Subscribe" style="height: 27px;vertical-align: 0%;" onclick="$.get('/<?= APP_NAME ?>/search?method=create&q='+$('#q').val())">
	</form>
	
	<ul style="padding-left: 1em;padding-top: 1em;">
	<? if(!empty($data)): ?>
	<? foreach($data as $item): ?>
	  <li>
	   <a href="/<?= APP_NAME ?>/posts/<?= urlencode(trim($item->id)) ?>"><?= date('j/n/y G:i', $item->time); ?></a> 
	   <? if(isset($item->user)): ?>
	   	by <a href="/<?= APP_NAME ?>/profile/<?= urlencode(trim($item->user)) ?>"><?= substr($item->user, 6) ?></a> 
	   <?php endif; ?>
	   <div style="margin: 5px;">
	   <ul>
	   <? foreach($item as $k=>$v): ?>
	   	<li><?= $k ?> => <?= $v ?></li>
	   <? endforeach; ?>
	   </ul>
	   </div>
	  
	  </li>
	<? endforeach; ?>
	<? endif; ?>
	</ul>
	<br>
	<br>
	<input type="button" value="Post an article" onclick="$('#postform').toggle();window.scrollBy(0,400);">
	<form id="postform" action="/<?= APP_NAME ?>/posts" method="post" style="display: none;">
	<input type="hidden" name="method" value="create">
	keywords: <input name="q" type="search" value="color=blue & color=red & theme=punk | type=library & theme=raw" 
		style="width: 70%;min-width:300px;padding-left: 7px;">
	
	<br><br>
	<textarea name="text" rows="10" cols="60">blabla.....</textarea>

	<input type="submit" value="Post" style="height: 27px;vertical-align: bottom;">
	<br>
	<br>
</form>
</div>



<? include 'parts/footer.php'; ?>