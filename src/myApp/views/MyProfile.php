<? include 'parts/header.php'; ?>

<?php tabbar('myprofile'); ?>

<? include 'parts/notifications.php'; ?>

<div class="main flexCenterVertical">
<br><br>
<div style="text-align: center;">
	<a href="/<?= APP ?>/logout">Log out</a>
</div>


<pre>

<?= print_r($data); ?>
</pre>
</div>



<? include 'parts/footer.php'; ?>