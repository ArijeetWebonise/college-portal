<?php
	require_once 'SMTPSClass.php';
	$smtp=array(
		'host'=>'smtp.gmail.com',
		'SMTPAuth' => true,
		'Username' => 'arijeet.baruah@weboniselab.com',
		'Password' => '2708Anchit1@3',
		'SMTPSecure' => 'tls',
		'Port' => 587,
		'From' => array('address'=>'admin@weboniselab.com','name' => 'No-Reply')
	);
	$mail=PHPMailerFacade::createPHPMailer($smtp);

	$mail->AddAddress('arijeetbaruah@rediffmail.com','Arijeet');

	$mail->compose('TestMail','This is Test','this is test');

	var_dump($mail->send());
?>
