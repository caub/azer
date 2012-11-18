<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>
<a href="javascript:history.go(-1)">Back</a>
<?php tabbar(); ?>

<h2 style="text-align: center;">Posts</h2>


<pre>

<?= print_r($data); ?>

</pre>

<a href="/<?= APP ?>/posts/<?= urlencode(trim($data['id'])) ?>?method=delete">delete #<?= $data['id'] ?></a>

<? include 'parts/footer.php'; ?>