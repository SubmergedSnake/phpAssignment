


<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
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
.result{color:white;width:230px;float:left;background:rgba(0,0,0,0.6);margin:1em;padding:0.5em;border-radius:0.4em;}

</style>

</head>
<body>
	<div class="main">

		<header>
			<h2>
				Search <small><i class="fa fa-search" aria-hidden="true"></i></small>
			</h2>
			<nav class="subnav">
				<li><a class="arrow" href="submitbook.php " class="nav">Submit a new book</a></li>
				<li><a class="arrow" href="allbooks.php " class="nav">All books</a></li>
				<li><a class="arrow" href="settings.php " class="nav">Settings</a></li>



			</nav>
		</header>

		<div class="half" style="float:none">
			<form >
				<h4>
					Search for a book
				</h4>				
				<label class="searchlb">By Title<input type="radio" name="condition" value="title" /></label>
				 <label class="searchlb">By Author<input type="radio" name="condition" value="author" /></label>
				 <label class="searchlb">By Genre<input type="radio" name="condition" value="genre" /></label>
				 
				<label style="width:100%;padding-top:0.7em;">Search params<input
					type="text" style="width: 70%" name="searchparam" id="searchparam"  /></label>
					
					<button type="button" name="search" id="search"
					style="background: #00ff00">
					Search <i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</form>



		</div>


		<div class="padtop1 pbsides2" id="results">
		
		</div>
		
		
<div style="clear:both"></div>

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

<script>
$( document ).ready(function() {
	$("#search").click(function(){
		var condition = $('input[name="condition"]:checked').val();
		 var searchparam = $('#searchparam').val();
		 alert("Params selected: " + condition + ", " + searchparam);
     
      
    $.ajax({
url: "bookJSON.php",
method: "get",
datatype: "json",
timeout: 5000,
data:{searchparam: searchparam, condition:condition}
    })

    .done(function(data){
        $("#results").empty();
        
        console.log(data);
        parseddata = $.parseJSON(data);
        console.log(parseddata);
		$.each(parseddata, function(index, book){
			$('#results').append('<span class="result">' +
					'<p>' + book.title + '<br>' + book.author + '<br>' + book.genre + '<br>' + book.publicationdate + '<br>' + book.contactemail + '<br>' + book.synopsis + '</p></span>');
		})
    })
    .fail(function(){
        $('#results').html('<strong>Results are currently unavailable!</strong>');
    })
});
});
</script>


	<script src="../Jscript/dashboard.js">
</script>


</body>
</html>