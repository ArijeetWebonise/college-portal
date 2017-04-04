<?php
	$db=$GLOBALS['db'];

	/**
	* Model Class for Page
	*/
	class Model implements ModelObserver
	{
		public $id;
		public $topic;
		public $detail;
		public $datetime;
		public $view;
		public $reply;
		public $prn;
		public $answer;
	
		public function GetData(){
			$list=array(
				'id'=>$this->id,
				'topic'=>$this->topic,
				'detail'=>$this->detail,
				'datetime'=>$this->datetime,
				'view'=>$this->view,
				'reply'=>$this->reply,
				'prn'=>$this->prn,
				'answer'=>$this->answer
				);
			return $list;
		}

		public function SetData($list){
			$this->id=$list['id'];
			$this->topic=$list['topic'];
			$this->detail=$list['detail'];
			$this->datetime=$list['datetime'];
			$this->view=$list['view'];
			$this->reply=$list['reply'];
			$this->prn=$list['prn'];
			$ret=$GLOBALS['db']->GetData('*','forum_answer',"`question_id`='".$list['id']."'");
			$this->answer=$ret;
		}
	}

	if(isset($_REQUEST['id'])){
		$mod=new Model();
		$ret=$db->GetData('*','forum_question',"id='".$_REQUEST['id']."'");
		$mod->SetData($ret[0]);
	}else{
		$ret=$db->GetData('*','forum_question');
		$list=array();
		foreach ($ret as $val) {
			$mod=new Model();
			$mod->SetData($val);
			array_push($list, $mod);
		}
	}
?>
