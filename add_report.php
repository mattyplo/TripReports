<?php

include('includes/header.php');

$username = $_SESSION['username'];
$query = "SELECT UserId FROM Users Where UserUserName = :username";
$statement = $db->prepare($query);
$statement->bindValue('username', $username);
$statement->execute();
$row = $statement->fetch();
$statement->closeCursor();
$userId = $row['UserId'];

if(is_post_request()) {
// Get the trip data
$trip_name = filter_input(INPUT_POST, 'trip_name');
$mileage = filter_input(INPUT_POST, 'mileage', FILTER_VALIDATE_FLOAT);
$date = filter_input(INPUT_POST, 'date');
$location = filter_input(INPUT_POST, 'location');
$report = filter_input(INPUT_POST, 'report');

//validate inputs
if ($trip_name == null || $mileage == null || $mileage == false || $date == null || $location == null || $report == null) {
    $error_message = "invalide report data.  check all fields and try again.";
    include('database_error.php');
} else {
    require_once('database.php');
    
    // Add the trip to the database
    $query = 'INSERT INTO TripReport 
                (TripReportName, TripReportMileage, TripReportDate, TripReportLocation, TripReportReport, TripReportAuthorUserId)
              VALUES
                (:trip_name, :mileage, :date, :location, :report, :userId)';
    $statement = $db->prepare($query);
    $statement->bindValue(':trip_name', $trip_name);
    $statement->bindValue(':mileage', $mileage);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':location', $location);
    $statement->bindValue(':report', $report);
    $statement->bindValue(':userId', $userId);
    $statement->execute();
    $statement->closeCursor();
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=tripReport.php">';
}
} else {
    include('add_report_form.php');
}

include('includes/footer.php');
?>

