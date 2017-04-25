<?php
require_once 'bookPDO.php';
if(isset($_GET['condition']) && (isset($_GET['searchparam']))){
	$condition = $_GET['condition'];
	$param = $_GET['searchparam'];
	
	try{
		
		$bookhandler = new bookPDO();
		$result = $bookhandler->findBooksWithParams($condition,$param);
		print(json_encode($result));
	
	}catch(Exception $error){
		print("An error has occurred :<(");
	}
}else if(isset($_GET['genre'])){
	try{
	
		$genre = $_GET['genre'];
		
		$bookhandler = new bookPDO();
		$result = $bookhandler->findBooksByGenre($genre);
		print(json_encode($result));
		
	}catch(Exception $error){
		print("An error has occurred :<(");
	}

	
}else{	


try{
	
	$bookhandler = new bookPDO();
	//$result = $bookhandler->findsBooksWithParams($condition,$param) ;
	$result = $bookhandler->listAllBooks() ;
	
	
	//print(json_encode($sentparams));
	print(json_encode($result));
}catch(Exception $error){
	print("An error has occurred :<(");
}
}

?>

