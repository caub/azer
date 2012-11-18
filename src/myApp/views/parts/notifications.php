
<div onclick="$(this).fadeOut('fast');" id="notification-success" style="text-align: center;background-color: yellow; display:<?= isset($params['notification'])?'block':'none' ?>">
	<span style="font-size: 20px;"><?= isset($params['notification'])?$params['notification']:'' ?></span>
</div>

