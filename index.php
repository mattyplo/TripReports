<?php
//session_start();
if(!isset($_SESSION)) 
    { 
        $lifetime = 60 * 60 * 24 * 365;  
        session_start(); 
        session_set_cookie_params($lifetime, '/');
        $_SESSION['loggedIn'] = false; 
    } 
$lifetime = 60 * 60 * 24 * 365;                     

require_once('model/database.php');
$session_name = session_name();
if($_SESSION['loggedIn'] == true){
    $username = $_SESSION['username'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];
}
//Get trip reports
$queryAllTripReports = 'SELECT * FROM TripReport';
$db = Database::getDB();
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
        include('report.php');
        break;
    case 'end_session':
        // Clear session data from memory
        $_SESSION = array();
        
        // Clean up session ID
        session_destroy();
        
        // Delete the cookie for the session
        $name = session_name();
        $expire = strtotime('-1 year');
        $params = session_get_cookie_params();
        $path = $params['path'];
        $domain = $params['domain'];
        $secure = $params['secure'];
        $httponly = $params['httponly'];
        setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
        
        include('tripReport.php');
        break;
}
?>

