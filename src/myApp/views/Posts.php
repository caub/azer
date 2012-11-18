<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>
<a href="javascript:history.go(-1)">Back</a>
<div style="text-align: center;">
<h1>Posts</h1>
</div>

<pre>

<?= print_r($data); ?>

</pre>

<a href="/<?= APP ?>/posts/<?= urlencode(trim($data['id'])) ?>?method=delete">delete #<?= $data['id'] ?></a>

<? include 'parts/footer.php'; ?>