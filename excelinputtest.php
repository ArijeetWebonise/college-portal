<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="js/excellike.js"></script>
    <link rel="stylesheet" type="text/css" href="css/excellike.css">
</head>
<body>
    <form method="post" action="excelinputtestserver.php">
        <div class="editabletable">
            <table>
                 <?php for ($i=0; $i < 50; $i++) { 
                     ?>
                 <tr>
                 <?php for ($j=0; $j < 50; $j++) { 
                     ?>
                        <td><input type="text" name="cell<?php echo $i.'_'.$j; ?>"></td>
                     <?php
                 } ?>
                <?php ?>
                </tr>
                     <?php 
                 } ?>
            </table>
        </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>