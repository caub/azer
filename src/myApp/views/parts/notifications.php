
<div id="notification" onclick="$(this).fadeOut('fast');" 
<? if (!isset($params['notification'])){echo 'style="display:none"';} ?>>
	<span style="font-size: 20px;"><?= isset($params['notification'])?$params['notification']:'' ?></span>
</div>

