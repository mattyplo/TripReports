<?php 


if(!$_SESSION['loggedIn']) {
    include('add_report_form.php');
} else {
    include('login_form.php');
}
?>