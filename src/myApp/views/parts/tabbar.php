<?php

function tabbar($active = ''){
	?>
<header>
<nav>
<a href="/<?= APP_NAME ?>" <?= $active === 'main'?'class="selected"':'' ?>>Home</a><!--    
--><a href="/<?= APP_NAME ?>/search" <?= $active === 'search'?'class="selected"':'' ?>>Search</a><!--  
--><a href="/<?= APP_NAME ?>/map" <?= $active === 'map'?'class="selected"':'' ?>>Map</a><!--  
--><a href="/<?= APP_NAME ?>/inbox" <?= $active === 'inbox'?'class="selected"':'' ?>>Messages</a>
</nav>
</header>

	<?php 

}

?>

