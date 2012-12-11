
<div id="notification" class="flexCenter" onclick="$(this).fadeOut('fast');" style="z-index: 10;position: absolute;top: 40px;
<? if (!isset($params['notification'])){echo 'display:none';} ?>">
	<span style="font-size: 20px;"><?= isset($params['notification'])?$params['notification']:'' ?></span>
	<p id="out"></p>
</div>
<script>
var out = document.getElementById('out');
if (!!EventSource){
	var backend = 'http://138.96.242.20/backend';
	var source = new EventSource(backend+'/inbox/stream');
	source.onmessage = function(e) {
		// XSS in chat is fun
		entry = JSON.parse(e.data);
		if (entry.type === "message" && entry.channel === 'chat'){
			document.getElementById('notification').style.display = '';
			//alert(msg.data);
			var data = JSON.parse(entry.data);
			out.innerHTML = '['+data.user+'] '+': '+ htmlEntities(data.message);
		}else if (entry.type === "message"){
			document.getElementById('notification').style.display = '';
			//alert(msg.data);
			out.innerHTML = '[notification]: '+entry.data;
		}
		else{
			//alert('subscribed');
		}
	};
}
function htmlEntities(str) {
	return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
</script>

