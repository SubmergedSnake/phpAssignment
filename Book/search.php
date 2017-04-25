
<?php
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

<style>
label, input, textarea{float:none;margin-left:1em;}
form{text-align:left;}
button{margin-left:1.4em;margin-top:1em;}

</style>

</head>
<body>
	<div class="main">

		<header>
			<h2>
				Search <small><i class="fa fa-search" aria-hidden="true"></i></small>
			</h2>
			<nav class="subnav">
				<li><a class="arrow" href="submitbook.php " class="nav">Submit a new
						book</i>
				</a></li>
				<li><a class="arrow" href="allbooks.php " class="nav">All books</a></li>
				<li><a class="arrow" href="settings.php " class="nav">Settings</a></li>



			</nav>
		</header>

		<div class="half" style="float:none">
			<form action="settings.php" method="POST">
				<h4>
					Search for a book
				</h4>				
				<label class="searchlb">By Title<input type="radio" name="condition" value="title" /></label>
				 <label class="searchlb">By Author<input type="radio" name="condition" value="author" /></label>
				 
				<label style="width:100%;padding-top:0.7em;">Search params<input
					type="text" style="width: 70%" name="searchparam" value="" /></label>
					
					<button type="submit"
					style="background: #00ff00">
					Search <i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</form>



		</div>

<!--  
	<label>Search params<input
					type="text" style="width: 70%" name="searchparam" value="" /></label>
					
				<button type="submit"
					style="background: #00ff00">
					Search <i class="fa fa-search" aria-hidden="true"></i>
				</button>
-->

		<div class="padtop1 pbsides2" id="results">Results here</div>

	</div>




	<div id="user">
		<a href="/Eta1/Book" class="glowhome"><i class="fa fa-home"
			aria-hidden="true"></i></a>
		<p id="pipe">&verbar;</p>

		<h4 id="cookiename">


  
 
<?php

if (isset ( $_COOKIE ["username"] )) {
	$usernames = explode ( " ", $_COOKIE ["username"] );
	print ($usernames [0]) ;
}
?>

<span id="usertooltip"><span>Full username:</span><?php

foreach ( $usernames as $name ) {
	print (" " . $name) ;
}
?><br> <span>Logged in since: <?php if(isset($_COOKIE['logintime'])){ print ($_COOKIE["logintime"]);}?></span></span>

		</h4>




		<div style="clear: both;"></div>
	</div>



	<script src="../Jscript/dashboard.js">
</script>


</body>
</html>