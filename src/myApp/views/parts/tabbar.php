<?php

function tabbar($active = ''){
	?>
<header>
<nav>
<a href="/<?= APP ?>" <?= $active === 'main'?'class="selected"':'' ?>>Home</a><!--  
--><a href="/<?= APP ?>/post" <?= $active === 'post'?'class="selected"':'' ?>>Post</a><!--  
--><a href="/<?= APP ?>/search" <?= $active === 'articles'?'class="selected"':'' ?>>Articles</a><!--  
--><a href="/<?= APP ?>/profile" <?= $active === 'myprofile'?'class="selected"':'' ?>>My profile</a>
</nav>
</header>

	<?php 

}

?>

