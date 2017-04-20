<?php

class User {
	
	private static $errorlist = array (
			0 => "",
			1 => "This field cannot be empty.",
			2 => "Expletives are disallowed.",
			3 => "Special characters and Vikings are not welcome."
	);
	
	private static $expletives = array (
			'shit',
			'fuck',
			'asshole',
			'schlong',
			'fucker',
			'cock',
			'pussy',
			'cock',
			'ass',
			'faggot',
			'dyke',
			'wanker'
	);
	
	private $username;
	
	function __construct($username = ""){
		$this->username = trim($username);
	}
	
	public function setUsername($username){
		$this->username = trim($username);
	}
	
	public function getUsername(){
		return $this->username;
	}
	
	public function checkUsername($required = true){
		
		foreach ( self::$expletives as $word ) {
			preg_match ( "#\b" . $word . "\b#", mb_strtolower ( $_POST ['username'] ), $matches );
			if (! empty ( $matches ))
				return 2;
		}
		
		if ($required == true && strlen ( $this->username ) == 0) {
			return 1;
		}
		
		if (preg_match ( "/[öåä\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:\<\>,\.\?]/i", $this->username )) {
			return 3;
		}
		
	}
	
	
	public function getUserError($errorcode) {
		if (isset ( self::$errorlist [$errorcode] ))
			return self::$errorlist [$errorcode];
	}
}

?>