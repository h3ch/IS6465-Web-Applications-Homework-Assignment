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
			<li><a href="cust-add.php">ADD CUSTOMER</a><li>
			<li><a href="Logout.php">LOGOUT</a><li>
		  </ul>
		</div>
	  </div>
	</nav>
	<div class="jumbotron text-center">
		<h1>Customer Add Page</h1> 
	</div>
	
	<table class="add customer" border="0" cellpadding="2" cellspacing="5" bgcolor="#eeeeee">
			<th colspan="2" align="center"> SIGNUP</th>
			<form method="post" action="cust-add.php"> 
			<tr><td>First Name</td>
			  <td><input type="text" name="firstname"></td></tr>
			  <tr><td>Last Name</td>
			  <td><input type="text" name="lastname"></td></tr>
			 <tr><td>Username</td>
			  <td><input type="text" name="username"></td></tr>
			 <tr><td>Password</td>
			 	<td><input type="text" name="password"></td></tr>
			 <tr><td colspan="2" align="center"><input type="submit" value="SIGN UP"></td></tr>
		    </form>
		</table>

	</body>

</html>

<?php

require_once 'loginDB.php';
require_once 'User.php';
$page_roles = array('admin');
require_once 'checksession.php';


$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['username'])){
	
	$userid = $_POST['userid'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$role = 'user';
	$token = password_hash($password,PASSWORD_DEFAULT);
	
	$query = "INSERT into user (username, password, firstname, lastname, role) values ('$username', '$token', '$firstname', '$lastname', '$role')";
	
	$result = $conn->query($query);
	if(!$result) die($conn->error);
	
	header("Location: cust-details.php?username=$username");
}




?>