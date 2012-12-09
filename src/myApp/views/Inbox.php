
<? include 'parts/header.php'; ?>

<?php tabbar('inbox'); ?>

<? include 'parts/notifications.php'; ?>

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
	if (!!EventSource){
		var source = new EventSource('/inbox/stream');
		source.onmessage = function(e) {
			// XSS in chat is fun
			entry = JSON.parse(e.data);
			if (entry.type !== "subscribe"){
				//alert(msg.data);
				var data = JSON.parse(entry.data);
				out.innerHTML = '['+data.date+'] '+data.user+': '+ htmlEntities(data.message) + '\n' + out.innerHTML;
			}else{
				//alert('subscribed');
			}
		};
	}
	var out = document.getElementById('out');
	
	$('#go').click(function(e){
		$.post('/<?= APP ?>/inbox', {'user': '<?= $_SESSION['user']->name ?>', 'method': 'create', 'message': $('#in').val()});
		$('#in').val('');
	});
	
	function htmlEntities(str) {
		return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
	}
	</script>
	
</div>


<? include 'parts/footer.php'; ?>