
<? include 'parts/header.php'; ?>
<? include 'parts/notifications.php'; ?>

<a href="/<?= APP ?>/profile"><?= substr($_SESSION['user']->id, 6) ?></a> 

<a href="/<?= APP ?>/logout" style="float: right;">Sign out</a>

<h1 style="text-align: center;">Main</h1>
<div style="text-align: center;"><a href="http://138.96.242.20/wiki/indexes" >API documentation</a></div>

<div style="margin: 30px auto 0;text-align: center;">

<div style="text-align: center; width: 500px; display: inline-block; margin-right: 15px;">
	<h2>Search</h2>
	
<form action="/<?= APP ?>/search" id="searchForm">
	<input name="q" type="search" value="color=blue&color=red&theme=punk | color=yellow&theme=raw" 
	style="width: 100%;height: 27px;padding-left: 7px;font-size: 16px;margin-bottom: 10px;">
	<br>
	<input type="submit" value="Search" style="height: 27px;">
</form>

<div style="text-align: left;padding: 5px;margin: 10px auto; border: thin solid gray;">
<p>Search queries are formed by key-value pairs:<br>
ex: <b><em>color=blue</em></b> finds all contents that have <b>blue</b> as a <b>color</b> keyword<br></p>
<p>Then you can combine several queries with <b>AND</b>:<br>
ex: <b><em>color=blue & theme=punk</em></b> finds all contents with both conditions verified<br></p>
<p>or with <b>OR</b>:<br>
ex: <b><em>color=blue | theme=punk</em></b> finds all contents with one of the conditions verified</p>

<p><u>note:</u> This is for demo, in practise, key will be set in an application and bound to a model. A user will set values</p>

</div>


</div>

<div style="text-align: center; width: 500px; display: inline-block;vertical-align: top;">
<h2>Post</h2>
<form action="/<?= APP ?>/posts" method="post" id="postForm">

	<input type="hidden" name="method" value="create">
	<span style="margin-left: -70px;">key (empty ones are not used)</span><span style="margin-right: 80px;"></span><span>value</span><br>

	<input type="search" name="keys[]" value="color">
	<input type="search" name="vals[]" value="blue"><br>
	
	<input type="search" name="keys[]" value="color">
	<input type="search" name="vals[]" value="red"><br>
	
	<input type="search" name="keys[]" value="theme">
	<input type="search" name="vals[]" value="punk"><br>
	<input type="button" value="+" onclick="addFields(this);">
	
	<br><br>
	<textarea name="text" rows="3" style="width:100%;">blabla.....</textarea>
	<br>
	<input type="submit" value="Post" style="height: 27px;">

</form>
</div>

</div>


<? include 'parts/footer.php'; ?>
