<?php
require_once "book.php";
session_start();


if (isset ( $_POST ["bookit"])) {
	$book = new Book ( $_POST ["title"], $_POST ["author"], $_POST ["genre"], $_POST ["synopsis"], $_POST ["contactemail"], $_POST ["publicationdate"] );
	
	// Tarkastetaan kentät
	$titleerror = $book->checkTitle ();
	$authorerror = $book->checkAuthor ();
	$genreerror = $book->checkGenre ();
	$emailerror = $book->checkContactEmail ();
	$synopsiserror = $book->checkSynopsis ();
	$publicationdateerror = $book->checkPublicationDate();
	
	$successmessage = "";
	
	$haserrors = 0;
	
	$errors = array(
			$titleerror,
			$authorerror,
			$genreerror,
			$emailerror,
			$synopsiserror,
			$publicationdateerror
	);
	
	$haserrors;
	foreach($errors as $error){
		$haserrors += $error;
	}
	
	if($haserrors == 000000){
		
		$_SESSION["book"] = $book;
		session_write_close();
		header("location: bookdetails.php");
		exit;
		
	}
	
	
}elseif (isset($_POST["cancel"])) {
	unset($_SESSION["book"]);
	header("location: index.php");
	exit;
	
}else {

	if (isset($_SESSION["book"])) {
		$book = $_SESSION["book"];
	} else {
		$book = new Book();
	}
	
	$titleerror = 0;
	$authorerror = 0;
	$genreerror = 0;
	$emailerror = 0;
	$publicationdateerror = 0;
	$synopsiserror = 0;
	
	
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
<title>The Fine Print</title>

</head>
<body>
	<div class="main">
		<a href="/Eta1/Book" style="float: right;" class="glowhome"><i
			class="fa fa-home" aria-hidden="true"></i></a>
		<header>
			<h2>
				Submit a new book <small> <i class="fa fa-book" aria-hidden="true"></i></small>
			</h2>
			<nav class="subnav">
				<li><a class="arrow" href="submitbook.php " class="nav">Submit a new book</i></a></li>
				<li><a class="arrow" href="allbooks.php " class="nav">All books</a></li>
				<li><a class="arrow" href="settings.php " class="nav">Settings</a></li>

			</nav>
		</header>


		<form action="submitbook.php" method="POST" class="padtop1" autocomplete="off">
			<h3>
				<small>&rarrhk; </small>Enter details for your book submission
			</h3>
			<p>
				<label class="tooltip"><span class="tooltiptext">What is the name of
						this book?</span>Title<small class="right">&ImaginaryI;</small></label> <input placeholder="&sstarf;" type="text" name="title"
					value="<?php print(htmlentities($book->getTitle(), ENT_QUOTES, "UTF-8"))?>">

     <?php
					print ("<span class='err'> " . $book->getError ( $titleerror ) . "</span>") ;
					?> 
</p>

			<p>
				<label class="tooltip"><span class="tooltiptext">Who wrote this
						book?</span>The author<small class="right">&ImaginaryI;</small></label> <input placeholder="&sstarf;" type="text" name="author"
					value="<?php print(htmlentities($book->getAuthor(), ENT_QUOTES, "UTF-8"))?>">
   <?php
			print ("<span class='err'> " . $book->getError ( $authorerror ) . "</span>") ;
			?> 
</p>
			<p>
				<label class="tooltip"><span class="tooltiptext">Which genre does
						this book belong to?</span>Genre<small class="right">&ImaginaryI;</small></label> <input placeholder="&sstarf;" type="text"
					name="genre"
					value="<?php print(htmlentities($book->getGenre(), ENT_QUOTES, "UTF-8"))?>">
    
       <?php
							print ("<span class='err'> " . $book->getError ( $genreerror ) . "</span>") ;
							?> 
</p>

			<p>
				<label class="tooltip"><span class="tooltiptext">An email address,
						in case we need to contact you</span>Email<small class="right">&ImaginaryI;</small></label> <input
					placeholder="&sstarf;" type="text" name="contactemail"
					value="<?php print(htmlentities($book->getContactEmail(), ENT_QUOTES, "UTF-8"))?>">
    
       <?php
							print ("<span class='err'> " . $book->getError ( $emailerror ) . "</span>") ;
							?> 
</p>

		<p>
				<label class="tooltip"><span class="tooltiptext">When do you want your book published?
						</span>Publication date<small class="right">&ImaginaryI;</small></label> <input type="text" placeholder="&sstarf;" name="publicationdate"
					value="<?php print(htmlentities($book->getPublicationDate(), ENT_QUOTES, "UTF-8"))?>">

     <?php
					print ("<span class='err'> " . $book->getError ( $publicationdateerror ) . "</span>") ;
					?> 
</p>


			<p>
				<label class="tooltip"><span class="tooltiptext">A short summary of
						the book</span>Synopsis<small class="right">&ImaginaryI;</small></label>
				<textarea type="text" style="margin-bottom: 1em" name="synopsis"><?php print(htmlentities($book->getSynopsis(), ENT_QUOTES, "UTF-8"))?></textarea>
    
       <?php
							print ("<span class='err'> " . $book->getError ( $synopsiserror ) . "</span>") ;
							?> 
</p>


			<div style="clear: both;"></div>
			<br>
 
 <div >
			<button type="submit" class="submit" name="bookit">
			<i class="fa fa-book" aria-hidden="true"></i>
				Publish...
			</button>
			
			<button type="submit" class="cancel" name="cancel"><i class="fa fa-ban" aria-hidden="true"></i> Cancel </button>
			</div>
		
		</form>





	</div>
	
	<footer>
<h4 id="user">
<i class="fa fa-user" aria-hidden="true"></i>
<?php

if (isset($_COOKIE["username"])) {
 print($_COOKIE["username"]);
}
?>
</h4></footer>
	
</body>
</html>