<link rel="stylesheet" type="text/css" href="<?php echo $site->getHost(); ?>/css/main.css">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script src="<?php echo $site->getHost(); ?>/js/main.js"></script>
<script type="text/javascript" src="<?php echo $site->getHost(); ?>/js/deleteitem.js"></script>

<style type="text/css">
	#sortable, .sublist{
		list-style-type: none;
	}
</style>

<div class="container">

	<ul id="sortable">
		<?php
		$ret=$GLOBALS['db']->GetData("*",'main_menu',"TRUE","ORDER BY `order` ASC");
		foreach ($ret as $row) {
		 	$ret1=$GLOBALS['db']->GetData("*",'sub_menu',"`m_menu_id`='".$row['m_menu_id']."'","ORDER BY `order` ASC");
			if($ret1){
				?>
			<li id="item<?php echo $row['m_menu_id']; ?>" class="ui-state-default hasItems"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $row['m_menu_name']; ?>
				<ul class="sublist">
				<?php
				foreach ($ret1 as $row1) {
					?>
				<li id="<?php echo $row1['m_menu_id'].'_'.$row1['s_menu_id']; ?>"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $row1['s_menu_name']; ?></li>
					<?php
				}
				?></ul><?php
			}else{
				?>
			<li id="item<?php echo $row['m_menu_id']; ?>" class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span><?php echo $row['m_menu_name']; ?>
				<?php
			}
			?>
			</li>
			<?php
		}
		?>
	</ul> 
</div>

<div class="container">
	<ul class="nav nav-pills">
		<li class="active"><a data-toggle="pill" href="#addmenu">Add Menu Item</a></li>
		<li><a data-toggle="pill" href="#editmenu">Edit Menu</a></li>
		<li><a data-toggle="pill" href="#deletemenu">Delete Menu</a></li>
	</ul>

	<div class="tab-content">
		<div id="addmenu" class="tab-pane fade in active">
			<h3>Add Menu</h3>
			<form action="addmenuserver" method="post">
				<div class="form-group">
					<label>Put In</label>
					<select name="putin" class="form-control">
						<option value="main">Main Menu</option>
						<?php
			$ret=$GLOBALS['db']->getData("*",'main_menu');
			foreach ($ret as $row) {
				?>
						<option value="<?php echo $row['m_menu_id']; ?>"><?php echo $row['m_menu_name']; ?></option>
				<?php
			}
						?>
					</select>
				</div>
				<div class="form-group">
					<label>Field Text</label>
					<input class="form-control" name="m_name" type="text" placeholder="Field Text">
				</div>
				<div class="form-group">
					<label>URL</label>
					<input class="form-control" name="m_URL" type="text" placeholder="URL">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">
						Submit
					</button>
					<button type="reset" class="btn btn-default">
						Reset
					</button>
				</div>
			</form>
		</div>
		<div id="deletemenu" class="tab-pane fade">
			<h3>Delete Menu</h3>
	<ul>
			<?php
$ret=$GLOBALS['db']->getData('*','main_menu');
foreach ($ret as $row) {
	?>
		<li><?php echo $row['m_menu_name']; ?><button class="deleteitem btn" data-object="menuremove/<?php echo $row['m_menu_id']; ?>" class="btn btn-link"><span class="glyphicon glyphicon-remove"></span></button>
		<?php 
			$ret1=$GLOBALS['db']->getData('*','sub_menu',"`m_menu_id`='".$row['m_menu_id']."'"); 
			if($ret1){
				?><ul><?php
				foreach ($ret1 as $row1) {
					?>
			<li><?php echo $row1['s_menu_name']; ?><button class="deleteitem btn" href="menuremove/<?php echo $row1['m_menu_id']; ?>-<?php echo $row1['s_menu_id']; ?>" class="btn btn-link"><span class="glyphicon glyphicon-remove"></span></a></li>
					<?php
				}
				?></ul><?php
			}
		?>
		</li>
	<?php
}
			?>
	</ul>
		</div>
		<div id="editmenu" class="tab-pane fade">
			<h3>Edit Menu</h3>
			<div class="panel-group" id="accordion">
				<?php 
$ret=$GLOBALS['db']->getData('*','main_menu','TRUE',"ORDER BY `order` ASC");
$i=1;
foreach ($ret as $row) {
$ret1=$GLOBALS['db']->getData('*','main_menu','TRUE',"ORDER BY `order` ASC");
	?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
						<?php echo $row['m_menu_name']; ?></a>
						</h4>
					</div>
					<div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
						<div class="panel-body">
							<form action="editmenuserver" method="post">
								<div class="form-group">
									<label>Contain in</label>
									<input type="hidden" name="menutype" value="mainmenu">
									<input type="hidden" name="menuid" value="<?php echo $row['m_menu_id']; ?>">
									<select class="form-control">
										<option value="main" selected="selected">Main</option>
										<?php
foreach ($ret1 as $row1) {
	?>
										<option value="<?php echo $row1['m_menu_id']; ?>"><?php echo $row1['m_menu_name']; ?></option>
	<?php
}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Menu Text</label>
									<input class="form-control" name="menuname" value="<?php echo $row['m_menu_name']; ?>">
								</div>
								<div class="form-group">
									<label>Menu URL</label>
									<input class="form-control" name="menuURL" value="<?php echo $row['m_menu_link']; ?>">
								</div>
								<div class="form-group">
									<input type="submit" name="submit">
								</div>
							</form>
						</div>
					</div>
				</div>
	<?php
	$i++;
}
$ret=$GLOBALS['db']->getData('*','sub_menu');
foreach ($ret as $row) {
$ret1=$GLOBALS['db']->getData('*','main_menu');
	?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>">
						<?php echo $row['s_menu_name']; ?></a>
						</h4>
					</div>
					<div id="collapse<?php echo $i; ?>" class="panel-collapse collapse">
						<div class="panel-body">
							<form>
								<div class="form-group">
									<label>Contain in</label>
									<input type="hidden" name="menutype" value="submenu">
									<input type="hidden" name="menuid" value="<?php echo $row['s_menu_id']; ?>">
									<select class="form-control">
										<option value="main">Main</option>
										<?php
foreach ($ret1 as $row1) {
	?>
										<option value="<?php echo $row1['m_menu_id']; ?>" <?php 
	if($row['m_menu_id']==$row1['m_menu_id']){
		echo 'selected="selected"';
	}
										?>><?php echo $row1['m_menu_name']; ?></option>
	<?php
}
										?>
									</select>
								</div>
								<div class="form-group">
									<label>Menu Text</label>
									<input class="form-control" name="menuname" value="<?php echo $row['s_menu_name']; ?>">
								</div>
								<div class="form-group">
									<label>Menu URL</label>
									<input class="form-control" name="menuURL" value="<?php echo $row['s_menu_link']; ?>">
								</div>
							</form>
						</div>
					</div>
				</div>
	<?php
	$i++;
}
				?>
			</div>
		</div>
	</div>
	
</div>
