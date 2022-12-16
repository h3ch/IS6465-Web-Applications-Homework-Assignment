<?php

require_once 'loginDB.php';
require_once 'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//code for create user table here
$query = "create table user(
	userid int(11) not null auto_increment,
	firstname varchar(100) not null,
	lastname varchar(100) not null,
	username varchar(100) not null unique,
	password varchar(100) not null,
	role varchar(100) not null,
	PRIMARY KEY (userid)
)";

$result = $conn->query($query);
if(!$result) die($conn->error);

//Bill Smith
$firstname = 'Bill';
$lastname = 'Smith';
$username = 'bsmith';
$password = 'mysecret';

$token = password_hash($password,PASSWORD_DEFAULT); 

add_user($conn, $firstname, $lastname, $username, $token);

//Pauline Jones
$firstname = 'Pauline';
$lastname = 'Jones';
$username = 'pjones';
$password = 'acrobat';
$token = password_hash($password,PASSWORD_DEFAULT); 

add_user($conn, $firstname, $lastname, $username, $token);

function add_user($conn, $firstname, $lastname, $username, $token){
	//code to add user here
	$query = "insert into user(firstname, lastname, username, password) values ('$firstname', '$lastname', '$username', '$token')";
	$result = $conn->query($query);
	if(!$result) die($conn->error);
}


?>


