
<? include 'parts/header.php'; ?>

<?php tabbar('inbox'); ?>

<div class="main flexCenterVertical">

	<p><b>hi, <?= $_SESSION['user']->name ?></b></p>
	
	<p>Message: <textarea id="in" style="vertical-align: bottom;width: 287px;height: 18px;"></textarea><button id="go">go</button></p>
	<pre id="out">
<?php foreach($data as $k=>$value): ?>
<?php $v = json_decode($value); ?>
[<?= $v->date ?>] <?= $v->user ?>: <?= $v->message.'
'?>
<?php endforeach; ?>
	</pre>
	<script>
	$(function() {
		$('#go').click(function(e){
			$.post('/<?= APP_NAME ?>/inbox', {'user': '<?= $_SESSION['user']->name ?>', 'method': 'create', 'message': $('#in').val()});
			$('#in').val('');
		});
	});
	</script>
	
</div>


<? include 'parts/footer.php'; ?>