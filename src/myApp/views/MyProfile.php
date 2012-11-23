<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>


<?php tabbar('myprofile'); ?>

<div class="content">
<br><br>
<div style="text-align: center;">
	<a href="/<?= APP ?>/logout">Sign out</a>
</div>


<pre>

<?= print_r($data); ?>
</pre>
</div>



<? include 'parts/footer.php'; ?>