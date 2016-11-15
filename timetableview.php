<?php require_once('header.php'); ?>
<?php require_once('phpClass/SQL.php'); ?>
<script src="js/timetable.js"></script>

<div class="form-group">
<select id="selectdiv" class="form-control" onchange="gettimetable(this);">
	<option value=""></option>
	<option value="comp1sem1">Comp1 sem1</option>
	<option value="comp1sem3">Comp1 sem3</option>
</select>
</div>
<div id="Current"></div>
<table id="timetable" class="table table-striped" style="border: 1px solid black; border-collapse: collapse;">
</table>
<?php require_once('footer.php'); ?>
