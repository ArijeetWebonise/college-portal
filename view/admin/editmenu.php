<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $site->getTitle(); ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="<?php echo $site->getHost(); ?>/js/main.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/main.css">
</head>
<body>
<?php getnav(); ?>

<ul id="sortable">
<?php 
$ret=$GLOBALS['db']->getData("*",'main_menu',"TRUE","ORDER BY `order` ASC");
while ($row=$GLOBALS['db']->fetch($ret)) {
	$ret1=$GLOBALS['db']->getData("*",'sub_menu',"`m_menu_id`='".$row['m_menu_id']."'","ORDER BY `order` ASC");
	if($ret1){
		?>
	<li id="item<?php echo $row['m_menu_id']; ?>" class="ui-state-default hasItems"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $row['m_menu_name']; ?>
		<ul class="sublist">
		<?php
		while ($row1=$GLOBALS['db']->fetch($ret1)) {
			?>
			<li id="<?php echo $row1['m_menu_id'].'_'.$row1['s_menu_id']; ?>"><?php echo $row1['s_menu_name']; ?></li>
			<?php
		}
	}else{
		?>
		</ul>
	<li id="item<?php echo $row['m_menu_id']; ?>" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $row['m_menu_name']; ?>
		<?php
	}
	?>
	</li>
	<?php
}
?>
</ul>

</body>
</html>
