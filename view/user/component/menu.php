<div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $site->getHost(); ?>">WebSiteName</a>
            </div>
            <!-- /.navbar-header -->
            <div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<?php 
	$ret=$GLOBALS['db']->GetData('*','main_menu','TRUE',"ORDER BY `order` ASC");
	foreach ($ret as $row) {
		$ret2=$GLOBALS['db']->GetData('*','sub_menu',"m_menu_id='".$row['m_menu_id']."'"," ORDER BY `m_menu_id`, `order` ASC");
		if($ret2){
				?>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $row['m_menu_link']; ?>"><?php echo $row['m_menu_name']; ?><span class="caret"></span></a>
				<ul class="dropdown-menu">
		<?php
			foreach ($ret2 as $row2) {
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
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <?php
                    include_once 'view/user/component/message.php';
                    ?>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <?php
                    include_once 'view/user/component/task.php';
                    ?>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <?php
                    include_once 'view/user/component/alert.php';
                    ?>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>