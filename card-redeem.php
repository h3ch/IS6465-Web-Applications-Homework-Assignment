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
		<h1>Congratulations!</h1> 
	</div>

</body>	
</html>

<?php
  require_once 'loginDB.php';
  require_once 'User.php';

if(isset($_POST['cardid'])) 
{
    session_start();
    $cardid = $_POST['cardid'];
    $points = $_POST['points'];
    $user = $_SESSION['user'];
    $username = $user->username;
    $userpoints = $user->points;
    $redeemid = rand(0, 1000000);
    $date = date('Y-m-d');
    $cardPointsRedeemed = (int)$points;          
    
    $remainingPoints = (int)$userpoints-(int)$cardPointsRedeemed;
    
    // Insert Redemption Line to DB
    $queryRedemption = "INSERT into redemption (redeemId, date, cardId, pointsRedeemed) values ($redeemid, $date, $cardid, $cardPointsRedeemed)";
    
    $result2 = $conn->query($queryRedemption);
    if(!$result2) die($conn->error);
    	
    
    //update User Points to DB
    $queryUserPointsUpdate = 
      "UPDATE user SET points='$remainingPoints' WHERE username='$username'";
    
    $result3 = $conn->query($queryUserPointsUpdate); 
    if(!$result3) die($conn->error);

echo<<<_END
    <div class='continue'>
  	  <h1>Card Successfully Redeemed</h1>
      <a class="btn btn-success" href="card-list.php">Continue</a>
    </div>
_END;

$conn->close();

}
?>