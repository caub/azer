<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>

<a href="/<?= APP ?>">Back</a>
<br>
<h1>Results </h1>
<form action="/<?= APP ?>/search" id="searchForm">
	<input name="q" type="search" value="<?= $params['title'] ?>" 
	style="width: 600px;height: 27px;padding-left: 7px;font-size: 16px;">
	<input type="submit" value="Search" style="height: 27px;">
</form>

<ul>
<? if(!empty($data)): ?>
<? foreach($data as $item): ?>
  <li>
   <a href="/<?= APP ?>/posts/<?= urlencode(trim($item->id)) ?>">#<?= $item->id ?></a> by <a href="/<?= APP ?>/profile/<?= urlencode(trim($item->user)) ?>"><?= substr($item->user, 6) ?></a> at <?= date('j/n/y G:i', $item->time); ?> 
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




<? include 'parts/footer.php'; ?>