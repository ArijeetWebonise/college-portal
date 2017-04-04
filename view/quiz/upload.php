<!DOCTYPE html>
<html>
<body>
<?php
include_once 'phpClass/uploadimage.php';
if(isset($_REQUEST['submit'])){
	$file=new UploadFile('fileToUpload');
	$file->upload();
	var_dump($file);
}else{
	?>

<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

	<?php
}
?>
</body>
</html>
