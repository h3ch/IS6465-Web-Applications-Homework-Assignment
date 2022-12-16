<html>
	<head>
		<title>Air Asia Cards</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="card-details.css"> 
	</head>
	<body id="Air Asia Cards">

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
			<li><a href="cust-add.php">ADD CUSTOMER</a><li>
			<li><a href="Logout.php">LOGOUT</a><li>
		  </ul>
		</div>
	  </div>
	</nav>
	<div class="jumbotron text-center">
		<img src="AirAsia_logo_logotype_circle.png" class="avatar">
		<h1>Air Asia Gift Update Card Page</h1> 
	</div>

</body>	
</html>

<?php

require_once 'loginDB.php';
$page_roles = array('admin');
require_once 'checksession.php';


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['cardid'])){
	
$cardid = $_GET['cardid'];	


$query = "SELECT * FROM giftcard where cardid=$cardid ";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)

{
$row = $result->fetch_array(MYSQLI_ASSOC);

}


	

echo<<<_END

<div class="main">

	<div class="card">

		<div class="image">
		   <img src="gift-card.png">
		</div>
			<div class="title">
				<h1>Card Details</h1>
			</div>
			
			<form class='add' action='card-update.php' method='post'>
				cardid: $row[cardid]<br>
				cardname:<input type='text' name='cardname' value='$row[cardname]'><br>
				cardtype:<input type='text' name='cardtype' value='$row[cardtype]'><br>
				cardvalue:<input type='text' name='cardvalue' value='$row[cardvalue]'><br>
				points:<input type='text' name='points' value='$row[points]'><br><br>
				<input type='hidden' name='update' value='yes'>
				<input type='hidden' name='cardid' value='$row[cardid]'>
				<input type='hidden' name='delete' value='yes'>
				<input type='hidden' name='cardid' value='$row[cardid]'>
				<input type='submit' value='Save Card Changes'>
				<input type='submit' value='Delete Card'>
			</form>
	</div>
</div>

_END;
	
}

if(isset($_POST['update'])){
	
	$cardid = $_POST['cardid'];
	$cardname = $_POST['cardname'];
	$cardtype = $_POST['cardtype'];
	$cardvalue = $_POST['cardvalue'];
	$points = $_POST['points'];
	
	$query = "Update giftcard set cardname='$cardname', cardtype='$cardtype', cardvalue='$cardvalue', points='$points' where cardid = $cardid ";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: card-list.php");
	
}	

if(isset($_POST['delete'])){
	
	$cardid = $_POST['cardid'];
	
	$query = "DELETE FROM giftcard WHERE cardid='$cardid' ";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: card-list.php");
	
}	

$conn->close();

?>