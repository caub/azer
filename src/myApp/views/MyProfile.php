<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>

<?php tabbar('myprofile'); ?>

<div style="text-align: center; margin-top: 75px;">
	<a href="/<?= APP ?>/logout">Sign out</a>
</div>


<pre>

<?= print_r($data); ?>
</pre>



<? include 'parts/footer.php'; ?>