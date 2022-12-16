<html>
	<head>
		<title>Air Asia Cards Details</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="card-list.css"> 
	</head>
	<body id="Air Asia Card Details">

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
		<h1>Air Asia Gift Card Redemption Page</h1> 
	</div>
	
	</body>

</html>

<?php

require_once 'loginDB.php';
$page_roles = array('admin','user');-
require_once 'checksession.php';



$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);


	
$query = "SELECT * FROM giftcard";
	
$result = $conn->query($query);
if(!$result) die($conn->error);

$rows = $result->num_rows; 

for($j=0; $j<$rows; $j++)
{
	$row = $result->fetch_array(MYSQLI_ASSOC);
	
echo<<<_END


<div class="card">

	<div class="image">
		<a href='card-details.php?cardid=$row[cardid]'>
		   <img src="gift-card.png">
		</a>
	</div>
	<h1>Card ID:$row[cardid]</h1>

	<div class="title">
		<h1>Card Name: $row[cardname]</h1>
	</div>
	<div class="purchase">
		<p>Card Type: $row[cardtype]</p>
		<div class="points">
			<h1>Points: $row[points]</h1>
		</div>
	</div>
</div>
		
_END;
	
}

$conn->close();

?>