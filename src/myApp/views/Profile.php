<? include 'parts/header.php'; ?>


<?php tabbar(); ?>

<? include 'parts/notifications.php'; ?>

<div class="content">

<br><br>
<h3>Profile of <?= $data['id'] ?></h3>
<pre>

<?= print_r($data); ?>
</pre>

</div>



<? include 'parts/footer.php'; ?>