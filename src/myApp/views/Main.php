
<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>

<a href="/<?= APP ?>/profile"><?= substr($_SESSION['user']->id, 6) ?></a> 

<a href="/<?= APP ?>/logout" style="float: right;">Sign out</a>


<div style="width: 100%;">
<div style="position: relative;right: 50%;float: right;">
<nav style="position: relative;right: 50%;left: 50%;float: left;">
	<ul>
		<li style="background-color: #f3f3f3;"><a href="/<?= APP ?>">Home</a></li>
		<li><a href="/<?= APP ?>/posts">Post</a></li>
	<ul>
</nav>

</div>
</div>


<div style="margin: 200px auto 0;text-align: center;">
	
<form action="/<?= APP ?>/search" id="searchForm">
	<input name="q" type="search" value="color=blue&color=red&theme=punk | color=yellow&theme=raw" 
	style="width: 600px;height: 27px;padding-left: 7px;font-size: 16px;margin-bottom: 10px;">
	<br>
	<input type="submit" value="Search" style="height: 27px;">
</form>
<br>
<div style="width: 700px;text-align: left;padding: 5px;margin: 10px auto; border: thin solid gray;">
	<p>Search queries are formed by key-value pairs:<br>
	ex: <b><em>color=blue</em></b> finds all contents that have <b>blue</b> as a <b>color</b> keyword<br></p>
	<p>Then you can combine several queries with <b>AND</b>:<br>
	ex: <b><em>color=blue & theme=punk</em></b> finds all contents with both conditions verified<br></p>
	<p>or with <b>OR</b>:<br>
	ex: <b><em>color=blue | theme=punk</em></b> finds all contents with one of the conditions verified</p>
	
	<p><u>note:</u> This is for demo, in practise, key will be set in an application and bound to a model. A user will set values</p>

</div>
<div style="text-align: center;"><a href="http://138.96.242.20/wiki/indexes" >API documentation</a></div>

<? include 'parts/footer.php'; ?>
