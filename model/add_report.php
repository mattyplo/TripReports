<?php

require_once('database.php');

// Get the trip data
$trip_name = filter_input(INPUT_POST, 'trip_name');
$mileage = filter_input(INPUT_POST, 'mileage', FILTER_VALIDATE_FLOAT);
$date = filter_input(INPUT_POST, 'date');
$location = filter_input(INPUT_POST, 'location');
$report = filter_input(INPUT_POST, 'report');

//validate inputs
if ($trip_name == null || $mileage == null || $mileage == false || $date == null || $location == null || $report == null) {
    $error_message = "invalide report data.  check all fields and try again.";
    include('../database_error.php');
} else {
    
    $db = Database::getDB();
    
    // Add the trip to the database
    $query = 'INSERT INTO TripReport 
                (TripReportName, TripReportMileage, TripReportDate, TripReportLocation, TripReportReport)
              VALUES
                (:trip_name, :mileage, :date, :location, :report)';
    $statement = $db->prepare($query);
    $statement->bindValue(':trip_name', $trip_name);
    $statement->bindValue(':mileage', $mileage);
    $statement->bindValue(':date', $date);
    $statement->bindValue(':location', $location);
    $statement->bindValue(':report', $report);
    $statement->execute();
    $statement->closeCursor();
    
    // Display the Trip Report page
    include('../tripReport.php');
}

?>
