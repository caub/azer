<?php

function tabbar($active = ''){
	?>
<header>
<nav>
<a href="/<?= APP ?>" <?= $active === 'main'?'class="selected"':'' ?>>Home</a><!--    
--><a href="/<?= APP ?>/search" <?= $active === 'search'?'class="selected"':'' ?>>Search</a><!--  
--><a href="/<?= APP ?>/map" <?= $active === 'map'?'class="selected"':'' ?>>Map</a><!--  
--><a href="/<?= APP ?>/inbox" <?= $active === 'inbox'?'class="selected"':'' ?>>Messages</a>
</nav>
</header>

	<?php 

}

?>

