<?php
	/**
	* Model Class for Page
	*/
	class Model implements ModelObserver
	{
		public $title;
		public $content;
		public static $instance;
		
		public static function CreateInstance(){
			Model::$instance=new Model();
		}

		public function GetData(){
			$list=array(
				'title' => $this->title,
				'Content' => $this->content
				);
			return $list;
		}

		public function SetData($list){
			$this->content=$list['body'];
			$this->title=$list['title'];
		}
	}

?>
