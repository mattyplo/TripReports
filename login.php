<?php
include('functions.php');
require_once('database.php');

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');


// This function checks whether the password given matches the password stored in the database for the given user


if (is_valid_admin_login($username, $password)) {
    $_SESSION['loggedIn'] = TRUE;
    $_SESSION['username'] = $username;
    
    
    $query = 'SELECT UserFirstName, UserLastName FROM Users WHERE UserUserName = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    $firstName = $row['UserFirstName'];
    $lastName = $row['UserLastName'];
    $_SESSION['firstName'] = $row['UserFirstName'];
    $_SESSION['lastName'] = $row['UserLastName'];
    header('Location: index.php');
} else {
    include('login_form.php');
}


?>