<?php 
	$attendance=Attendance::GetAttendanceList();
?>
<div class="container">
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>PRN</th>
				<th>Date Of Class</th>
				<th>Period</th>
				<th>Attendance</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($attendance as $atten) {
				?>
			<tr>
				<td><?php echo $atten['name']; ?></td>
				<td><?php echo $atten['prn']; ?></td>
				<td><?php echo $atten['Date Of Class']; ?></td>
				<td><?php echo $atten['period']; ?></td>
				<td><input type="checkbox" disabled <?php echo $atten['attendance']=='1'?'checked':''; ?>></td>
			</tr>
				<?php
			} ?>
		</tbody>
	</table>
</div>
