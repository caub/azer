<? include 'parts/header.php'; ?>


<?php tabbar('search'); ?>

<? include 'parts/notifications.php'; ?>

<div class="main flexCenterVertical">

<br><br>
<h3>Profile of <?= $data['id'] ?></h3>
<div>
<?php foreach ($data as $k=>$v): ?>
	<?= $k ?> => <?= $v ?><br>
<?php endforeach; ?>
</div>

</div>



<? include 'parts/footer.php'; ?>