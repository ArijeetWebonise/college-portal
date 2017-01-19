<?php
var_dump($_REQUEST);
var_dump($_FILES);

/**
* UpLoader
*/
class UpLoader
{
    public $uploadOk;
    public $file;
    function __construct($file)
    {
        $this->file=$file;
    }
    public function checkFake($file)
    {
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES[$file]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                return TRUE;
            } else {
                echo "File is not an image.";
                return FALSE;
            }
        }
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

    public function uploadImage()
    {
        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES[$this->file]["name"]);
        $uploadOk = TRUE;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

        // Check if image file is a actual image or fake image
        $uploadOk = checkFake($this->file);

        // Check if file already exists
        $uploadOk=checkExists($target_file);

        // Check file size
        // $uploadOk=checksize($file);

        // Allow certain file formats
        $uploadOk=checkformat($imageFileType);

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            return NULL;
        // if everything is ok, try to upload file
        } else {
            upload($this->file,$target_file);
            return basename($_FILES[$this->file]["name"]);
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
        var_dump($imageFileType);
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
