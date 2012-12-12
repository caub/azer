
<div id="notification" class="flexCenter" onclick="$(this).fadeOut('fast');" style="z-index: 10;position: absolute;top: 40px;
<? if (!isset($other['notification'])){echo 'display:none';} ?>">
	<span style="font-size: 20px;"><?= isset($other['notification'])?$other['notification']:'' ?></span>
	<p id="out"></p>
</div>
