<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#Toggle-select").click(function(e){
			e.preventDefault();
			if($("#Toggle-select").html()=="All Absent"){
				for (var i = 0; i < $('.presentradio').length; i++) {
					$($('.presentradio')[i]).attr('checked',false);
					$($('.absentradio')[i]).attr('checked',true);
					$("#Toggle-select").html("All Present");
				}
			}else{
				for (var i = 0; i < $('.presentradio').length; i++) {
					$($('.presentradio')[i]).attr('checked',true);
					$($('.absentradio')[i]).attr('checked',false);
					$("#Toggle-select").html("All Absent");
				}
			}
		});
	});
</script>
<?php 
	$classes=$GLOBALS['db']->GetData("*","classes"); 
	$accounts=$GLOBALS['db']->GetData("*","account"); 
?>
<div class="container">
	<form action="<?php echo $site->getHost(); ?>/teacher/addAttendanceServer" method="post">
		<div class="form-group">
			<label>Class</label>
			<select class="form-control" type="text" name="class">
				<option>Select Class</option>
				<?php 
				foreach ($classes as $clas) {
					?>
					<option value="<?php echo $clas['Subject_id']; ?>" <?php echo $clas['Subject_id']==$_REQUEST['class']?"selected":"" ?>><?php echo $clas['Subject']; ?></option>
					<?php
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Date</label>
			<input type="Date" name="dateofattendance" class="form-control" value="<?php echo $_REQUEST['dateofattendance'] ?>">
		</div>
		<div class="form-group">
			<label>Period</label>
			<input type="number" name="period" class="form-control" value="<?php echo $_REQUEST['period'] ?>">
		</div>
		<input type="hidden" name="studentnum" value="<?php echo count($accounts); ?>">
		<table class="table">
		<button id="Toggle-select">All Absent</button>
			<tr><th>Name</th><th>Present</th><th>Absent</th></tr>
			<tbody class="studentlist">
				<?php
					foreach ($accounts as $key => $account) {
						?>
				<tr>
					<td><?php echo $account['First Name']; ?></td>
					<td><div class="radio"><label><input type="radio" class="presentradio" name="present<?php echo $key; ?>" value="<?php echo $account['prn']; ?>" checked></label></div></td>
					<td><div class="radio"><label><input type="radio" class="absentradio" name="present<?php echo $key; ?>" value="0"></label></div></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
		<div class="form-group">
			<input type="submit" name="submit">
		</div>
	</form>
</div>
