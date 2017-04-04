<?php
	function student(){
		?>
		<input name="usertype" type="hidden" id="user" value="student">
		<div class="form-group">
			<input class="form-control" placeholder="E-mail" name="id" type="email" autofocus>
		</div>
		<div class="form-group">
			<input class="form-control" placeholder="Password" name="password" type="password" value="">
		</div>
		<div class="form-group">
			<input class="form-control" placeholder="PRN" name="PRN" type="number" value="">
		</div>
<?php
	}

	function parent(){
		?>
	<input name="usertype" type="hidden" id="user" value="parent">
	<div class="form-group">
		<input name="id" type="mobile" placeholder="Mobile Number" class="form-control" id="mobile">
	</div>
	<div class="form-group">
		<input name="password" type="password" placeholder="Password" class="form-control" id="password">
	</div>
	<div class="form-group">
		<input name="prn" type="number" placeholder="PRN" class="form-control" id="prn">
	</div><?php
	}

	function teacher(){
		?>
	<input name="usertype" type="hidden" id="user" value="teacher">
	<div class="form-group">
		<input name="id" type="email" placeholder="Email address" class="form-control" id="email">
	</div>
	<div class="form-group">
		<input name="password" type="password" placeholder="Password" class="form-control" id="password">
	</div>
	<div class="form-group">
		<input name="prn" type="number" placeholder="EnRol Number" class="form-control" id="eno">
	</div><?php
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title><?php echo $site->getTitle(); ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="http://localhost/css/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://localhost/css/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<div class="login-panel panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Please Sign In</h3>
			</div>
			<div class="panel-body">
				<form method="post" action="<?php echo $site->getHost(); ?>/page/loginsubmit" id="loginform" role="form">
					<fieldset>
		<?php 
		if(isset($_REQUEST['id'])){
			if(function_exists($_REQUEST['id'])){
				$_REQUEST['id']();
			} else{
				header("Location: ".$site->getHost()."/page/login");
				die();
			}
		}else{
			student();
		}
		?>
		<!-- Change this to a button or input when using this as a form -->
		<button type="Submit" class="btn btn-lg btn-success btn-block">Login</button>
				</fieldset>
				</form>
			</div>
		</div>
	</div>
</div>
   <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/css/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="http://localhost/css/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/css/dist/js/sb-admin-2.js"></script>
</body>
</html>
