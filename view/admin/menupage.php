<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
			</button>
			<a class="navbar-brand" href="#">WebSiteName</a>
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<?php 
	$ret=$GLOBALS['db']->GetData('*','main_menu','TRUE'," ORDER BY `m_menu_id`,`order` ASC");
	while ($row=$GLOBALS['db']->fetch($ret)) {
		$ret2=$GLOBALS['db']->GetData('*','sub_menu',"m_menu_id='".$row['m_menu_id']."'"," ORDER BY `order` ASC");
		if($ret2){
				?>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $row['m_menu_link']; ?>"><?php echo $row['m_menu_name']; ?><span class="caret"></span></a>
				<ul class="dropdown-menu">
		<?php
			while ($row2=$GLOBALS['db']->fetch($ret2)) {
				?>
					<li><a href="<?php echo $row2['s_menu_link']; ?>"><?php echo $row2['s_menu_name']; ?></a></li>
				<?php } ?>
				</ul>
				</li>
			<?php
		}else{
			?>
			<li><a href="<?php echo $row['m_menu_link']; ?>"><?php echo $row['m_menu_name']; ?></a></li>
			<?php
		}
		?>
		<?php
	}
				?>
			</ul>
			<div class="navbar-form navbar-left">
				<div class="input-group">
					<input type="text" class="form-control" id="search" placeholder="Search">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</div> 
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo $site->getHost(); ?>/login/student"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				<li><a href="<?php echo $site->getHost(); ?>/register/student"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
			</ul>
		</div>
	</div>
</nav>
