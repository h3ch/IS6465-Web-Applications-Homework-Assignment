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
			<li><a href='cust-add.php'>CUSTOMER ADD</a></li>
			<li><a href="Logout.php">LOGOUT</a><li>			
		  </ul>
		</div>
	  </div>
	</nav>
	<div class="jumbotron text-center">
		<img src="AirAsia_logo_logotype_circle.png" class="avatar">
		<h1>Air Asia Gift Card Details Page</h1> 
	</div>

</body>	
</html>

<?php

require_once 'loginDB.php';
$page_roles = array('admin','user');
require_once 'checksession.php';
require_once 'User.php';


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['cardid'])){
  $cardid = $_GET['cardid'];	
  
  $query = "SELECT * FROM giftcard where cardid=$cardid ";
  
  $result = $conn->query($query); 
  if(!$result) die($conn->error);
  
  $rows = $result->num_rows;

  for($j=0; $j<$rows; $j++){
  $row = $result->fetch_array(MYSQLI_ASSOC);
  }
  
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
			
			<div class='add' action='card-details.php' method='post'>
				cardid: $row[cardid]<br>
				<p type='text' name='cardname' value='$row[cardname]' readonly>cardname: $row[cardname]</p>
				<p type='text' name='cardtype' value='$row[cardtype]' readonly>cardtype: $row[cardtype]</p>
				<p type='text' name='cardvalue' value='$row[cardvalue]' readonly>cardvalue: $row[cardvalue]</p>
				<p type='text' name='points' value='$row[points]' readonly>points: $row[points]</p>
				<input type='hidden' name='update' value='yes'>
				<input type='hidden' name='cardid' value='$row[cardid]'>
				<a class="btn btn-success" href="card-update.php?cardid='$cardid'">UPDATE OR DELETE CARD</a>
		<form action="card-redeem.php" method="post">
				<input type='hidden' name='cardid' value='$row[cardid]'>
        <input type='hidden' name='points' value='$row[points]'>
        <button class="btn btn-success" type='submit' name='redeem'>REDEEM CARD</button>
        </form>
				
			</div>
	</div>
</div>

_END;
	

$conn->close();

?>