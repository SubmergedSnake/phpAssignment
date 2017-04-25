<?php

	try{
		require_once 'bookPDO.php';
		$bookhandler = new bookPDO();
		$result = $bookhandler->listAllBooks();
		print(json_encode($result));
	}catch(Exception $error){
		print("An error has occurred :<(");
	}

?>

