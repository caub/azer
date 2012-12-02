<? include 'parts/header.php'; ?>

<?php tabbar('articles'); ?>
<? include 'parts/notifications.php'; ?>


<div class="main flexCenterVertical">

<h3>Post id: <?= $data['id'] ?></h3>
<pre>

<?= print_r($data); ?>

</pre>

<a href="/<?= APP ?>/posts/<?= urlencode(trim($data['id'])) ?>?method=delete">delete #<?= $data['id'] ?></a>

</div>

<? include 'parts/footer.php'; ?>