<?php
/**
* UploadFile
*/
class UploadFile
{
	public $target_dir;
	public $target_file;
	public $imageFileType;
	public $filename;

	function __construct($filename)
	{
		$this->target_dir = "media/document/";
		$this->target_file = $this->target_dir . basename($_FILES[$filename]["name"]);
		$this->imageFileType = pathinfo($this->target_file,PATHINFO_EXTENSION);
		$this->filename=$filename;
	}

	public function checkImage(){
		$check = getimagesize($_FILES[$this->filename]["tmp_name"]);
		if($check !== false) {
			return TRUE;
		}
		return FALSE;
	}

	public function checkIfExcess()
	{
		if (file_exists($this->target_file)) {
			return FALSE;
		}
		return TRUE;
	}

	public function Upload(){
		if($this->checkIfExcess()){
			if (move_uploaded_file($_FILES[$this->filename]["tmp_name"], $this->target_file)) {
				return $this->target_file;
			} else {
				return FALSE;
			}
		}
		return FALSE;
	}
}
?>
