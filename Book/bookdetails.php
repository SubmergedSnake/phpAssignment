

<?php
require_once "book.php";
session_start();

if (isset($_SESSION["book"])) {
	$book = $_SESSION["book"];
} 

if(isset($_POST["savetodb"])) {
	unset($_SESSION["book"]);
	header("location: index.php");
	exit;
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
				Book details <small><i class="fa fa-info-circle" aria-hidden="true"></i></small>
			</h2>
			
		</header>

<div class="halfleft">
<form action="bookdetails.php" method="POST">
<h3>Please review your details.</h3>
<?php
print("<p><strong>Title</strong> &zigrarr; "."<span class='err'>".$book->getTitle()."</span>"."</p>");
print("<p><strong>Author</strong> &zigrarr; "."<span class='err'>".$book->getAuthor()."</span>"."</p>");
print("<p><strong>Genre</strong> &zigrarr; "."<span class='err'>".$book->getGenre()."</span>"."</p>");
print("<p><strong>Publication date</strong> &zigrarr; "."<span class='err'>".$book->getPublicationDate()."</span>"."</p>");
print("<p><strong>Contact email</strong> &zigrarr; "."<span class='err'>".$book->getContactEmail()."</span>"."</p>");
print("<p><strong>Synopsis</strong> &zigrarr; "."<span class='err'>".$book->getSynopsis()."</span>"."</p>");
?>

 <div style="padding-top:1em" >
			<button type="submit" id="publish" name="savetodb">
				<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> Confirm 
			</button>
			
			<button type="submit" id="revise" name="revise"><i class="fa fa-sliders" aria-hidden="true"></i> Revise </button>
			</div>
</div>
</form>

	</div>
</body>
</html>