<?php 
    function addBtn(){
        ?><div class="btn-group">
            <button type="submit" class="btn btn-default submitbtn">Submit</button>
        </div><?php
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Quiz</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jquery for maximum compatibility -->
    <script src="<?php echo $site->gethost(); ?>/js/addquiz.js"></script>
</head>
<body>
<?php getnav(); ?>
    <div id="frame" class="container">
        <div class="form-group">
            <label>Quiz Name</label>
            <input type="text" name="qname" class="form-control" id="name">
        </div>
        <div class="form-group">
            <label>Duration</label>
            <input type="text" name="duration" class="form-control" id="duration">
        </div>
        <?php addBtn(); ?>
    </div>
</body>
</html>
