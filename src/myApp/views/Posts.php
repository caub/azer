<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>

<?php tabbar(); ?>

<div style="text-align: center; margin-top: 75px;">
	
</div>
<pre>

<?= print_r($data); ?>

</pre>

<a href="/<?= APP ?>/posts/<?= urlencode(trim($data['id'])) ?>?method=delete">delete #<?= $data['id'] ?></a>

<? include 'parts/footer.php'; ?>