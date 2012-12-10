<? include 'parts/header.php'; ?>

<?php tabbar('search'); ?>
<? include 'parts/notifications.php'; ?>


<div class="main flexCenterVertical">

<h3>Post id: <?= $data['id'] ?></h3>
<div>
<?php foreach ($data as $k=>$v): ?>
	<?= $k ?> => <?= $v ?><br>
<?php endforeach; ?>
</div>

<a href="/<?= APP ?>/posts/<?= urlencode(trim($data['id'])) ?>?method=delete">delete #<?= $data['id'] ?></a>

</div>

<? include 'parts/footer.php'; ?>