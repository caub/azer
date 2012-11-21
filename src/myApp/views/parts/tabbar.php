<?php

function tabbar($active = 'main'){
	?>
	
<div style="width: 260px;margin: auto;">
	<nav style="position: relative;float: left; font-weight: bold;">
		<ul>
			<li <?= $active === 'main'?'style="background-color: #f3f3f3;"':'' ?>><a href="/<?= APP ?>">Home</a></li>
			<li <?= $active === 'myprofile'?'style="background-color: #f3f3f3;"':'' ?>><a href="/<?= APP ?>/profile">My profile</a></li>
			<li <?= $active === 'post'?'style="background-color: #f3f3f3;"':'' ?>><a href="/<?= APP ?>/posts">Post</a></li>
		<ul>
	</nav>
</div>
<br>
<?php 
	
	
}

?>

