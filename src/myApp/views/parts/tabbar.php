<?php

function tabbar($active = ''){
	?>
<header>
<nav>
<a href="/<?= APP ?>" id="navLanding" <?= $active === 'main'?'class="selected"':'' ?>>Articles</a>
<a href="/<?= APP ?>/profile" id="navTour" <?= $active === 'myprofile'?'class="selected"':'' ?>>My profile</a>
<a href="http://138.96.242.20/wiki/indexes" target="_blank">Documentation</a>
</nav>
</header>



<?php 

}

function tabbarFlex($active = ''){
	?>
<header style="position: absolute;">
<nav>
<a href="/<?= APP ?>" id="navLanding" <?= $active === 'main'?'class="selected"':'' ?>>Articles</a>
<a href="/<?= APP ?>/profile" id="navTour" <?= $active === 'myprofile'?'class="selected"':'' ?>>My profile</a>
<a href="http://138.96.242.20/wiki/indexes" target="_blank">Documentation</a>
</nav>
</header>



<?php 

}

?>

