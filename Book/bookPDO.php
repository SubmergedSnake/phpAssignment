<?php

require_once 'book.php';

class bookPDO {
	
	private $db;
	private $counter;
	
	function __construct($dsn = "mysql:host=localhost;dbname=a1500935", $user = "root", $password = "salainen"){
		
		$this -> db = new PDO($dsn, $user, $password);
		
		$this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		
		$this -> counter = 0;
	}
	
	function listAllBooks(){
	
		$sql = "SELECT * FROM book";
		
		$stmt = $this -> db->prepare($sql);
	
		$stmt -> execute();
		
		$books = array();
		
		while($row = $stmt->fetchObject()){
			$book=new Book();
			$book->setId($row->id);
			$book->setAuthor($row->author);
			$book->setTitle($row->title);
			$book->setGenre($row->genre);
			$book->setContactEmail($row->contactemail);
			$book->setPublicationDate($row->publicationdate);
			$book->setSynopsis($row->synopsis);
		
			$books[] = $book;
		}
		$this->counter = $stmt->rowCount();
		return $books;
		
	}
	
	
	function findBooksWithParams($condition, $param){
		

	//$sql = "SELECT * FROM book WHERE genre LIKE '%atire%'";
	$sql = "SELECT * FROM book WHERE $condition LIKE '%$param%'";
		
		$stmt = $this -> db->prepare($sql);
		
		$stmt -> execute();
		
		$books = array();
		
		while($row = $stmt->fetchObject()){
			$book=new Book();
			$book->setId($row->id);
			$book->setAuthor($row->author);
			$book->setTitle($row->title);
			$book->setGenre($row->genre);
			$book->setContactEmail($row->contactemail);
			$book->setPublicationDate($row->publicationdate);
			$book->setSynopsis($row->synopsis);
			
			$books[] = $book;
		}
		$this->counter = $stmt->rowCount();
		return $books;
		
	}
	
	function findBooksByGenre($genre){
		
	
		$sql = "SELECT * FROM book WHERE genre = :genre";
		
		$stmt = $this -> db->prepare($sql);
		
		$stmt ->bindValue(":genre", $genre, PDO::PARAM_STR);
		
		$stmt -> execute();
		
		$books = array();
		
		while($row = $stmt->fetchObject()){
			$book=new Book();
			$book->setId($row->id);
			$book->setAuthor($row->author);
			$book->setTitle($row->title);
			$book->setGenre($row->genre);
			$book->setContactEmail($row->contactemail);
			$book->setPublicationDate($row->publicationdate);
			$book->setSynopsis($row->synopsis);
			
			$books[] = $book;
		}
		$this->counter = $stmt->rowCount();
		return $books;
		
	}
	
	function addBook($book){
		
		$sql = "INSERT INTO book (title, author, genre, contactemail, publicationdate, synopsis) VALUES 
				(:title, :author, :genre, :contactemail, :publicationdate, :synopsis)";
		
		if (! $stmt = $this->db->prepare($sql)){
			$error = $this->db->errorInfo();
			throw new PDOException($error[2], $error[1]);
		}
		
		$stmt ->bindValue(":title", $book->getTitle(), PDO::PARAM_STR);
		$stmt ->bindValue(":author", $book->getAuthor(), PDO::PARAM_STR);
		$stmt ->bindValue(":genre", $book->getGenre(), PDO::PARAM_STR);
		$stmt ->bindValue(":contactemail", $book->getContactEmail(), PDO::PARAM_STR);
		$stmt ->bindValue(":publicationdate", date("Y-m-d", strtotime($book->getPublicationdate())), PDO::PARAM_STR);
		$stmt ->bindValue(":synopsis", $book->getSynopsis(), PDO::PARAM_STR);
		
		$stmt->execute();
	}


function deleteBook($id){
	
	$sql = "DELETE FROM book WHERE id = :id";
	
	if (! $stmt = $this->db->prepare($sql)){
		$error = $this->db->errorInfo();
		throw new PDOException($error[2], $error[1]);
	}
	
	$stmt ->bindValue(":id", $id, PDO::PARAM_INT);	
	$stmt->execute();
}

function getBook($id){
	
	$sql = "SELECT * FROM book WHERE id = :id";
	
	if (! $stmt = $this->db->prepare($sql)){
		$error = $this->db->errorInfo();
		throw new PDOException($error[2], $error[1]);
	}
	
	$stmt ->bindValue(":id", $id, PDO::PARAM_INT);
	$stmt->execute();
	
	$row = $stmt -> fetchObject(); 
	
	$book = new Book($row->title, $row->author, $row->genre, $row->synopsis, $row->contactemail, $row->publicationdate);
	
	return $book;
}
}

?>