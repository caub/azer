<? include 'parts/header.php'; ?>

<?php tabbar('main'); ?>
<? include 'parts/notifications.php'; ?>


<div class="content">


<br><br>
<h3>Post with id: <?= $data['id'] ?></h3>
<pre>

<?= print_r($data); ?>

</pre>

<a href="/<?= APP ?>/posts/<?= urlencode(trim($data['id'])) ?>?method=delete">delete #<?= $data['id'] ?></a>

</div>

<? include 'parts/footer.php'; ?>