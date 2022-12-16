<html>
	<head>
		<title>Air Asia Rewards Redemption System Login Page</title>
			<link rel="stylesheet" type="text/css" href="loginstyle.css">
	</head>
	<body>
		<div class="loginbox">
		<img src="AirAsia_logo_logotype_circle.png" class="avatar">
		<h1></h1>
		<h1 style="color:white;">Air Asia Rewards Redemption Systems Login</h1>
		<form method='post' action='login.php'>
			<p>Username</p>
			<input type="text" name="username" placeholder="Username">
			<p>Password</p>
			<input type="password" name="password" placeholder="Password"><br>
			<h5>Show Password</h5><br>
			<input type="submit" value="Sign In"><br>
		</form>
		</div>
	</body>
</html>

<?php


require_once 'loginDB.php';
require_once 'User.php';
$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if (isset($_POST['username']) && isset($_POST['password'])) {
	
	//Get values from login screen
	$tmp_username = serialized_string($conn, $_POST['username']);
	$tmp_password = serialized_string($conn, $_POST['password']);
	
	//get password from DB w/ SQL
	$query = "SELECT password FROM user WHERE username = '$tmp_username'";
	
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	$rows = $result->num_rows;
	$passwordFromDB="";
	for($j=0; $j<$rows; $j++)
	{
		$result->data_seek($j); 
		$row = $result->fetch_array(MYSQLI_ASSOC);
		$passwordFromDB = $row['password'];
	
	}

  //get points from DB w/ SQL
  $query2 = "SELECT points FROM user WHERE username = '$tmp_username'";

  $result2 = $conn->query($query2); 
	if(!$result2) die($conn->error);
	
	$rows2 = $result2->num_rows;
	$userpoints="";
	for($j=0; $j<$rows; $j++)
	{
		$result2->data_seek($j); 
		$row = $result2->fetch_array(MYSQLI_ASSOC);
		$userpoints = (int) $row['points'];
	}
  
	//Compare passwords
	if(password_verify($tmp_password,$passwordFromDB))

	{
		
		$user = new User($tmp_username,$userpoints);

		session_start();
		$_SESSION['user'] = $user;
    
echo<<<_END
    <div class='continue'>
  	  <h1>Successful Login</h1>
      <a class="btn btn-success" href="continue.php">Sign In</a>
    </div>
_END;
		
	}
	else
	{
		
		echo "login error<br>";
	}	
	
}

$conn->close();


//sanitization functions
function serialized_string($conn, $string){
	return htmlentities(removeslash_string($conn, $string));	
}

function removeslash_string($conn, $string){
	$string = stripslashes($string);
	return $conn->real_escape_string($string);
}


?>