<?php
// slide 17
session_start();

$create_username = $_POST["user_name"];
$user_password = $_POST["password"];
$re_password = $_POST["re_password"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$email = $_POST["email"];

//$_SESSION["failedAccount"] = "no_error";

if($user_password != $re_password){
	header("Location: create_user_form.php");
	die("Passwords did not match");
}

// Create connection
require_once('database.php');
/*
$usernameCheck = "SELECT * FROM USERS WHERE UserUserName = '" .$createUsername."'";
$result = mysqli_query($conn, $usernameCheck);

$numRows = mysqli_num_rows($result);
if($numRows > 0){
	$_SESSION["failedAccount"] = "username_exists";
	mysqli_close($conn);
	header("Location: create-account-f.php");
	die("This username already exists");		
}
*/

//$sqlInsert = mysqli_prepare($conn, "INSERT INTO USER_PASS (USER_NAME, PASSWORD) VALUES 
$query = "INSERT INTO Users (UserFirstName, UserLastName, UserUserName, UserPassword, UserEmail) VALUES (:first_name, :last_name, :user_name, :password, :email)";
$statement = $db->prepare($query);
$statement->bindValue(':first_name', $first_name);
$statement->bindValue(':last_name', $last_name);
$statement->bindValue(':user_name', $create_username);
$statement->bindValue(':password', password_hash($user_password, PASSWORD_DEFAULT));
$statement->bindValue(':email', $email);
$statement->execute();
$statement->closeCursor();

header("Location: index.php");
?>