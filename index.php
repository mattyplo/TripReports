<?php

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
    

?>

<!DOCTYPE html>
<html>
<head>
    <title>Trip Reports</title>
    <link rel="stylesheet" href="css/main.css" />
</head>
    
<body>
<main>
    <h1>Trip Reports</h1>
    <!--a test to see that the session is working! 
    <h2><?php echo $session_name; ?></h2>
    -->
    
    <p><a href="login_form.php">Login</a></p>
    <p><a href="create_user_form.php">Create User</a></p>
    <p><a href="add_report_form.php">Add Report</a></p>
    
    
    <section>
        <!--display a table of trip reports -->
        <table>
            <tr>
                <th>TripReportKey</th>
                <th>TripReportName</th>
                <th>TripReportMileage</th>
                <th>TripReportDate</th>
                <th>TripReportLocation</th>
                <th>TripReportReport</th>
            </tr>
            
            <?php foreach ($reports as $report) : ?>
            <tr>
                <td><?php echo $report['TripReportKey']; ?></td>
                <td><?php echo $report['TripReportName']; ?></td>
                <td><?php echo $report['TripReportMileage']; ?></td>
                <td><?php echo $report['TripReportDate']; ?></td>
                <td><?php echo $report['TripReportLocation']; ?></td>
                <td><?php echo $report['TripReportReport']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>    
</body>
</html>
<!--display a table of trip reports -->