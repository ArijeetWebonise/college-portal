<?php
	/**
	* sessionFactory
	*/
	class SessionManager
	{
		public static function setSession($target,$value){
			$_SESSION[$target]=$value;
		} 
		public static function getSession($target)
		{
			return $_SESSION[$target];
		}
		public static function destroySession()
		{
			// remove all session variables
			session_unset(); 

			// destroy the session 
			session_destroy(); 
		}
		public static function checkSession(){
			if(isset($_SESSION['prn'])){
				return FALSE;
			}
			header("location:".constant("hostname"));
		}
	}
?>
