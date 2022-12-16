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
		<h1>Customer Details Page</h1> 
	</div>

</body>	
</html>

<?php

require_once 'loginDB.php';
$page_roles = array('admin','user');
require_once 'checksession.php';



$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_GET['username'])){
	
$username = $_GET['username'];	

$query = "SELECT * FROM user where username='$username'";

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

		
			<div class="title">
				<h1>Customer Details</h1>
			</div>
			
			<div class='add' action='cust-details.php' method='post'>
				userid: $row[userid]<br>
				username:<input type='text' name='username' value='$row[username]' readonly><br>
				password:<input type='password' name='password' value='$row[password]' readonly><br>
				firstname:<input type='text' name='firstname' value='$row[firstname]' readonly><br>
				lastname:<input type='text' name='lastname' value='$row[lastname]' readonly><br><br>
			</div>
	</div>
</div>

_END;
	
}

$conn->close();

?>