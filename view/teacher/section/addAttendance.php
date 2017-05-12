<?php 
	$classes=$GLOBALS['db']->GetData("*","classes"); 
?>
<div class="container">
	<form action="<?php echo $site->getHost(); ?>/teacher/addattendance2" method="post">
		<div class="form-group">
			<label>Class</label>
			<select class="form-control" type="text" name="class">
				<option>Select Class</option>
				<?php 
				foreach ($classes as $clas) {
					?>
					<option value="<?php echo $clas['Subject_id']; ?>"><?php echo $clas['Subject']; ?></option>
					<?php
				}
				?>
			</select>
		</div>
		<div class="form-group">
			<label>Date</label>
			<input type="Date" name="dateofattendance" class="form-control">
		</div>
		<div class="form-group">
			<label>Period</label>
			<input type="number" name="period" class="form-control">
		</div>
		<div class="form-group">
			<input type="submit" name="submit">
		</div>
	</form>
</div>
