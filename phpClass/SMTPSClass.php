<?php
require_once 'vender/PHPMailer/PHPMailerAutoload.php';

/**
* mailer factory
*/
class PHPMailerFactory
{
	private $mail;
	function __construct($smtp)
	{
		$this->mail=new PHPMailer;

		$this->mail->isSMTP();                                      // Set mailer to use SMTP
		$this->mail->Host = $smtp['host'];						    // Specify main and backup SMTP servers
		$this->mail->SMTPAuth = $smtp['host'];                               // Enable SMTP authentication
		$this->mail->Username = $smtp['Username'];   // SMTP username
		$this->mail->Password = $smtp['Password'];                    // SMTP password
		$this->mail->SMTPSecure = $smtp['SMTPSecure'];                            // Enable TLS encryption, `ssl` also accepted
		$this->mail->Port = $smtp['Port'];                                    // TCP port to connect to
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		$this->mail->SMTPDebug = 3;
		$this->mail->setFrom($smtp['From']['address'], $smtp['From']['name']);
		$this->mail->isHTML(true);                                  // Set email format to HTML
	}
	/*
	* Add Reciver Address to mail
	* Parameter: $address- email address of reciver, $name- name of the reciver
	*/
	public function AddAddress($address,$name){
		$this->mail->addAddress($address,$name);
	}
	
	public function compose($subject,$body,$AltBody){
		$this->mail->Subject = $subject;
		$this->mail->Body    = $body;
		$this->mail->AltBody = $AltBody;
	}

	public function addAttachment($file,$optionalname)
	{
		$this->addAttachment($file,$optionalname);	
	}

	public function send(){
		if(!$this->mail->send()) {
		    return  array('status'=>false,'error'=>$this->mail->ErrorInfo);
		} else {
		    return array('status'=>true);
		}
	}
}

/**
* PHPMailer Facade
*/
class PHPMailerFacade
{
	
	public static function createPHPMailer($smtp){
		return new PHPMailerFactory($smtp);
	}
}

?>
