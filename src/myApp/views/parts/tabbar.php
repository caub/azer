<?php

function tabbar($active = 'main'){
	?>
	
<div style="width: 100%;margin-bottom: 70px;">
	<div style="position: relative;right: 50%;float: right;">
		<nav style="position: relative;right: 50%;left: 50%;float: left;">
			<ul>
				<li <?= $active === 'main'?'style="background-color: #f3f3f3;"':'' ?>><a href="/<?= APP ?>">Home</a></li>
				<li <?= $active === 'post'?'style="background-color: #f3f3f3;"':'' ?>><a href="/<?= APP ?>/posts">Post</a></li>
			<ul>
		</nav>
	</div>
</div>

<?php 
	
	
}

?>

