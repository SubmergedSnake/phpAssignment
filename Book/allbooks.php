<?php
require_once "book.php";
require_once "bookPDO.php";
session_start ();


if(isset($_GET['delthis'])){
	
	try {
		$bookhandler = new bookPDO();
		$books = $bookhandler-> deleteBook($_GET['delthis']);
		
	} catch (Exception $error) {
		print ($error ->getMessage());
	}
	
	
}


try {
	
	$bookhandler = new bookPDO();
	
	$books = $bookhandler-> listAllBooks();
	$_SESSION['books'] = $books;
	session_write_close ();
	
} catch (Exception $error) {
	print ($error ->getMessage());
}

?>

<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="../Images/favicon.ico" />
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Handlee"
	rel="stylesheet">
<link rel="stylesheet" href="../Styles/globalstyles.css">
<link rel="stylesheet" href="../Styles/table.css">
<title>The Fine Print</title>

</head>
<body>
	<div class="main">
		
		<header>
			<h2>
				All books <small><i class="fa fa-database" aria-hidden="true"></i></small>
			</h2>
			<nav class="subnav">
				<li><a class="arrow" href="submitbook.php " class="nav">Submit a new book</i></a></li>
				
				<li><a class="arrow" href="settings.php " class="nav">Settings</a></li>
				<li><a class="arrow" href="search.php " class="nav">Search</a></li>

			</nav>
		</header>

<div id="tablecontainer">

<table>
<col style="width:15%">
        <col style="width:15%">
        <col style="width:10%">
        <col style="width:10%">
        <col style="width:10%">
        <col style="width:10%">
        <col style="width:5%">
       
<tr id="lgtable"><th>Title</th><th>Author</th><th>Genre</th><th style="word-wrap:normal;font-size:1em">Publication date</th><th>Contact email</th><th>Synopsis</th></tr>
<tr id="smtable"><th>T</th><th>A</th><th>G</th><th style="word-wrap:normal;font-size:1em">PD</th><th>CE</th><th>S</th></tr>
<?php foreach($_SESSION['books'] as $book){
echo('<tr><td>' . $book ->getTitle() . '</td><td>' . $book ->getAuthor()
		. '</td><td>' . $book ->getGenre() . '</td><td>' . date("d.m.Y", strtotime($book ->getPublicationDate())) . '</td>
<td>' . $book ->getContactEmail() . '</td><td>' . $book ->getSynopsis().'</td>
<td class="delbtntd"><button type="button"><a href="allbooks.php?delthis='.$book->getId().'"><i class="fa fa-trash" aria-hidden="true">
</i></a></button></td></tr>');
}?>
</table>





</div>
	</div>
	
	
	
	<div id="user">
	<a href="/Eta1/Book" class="glowhome"><i
			class="fa fa-home" aria-hidden="true"></i></a>
			<p id="pipe">&verbar;</p>
			
<h4 id="cookiename" >




  
 
<?php

if (isset($_COOKIE["username"])) {
 $usernames = explode(" ", $_COOKIE["username"]);
 print($usernames[0]);
}
?>

<span id="usertooltip"><span>Full username:</span><?php foreach($usernames as $name){
print(" " . $name);
}?><br><span>Logged in since: <?php if(isset($_COOKIE['logintime'])){ print ($_COOKIE["logintime"]);}?></span></span>
</h4>




			<div style="clear: both;"></div>
</div>


<script src="../Jscript/dashboard.js">
</script>
	
</body>
</html>