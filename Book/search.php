
<?php
require_once "user.php";

date_default_timezone_set('Europe/Helsinki');

if(isset($_COOKIE["username"])) {
	$user = $_COOKIE["username"];
} 

if (isset ( $_POST ["insertuser"])) {
	$user = new User($_POST['username']);
	
	$usererror = $user -> checkUsername();

if(empty($usererror)){
	
	$currenttime = date("d.m.y H:i");
	setcookie("username", $user->getUsername(), time()+(86400*7), "/");
	setcookie("logintime", $currenttime, time()+(86400*7), "/");
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
		
		<header>
			<h2>
				Search <small><i class="fa fa-search" aria-hidden="true"></i></small>
			</h2>
			<nav class="subnav">
				<li><a class="arrow" href="submitbook.php " class="nav">Submit a new book</i></a></li>
				<li><a class="arrow" href="allbooks.php " class="nav">All books</a></li>
				<li><a class="arrow" href="settings.php " class="nav">Settings</a></li>
				
				

			</nav>
		</header>

<div class="half">
<form action="settings.php" method="POST">
<h4><label for="username" style="width:100%;margin-bottom:1em;">Search for a book</label></h4>
<input type="text" style="width:70%" name="searchparam" value="" ><button type="submit"  style="float:left;margin-left:0.5em;padding:0.3em;background:#00ff00">Search <i class="fa fa-search" aria-hidden="true"></i></button>

					
					
</form>


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