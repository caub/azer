<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>
<a href="javascript:history.go(-1)">Back</a>
<h1>Posts</h1>

<pre>

<?= print_r($data); ?>

</pre>

<a href="/<?= APP ?>/posts/<?= urlencode(trim($data['id'])) ?>?method=delete">delete #<?= $data['id'] ?></a>

<? include 'parts/footer.php'; ?>