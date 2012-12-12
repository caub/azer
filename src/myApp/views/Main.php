<? include 'parts/header.php'; ?>


<?php tabbar('main'); ?>

<? include 'parts/notifications.php'; ?>

<div class="main flexCenterVertical">

	<h1>Hello</h1>
	<p style="max-width:500px;">this is a simple web framework using a NoSQL Cassandra database <wbr>(<a href="https://gforge.inria.fr/projects/mymed/" target="_blank">sources</a>)<wbr>, see also <a href="http://138.96.242.20/wiki/indexes" target="_blank">documentation</a></p>
	
	<br><br>
	
	<h2>my profile</h2>
	<div>
	<?php foreach ($data as $k=>$v): ?>
		<?= $k ?> => <?= $v ?><br>
	<?php endforeach; ?>
	</div>
	<a href="/<?= APP_NAME ?>/logout">Log out</a>



</div>



<? include 'parts/footer.php'; ?>