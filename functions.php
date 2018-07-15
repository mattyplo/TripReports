<?php

session_start();

function is_valid_admin_login($username, $password) {
    global $db;
    $query = 'SELECT UserPassword FROM Users WHERE UserUserName = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();
    $hash = $row['UserPassword'];
    return password_verify($password, $hash);
}

?>