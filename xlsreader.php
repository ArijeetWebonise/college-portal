<?php require_once('header.php'); 
	require_once('phpClass/xlsClass.php'); ?>
	<div class="container">

		<table class="table table-striped">
		
<?php
	$excel=XLSReaderFacade::CreateXLSReader('Media\XLS\att_sub1.xls');
	
	echo SheettoTable($excel);
?>
		</table>
	</div>
<?php require_once('footer.php'); ?>
