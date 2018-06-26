<?php
    $dsn = 'mysql:host=mysql.mattyplo.com;dbname=trip_report';
    $username = 'mattyplo';
    $password = 'Masmatt#7';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>