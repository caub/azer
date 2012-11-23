<? include 'parts/header.php'; ?>


<?php tabbar('main'); ?>

<? include 'parts/notifications.php'; ?>

<div>

	
	<form style="text-align: center;margin-top: 30px;" action="/<?= APP ?>/search" id="searchForm">
		<input name="q" type="search" value="<?= $params['title'] ?>" 
		style="min-width:450px;height: 27px;padding-left: 7px;font-size: 16px;">
		<input type="submit" value="Search" style="height: 27px;vertical-align: 0%;">
	</form>
	
	<ul  style="margin: 40px auto 0;width: 600px;">
	<? if(!empty($data)): ?>
	<? foreach($data as $item): ?>
	  <li>
	   <?= date('j/n/y G:i', $item->time); ?> <a href="/<?= APP ?>/posts/<?= urlencode(trim($item->id)) ?>">#<?= $item->id ?></a> by <a href="/<?= APP ?>/profile/<?= urlencode(trim($item->user)) ?>"><?= substr($item->user, 6) ?></a> 
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
</div>



<? include 'parts/footer.php'; ?>