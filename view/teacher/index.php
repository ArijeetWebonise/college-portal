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

        <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php
            include_once 'view/'.$_REQUEST['type'].'/component/menu.php';
            ?>
            <!-- /.navbar-top-links -->

            <?php 
            include_once 'view/'.$_REQUEST['type'].'/component/sidebar.php'; 
            ?>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <?php  
                if(!isset($_REQUEST['method'])){
                    include_once 'view/'.$_REQUEST['type'].'/dashboard.php'; 
                    ?>
    <!-- Morris Charts JavaScript -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script src="http://localhost/css/data/morris-data.js"></script>
                    <?php
                }
                else{
                    if(file_exists('model/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'.php')){
                        include_once 'model/'.$_REQUEST['type'].'/'.$_REQUEST['method'].'.php';
                    }
                    include_once 'view/'.$_REQUEST['type'].'/section/'.$_REQUEST['method'].'.php'; 
                }
            ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <!-- Metis Menu Plugin JavaScript -->
    <script src="http://localhost/css/vendor/metisMenu/metisMenu.min.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="http://localhost/css/dist/js/sb-admin-2.js"></script>

</body>

</html>
