<?php
//session_start();

$lifetime = 60 * 60 * 24 * 365;                     
session_set_cookie_params($lifetime, '/');
session_start();
require_once('database.php');
$session_name = session_name();

//Get trip reports
$queryAllTripReports = 'SELECT * FROM TripReport';
$tripReports = $db->prepare($queryAllTripReports);
$tripReports->execute();
$reports = $tripReports->fetchAll();
$tripReports->closeCursor();
    
// switch between various pages and actions
$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'reports';
    }
}

switch($action) {
    case 'reports':
        include('tripReport.php');
        break;
    case 'login':
        include('login_form.php');
        break;
    case 'create_user':
        include('create_user_form.php');
        break;
    case 'add_report':
        header("Location: add_report_form.php");
        break;
}
?>
