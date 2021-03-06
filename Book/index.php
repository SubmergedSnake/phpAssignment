<?php
session_start();
unset($_SESSION["book"]);

?>

<html>
<head>



<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/x-icon" href="../Images/favicon.ico" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Handlee" rel="stylesheet">
<link rel="stylesheet" href="../Styles/globalstyles.css">
<title>The Fine Print</title>



</head>
<body>
<div class="main">

<header><h1>The Fine Print&trade;<br><small style="margin-left:2em;">&zigrarr; book depository</small></h1></header>



<div class="half">
<nav class="landingnav">
<li class="stack"><a class="arrow" href="submitbook.php"><i class="fa fa-book" aria-hidden="true"></i> Submit a new book</a></li>
<li class="stack"><a class="arrow" href="allbooks.php" ><i class="fa fa-database" aria-hidden="true"></i> All books</a></li>
<li class="stack"><a class="arrow" href="search.php" ><i class="fa fa-search" aria-hidden="true"></i> Search</a></li>
<li class="stack"><a class="arrow" href="settings.php " ><i class="fa fa-sliders" aria-hidden="true"></i> Settings</a></li>

</nav>

<nav class="mobilenav">
<li class="stack"><a class="arrow" href="submitbook.php"><i class="fa fa-book" aria-hidden="true"></i></a></li>
<li class="stack"><a class="arrow" href="allbooks.php" ><i class="fa fa-database" aria-hidden="true"></i></a></li>
<li class="stack"><a class="arrow" href="search.php " ><i class="fa fa-search" aria-hidden="true"></i></a></li>
<li class="stack"><a class="arrow" href="settings.php " ><i class="fa fa-sliders" aria-hidden="true"></i></a></li>

</nav>
</div>

<div class="half" style="padding-bottom:3.5em">
<figure style="color:white">
<img class="mediimg" src="../Images/oldreadcropped.png" alt="Time spent reading is time well spent." >
<figcaption style="padding-top:0.5em">“The books that the world calls immoral are books that show the world its own shame.” 
<br>― Oscar Wilde, The Picture of Dorian Gray</figcaption>
</figure>
</div>

<div style="clear:both;display:block"></div>



	
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




			
</div>
</div>

<script src="../Jscript/dashboard.js">
</script>

</body>


</html>