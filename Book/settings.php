
<?php
require_once "user.php";



if(isset($_COOKIE["username"])) {
	$user = $_COOKIE["username"];
} 

if (isset ( $_POST ["insertuser"])) {
	$user = new User($_POST['username']);
	
	$usererror = $user -> checkUsername();

if(empty($usererror)){
	
	setcookie("username", $user->getUsername(), time()+(86400*7), "/");
	header("location: index.php");
	exit;

}
}
else{
	$user = new User();
	$usererror = 0;
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
				Settings <small><i class="fa fa-wrench" aria-hidden="true"></i></small>
			</h2>
			<nav class="subnav">
				<li><a class="arrow" href="submitbook.php " class="nav">Submit a new book</i></a></li>
				<li><a class="arrow" href="allbooks.php " class="nav">All books</a></li>
				<li><a class="arrow" href="settings.php " class="nav">Settings</a></li>

			</nav>
		</header>

<div class="half">
<form action="settings.php" method="POST">
<label for="username" style="width:100%;margin-bottom:1em;">Supply a user name</label>
<input type="text" name="username" value="" ><button type="submit" name="insertuser" style="float:left;margin-left:0.5em;padding:0.3em;background:#00ff00"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></button>
<?php
					print ("<div class='err'> " . $user->getUserError ($usererror ) . "</div>") ;
					?> 
</form>


</div>


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