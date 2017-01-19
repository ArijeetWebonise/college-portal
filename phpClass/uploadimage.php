<?php
/**
* UploadManager
*/
class UploadManager
{
	public function checkFake($file)
	{
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES[$file]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				return TRUE;
			}
			echo "File is not an image.";
			return FALSE;
		}
		return FALSE;
	}

	public function checkExists($target_file)
	{
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			return FALSE;
		}
		return TRUE;
	}

	public function checksize($file)
	{
		if ($_FILES[$file]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			return FALSE;
		}
		return TRUE;
	}

	public function uploadImage($file)
	{
		var_dump($file);
		$target_dir = "image/";
		$target_file = $target_dir . basename($_FILES[$file]["name"]);
		$uploadOk = TRUE;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		// Check if image file is a actual image or fake image
		$uploadOk = $this->checkFake($file);

		// Check if file already exists
		$uploadOk=$this->checkExists($target_file);

		// Check file size
		// $uploadOk=checksize($file);

		// Allow certain file formats
		$uploadOk=$this->checkformat($imageFileType);

		// Check if $uploadOk is set to 0 by an error
		if (!$uploadOk) {
			echo "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			return FALSE;
		} else {
			$this->upload($file,$target_file);
			return basename($_FILES[$file]["name"]);
		}
	}

	public function upload($file,$target_file)
	{
		if (move_uploaded_file($_FILES[$file]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES[$file]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}

	public function checkformat($imageFileType)
	{
		$list=array('jpg','jpeg','png','png', 'gif');
		$f=FALSE;
		// var_dump($imageFileType);
		foreach ($list as $ext) {
			if($imageFileType == $ext) {
				$f = TRUE;
			}
		}
		if(!$f){
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		}
		return $f;
	}
}

?>
