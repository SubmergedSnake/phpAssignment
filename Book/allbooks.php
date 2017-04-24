<?php
require_once "book.php";
require_once "bookPDO.php";
session_start ();

if (isset ( $_GET ['delthis'] )) {
	
	try {
		$bookhandler = new bookPDO ();
		$books = $bookhandler->deleteBook ( $_GET ['delthis'] );
	} catch ( Exception $error ) {
		echo ($error->getMessage ());
	}
}

if (isset ( $_GET ['viewthis'] )) {
	
	try {
		$bookhandler = new bookPDO ();
		$viewbook = $bookhandler->getBook ( $_GET ['viewthis'] );
		
		echo ('<script>viewBook();</script>');
	} catch ( Exception $error ) {
		echo ($error->getMessage ());
	}
}

try {
	
	$bookhandler = new bookPDO ();
	
	$books = $bookhandler->listAllBooks ();
	$_SESSION ['books'] = $books;
	session_write_close ();
} catch ( Exception $error ) {
	echo ($error->getMessage ());
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

		<div class="twothirds">
			<div id="tablecontainer">
				<table>
					<col style="width: 15%">
					<col style="width: 15%">
					<col style="width: 5%">
					<col style="width: 5%">


					<tr id="lgtable">
						<th class="bold">Title</th>
						<th class="bold">Author</th>
						<th>Inspect</th>
						<th>Delete</th>
						<!--<th>Contact email</th><th>Synopsis</th>-->
					</tr>
					<tr id="smtable">
						<th>Title</th>
						<th>Author</th>
						<th>i</th>
						<th>d</th>
					</tr>
<?php

foreach ( $_SESSION ['books'] as $book ) {
	echo ('<tr><td>' . $book->getTitle () . '</td><td>' . $book->getAuthor () . '</td>' . 
	
	// . $book ->getGenre() . '</td><td>' . date("d.m.Y", strtotime($book ->getPublicationDate())) . '</td>
	// <td>' . $book ->getContactEmail() . '</td><td>' . $book ->getSynopsis().'</td>
	'<td class="delbtntd"><a style="color:#00ff00;" href="allbooks.php?viewthis=' . $book->getId () . '"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
<td class="delbtntd"><a style="color:#ff8080;" href="allbooks.php?delthis=' . $book->getId () . '"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>');
}
?>
</table>

			</div>
		</div>


		<div class="onethird">
<?php
if (! empty ( $viewbook )) {
	echo ("<h4><strong>Book details</strong> </h4>");
	echo ("<p><strong>Title</strong> &zigrarr; " . "<span class='err'>" . $viewbook->getTitle () . "</span>" . "</p>");
	echo ("<p><strong>Author</strong> &zigrarr; " . "<span class='err'>" . $viewbook->getAuthor () . "</span>" . "</p>");
	echo ("<p><strong>Genre</strong> &zigrarr; " . "<span class='err'>" . $viewbook->getGenre () . "</span>" . "</p>");
	echo ("<p><strong>Publication date</strong> &zigrarr; " . "<span class='err'>" . date ( "d.m.Y", strtotime ( $book->getPublicationDate () ) ) . "</span>" . "</p>");
	echo ("<p><strong>Contact email</strong> &zigrarr; " . "<span class='err'>" . $viewbook->getContactEmail () . "</span>" . "</p>");
	echo ("<p><strong>Synopsis</strong> &zigrarr; " . "<span class='err'>" . $viewbook->getSynopsis () . "</span>" . "</p>");
}
?>
</div>






	</div>



	<div id="user">
		<a href="/Eta1/Book" class="glowhome"><i class="fa fa-home"
			aria-hidden="true"></i></a>
		<p id="pipe">&verbar;</p>

		<h4 id="cookiename">




  
 
<?php

if (isset ( $_COOKIE ["username"] )) {
	$usernames = explode ( " ", $_COOKIE ["username"] );
	echo ($usernames [0]);
}
?>

<span id="usertooltip"><span>Full username:</span><?php

foreach ( $usernames as $name ) {
	echo (" " . $name);
}
?><br>
			<span>Logged in since: <?php if(isset($_COOKIE['logintime'])){ echo ($_COOKIE["logintime"]);}?></span></span>
		</h4>




		<div style="clear: both;"></div>
	</div>

	<script>
	function viewBook(){
		document.getElementById("viewbook").style.display = "block";
	};	
	</script>




	<script src="../Jscript/dashboard.js">
</script>

</body>
</html>