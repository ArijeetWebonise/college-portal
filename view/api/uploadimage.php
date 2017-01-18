<?php

function checkimage($file){
	$check = getimagesize($_FILES[$file]["tmp_name"]);
	if($check !== false) {
	    echo "File is an image - " . $check["mime"] . ".";
	    return TRUE;
	} else {
	    echo "File is not an image.";
	    return FALSE;
	}

}

function checkname($target_file)
{
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    return FALSE;
	}
	return TRUE;
}

function checkSize($file)
{
	if ($_FILES[$file][$file] > 500000) {
	    echo "Sorry, your file is too large.";
	    return FALSE;
	}
	return TRUE;
}

function FunctionName($imageFileType)
{
	$permitedformat=array('jpg','png','jpeg','gif','tiff','exif');
	foreach ($permitedformat as $pf) {
		if($imageFileType != $pf ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    return FALSE;
		}
	}
	return TRUE;
}

function uploadimage($file){
	$target_dir = "image/";
	$target_file = $target_dir . basename($_FILES[$file]["name"]);
	$uploadOk = TRUE;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	// Check if image file is a actual image or fake image
	$uploadOk=checkimage($file);

	// Check if file already exists
	$uploadOk=checkname($target_file);

	// Check file size
	$uploadOk=ckeckSize($file);

	// Allow certain file formats
	$uploadOk= checkFormat();

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["newimage"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["newimage"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}
?>