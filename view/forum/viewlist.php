<html>
<head>
	<title>
		<?php echo $site->getTitle(); ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/main.css">
</head>

<body>
	<?php getnav(); ?>
<?php
$tbl_name="forum_question"; // Table name 

$result=$GLOBALS['db']->GetData("*",$tbl_name);
?>
<div class="container">
	<table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" class="table table-striped table-bordered table-hover">
		<tr>
			<td width="6%" align="center"><strong>#</strong></td>
			<td width="53%" align="center"><strong>Topic</strong></td>
			<td width="15%" align="center"><strong>Views</strong></td>
			<td width="13%" align="center"><strong>Replies</strong></td>
			<td width="13%" align="center"><strong>Date/Time</strong></td>
		</tr>

		<?php
		// Start looping table row
		while($rows=$GLOBALS['db']->fetch($result)){
		 
		?>
		<tr>
			<td><?php echo $rows['id']; ?></td>
			<td><a href="<?php echo $site->getHost(); ?>/forum/view/<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
			<td align="center"><?php echo $rows['view']; ?></td>
			<td align="center"><?php echo $rows['reply']; ?></td>
			<td align="center"><?php echo $rows['datetime']; ?></td>
		</tr>

		<?php
		// Exit looping and close connection 
		}
		?>

		<tr>
			<td colspan="5" align="right"><a href="<?php echo $site->getHost(); ?>/forum/create"><strong>Create New Topic</strong> </a></td>
		</tr>
	</table>
</div>
</Body>
</html>
