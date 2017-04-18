<?php
class Book {
	private static $errorlist = array (
			- 1 => "&cross; Unknown error!",
			0 => "",
			1 => "&cross; This field cannot be empty.",
			3 => "&cross; A maximum of 40 characters are allowed in this field.",
			4 => "&cross; This field cannot contain Nordic letters or special characters.",
			5 => "&cross; Expletives are disallowed.",
			6 => "&cross; Viable genres are Horror, Fantasy, Thriller, Drama, Romance, Satire and Science.",
			7 => "&cross; Provide a valid date in the format 'dd.MM.yyyy'.",
			8 => "&cross; Please enter a valid email address. (ie. johndoe@mail.com)",
			9 => "&cross; Publication date cannot be in the past."
	
	);
		
	
	private $title;
	private $author;
	private $genre;
	private $synopsis;
	private $contactemail;
	private $publicationdate;
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
	private static $genres = array (
			'thriller',
			'horror',
			'fantasy',
			'drama',
			'romance',
			'satire',
			'science'
	);
	
	function __construct($title = "", $author = "", $genre = "", $synopsis = "", $contactemail = "", $publicationdate = "") {
		$this->title = trim ( $title );
		$this->author = trim ( $author );
		$this->genre = trim ( $genre );
		$this->synopsis = trim ( $synopsis );
		$this->contactemail = trim ( $contactemail );
		$this->publicationdate = trim ($publicationdate );
	}
	
	
	public function setTitle($title) {
		$this->title = trim ( $title );
	}
	public function getTitle() {
		return $this->title;
	}
	
	//Tarkistaa, ettei syöte sisällä ääkkösiä, erikoismerkkejä ja tiettyjä kirosanoja
	
	public function checkTitle($required = true, $min = 1, $max = 40) {
		
		foreach ( self::$expletives as $word ) {
			preg_match ( "#\b" . $word . "\b#",  mb_strtolower($_POST['title']), $matches );
			if (! empty ( $matches ))
				return 5;
		}
		
		if (preg_match ( "/[Ã¶Ã¥Ã¤\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:\<\>,\.\?]/i", $this->title )) {
			return 4;
		}
		
		if ($required == true && strlen ( $this->title ) == 0) {
			return 1;
		}
		
		if (strlen ( $this->title ) > $max) {
			return 3;
		}
		
		else{return 0;}
	}
	public function setAuthor($author) {
		$this->author = trim ( $author );
	}
	public function getAuthor() {
		return $this->author;
	}
	
	//Tarkistaa, ettei syöte sisällä ääkkösiä, erikoismerkkejä, tiettyjä kirosanoja ja on alle 40 merkkiä pitkä
	
	public function checkAuthor($required = true, $max = 40) {
		
		foreach ( self::$expletives as $word ) {
			preg_match ( "#\b" . $word . "\b#", mb_strtolower($_POST ['author']), $matches );
		
			if (! empty ( $matches ))
				return 5;
		}
		
		if ($required == true && strlen ( $this->author ) == 0) {
			return 1;
		}
		
		if (strlen ( $this->author ) > $max) {
			return 3;
		}
		
		if (preg_match ( "/[Ã¶Ã¥Ã¤\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:\<\>,\.\?]/i", $this->author )) {
			return 4;
		}
		else{return 0;}
	}
	public function setGenre($genre) {
		$this->genre = trim ( $genre );
	}
	public function getGenre() {
		return $this->genre;
	}
	
	//Tarkistaa, että syöte vastaa yhtä valideista genreistä. "Tosielämässä" toteutettaisiin esim dropdown-valikolla
	
	public function checkGenre() {
		if (in_array(mb_strtolower($_POST ['genre']), self::$genres)){
				return 0;
		}else{
					return 6;
				}
		
	}
	
	public function setPublicationDate($publicationdate) {
		$this->publicationdate = trim ( $publicationdate );
	}
	public function getPublicationDate() {
		return $this->publicationdate;
	}
	
	//Tarkistaa, että pvm on oikeassa muodossa, on validi (ei esim 99.09.9999) eikä ole menneisyydessä
	
	public function checkPublicationDate(){
	
		
		if(!preg_match("^[0-3][0-9].[0-1][0-9].[0-9]{4}$^", $_POST['publicationdate'])){
			return 7;
		}
		
		
		$date = date_parse($_POST['publicationdate']);
		
		if (!checkdate($date['month'], $date['day'], $date['year'])) {
			return 7;
		}
		
		$currentdate=date_create();		
		$pubdate = date_create_from_format('d.m.Y', $_POST['publicationdate']);		
		
		if($currentdate -> getTimestamp() > $pubdate -> getTimestamp()){
			return 9;
		}
		
		else{return 0;}
		
	}
	
	public function setSynopsis($synopsis) {
		$this->synopsis = trim ( $synopsis );
	}
	
	public function getSynopsis(){ 
		return $this->synopsis;
	}
	
	//Tarkistaa, ettei syöte sisällä ääkkösiä, erikoismerkkejä, tiettyjä kirosanoja ja on korkeintaan 200 merkkiä
	
	public function checkSynopsis($max = 200) {
		
		foreach ( self::$expletives as $word ) {
			preg_match ( "#\b" . $word . "\b#", mb_strtolower($_POST ['synopsis']), $matches );
			if (! empty ( $matches ))
				return 5;
		}
		
		if (strlen ( $this->synopsis ) > $max) {
			return 3;
		}
		
		if (preg_match ( "/[Ã¶Ã¥Ã¤\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:\<\>,\.\?]/i", $this->synopsis )) {
			return 4;
		}
		
		else{
			return 0;
		}
		
	
	}
	public function setContactEmail($contactemail) {
		$this->contactemail = trim ( $contactemail );
	}
	public function getContactEmail() {
		return $this->contactemail;
	}
	
	//Tarkistaa, ettei syöte on validi email (tuon filtterin avulla) ja ettei se ole yli 40 merkkiä pitkä
	public function checkContactEmail($required = true, $max = 40) {
		
		if (strlen ( $this->contactemail ) > $max) {
			return 3;
		}
		
		if(!filter_var($_POST['contactemail'], FILTER_VALIDATE_EMAIL)){
			return 8;
		}
		
		else{return 0;}
		
	}
	public function getError($errorcode) {
		
		if (isset ( self::$errorlist [$errorcode] ))		
			return self::$errorlist [$errorcode];
		
	}
}
?>