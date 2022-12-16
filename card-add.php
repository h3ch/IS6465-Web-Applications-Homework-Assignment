<html>
	<head>
		<title>Air Asia Cards</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="card-add.css"> 
	</head>
	<body id="Air Asia Add">

	<nav class="navbar navbar-default">
	  <div class="container">
		<div class="navbar-header">
		   <a class="navbar-brand" href="#myPage"></a>
		</div>
		<div class="collapse navbar-collapse" id="Air Asia Card nav bar">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="login.php">LOGIN</a></li>
			<li><a href="card-list.php">LIST OF CARDS</a></li>
			<li><a href="card-add.php">ADD CARD</a></li>
			<li><a href='cust-add.php'>CUSTOMER ADD</a></li>
			<li><a href="Logout.php">LOGOUT</a><li>
		  </ul>
		</div>
	  </div>
	</nav>
	<div class="jumbotron text-center">
		<img src="AirAsia_logo_logotype_circle.png" class="avatar">
		<h1>Air Asia Gift Card Add Card Page</h1> 
	</div>
	
	
				<form method='post' action='card-add.php'>
						<h1>Instructions to add new card:</h1><br>
						<h2> 
						1. Card Number <br>
						<input type="text" name='cardid'><br>
						2. Card Name <br>
						<input type="text" name='cardname'><br>
						3. Card Type <br>
						<input type="text" name='cardtype'><br>
						4. Card Value <br>
						<input type="text" name='cardvalue'><br>
						5. Points <br>
						<input type="text" name='points'><br>
						6. Upload image of Gift Card <br><br>
						<input type='submit' value='Add Card'>
						</h2><br>
				</form>	
	

	
	<div class="image">
		<a href="photo">
		<img src="addimage.png">
		</a>
	</div>

	
</body>	
</html>

<?php

require_once 'loginDB.php';
$page_roles = array('admin');
require_once 'checksession.php';



$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['cardid'])){
	
	$cardid = $_POST['cardid'];
	$cardname = $_POST['cardname'];
	$cardtype = $_POST['cardtype'];
	$cardvalue = $_POST['cardvalue'];
	$points = $_POST['points'];
	
	$query = "INSERT into giftcard (cardid, cardname, cardtype, cardvalue, points) values ('$cardid', '$cardname', '$cardtype', '$cardvalue', '$points')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: card-details.php?cardid=$cardid");
}

?>

