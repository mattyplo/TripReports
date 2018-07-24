<?php

define('THIS_PAGE',basename($_SERVER['PHP_SELF']));

switch (THIS_PAGE) {
        
    case'index.php';
        $title = "Trip Reports";
        $pageID = "Hola";
    break;
        
    case'tripReports.php';
        $title = "Trip Reports";
        $pageID = "Trip Reports";
    break;
        
    case'writeReport.php';
        $title = "Write Report";
        $pageID = "Write Report";
    break;
        
    case'createUser.php';
        $title = "Create new User";
        $pageID = "Create new User";
    break;
    
    case'logIn.php';
        $title = "Log in";
        $pageID = "Log in";
    break;
        
    default:
        $title = THIS_PAGE;
        $pageID = 'Welcome';
}

$nav1['index.php'] = "Welcome";
$nav1['tripReports.php'] = "Trip Reports";
$nav1['writeReport.php'] = "Write a Report";
$nav1['createUser.php'] = "Create User Account";
$nav1['logIn.php'] = "Log in";

function makeLinks($nav1) {
    
    $myReturn = '';
    foreach($nav1 as $url => $text) {
        if($url == THIS_PAGE) {
            $myReturn .= "<li><a class=\"selected\" href=\"$url\">$text</a></li>";
        } else {
            $myReturn .= "<li><a href=\"$url\">$text</a></li>";
        }
    }
    return $myReturn;
}

?>