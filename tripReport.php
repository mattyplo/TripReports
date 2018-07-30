<?php
include('includes/header.php');

//Get trip reports
$queryAllTripReports = 'SELECT * FROM TripReport';
$tripReports = $db->prepare($queryAllTripReports);
$tripReports->execute();
$reports = $tripReports->fetchAll();
$tripReports->closeCursor();
?>


    

<main>
    <h1>Trip Reports</h1>
    <!--a test to see that the session is working! 
    <h2><?php echo $session_name; ?></h2>
    -->

    <?php
    if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
        echo $_SESSION['username'];
    } else {
        echo "Welcome!";
    }
    ?>

    
    
    <secction>
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
    </secction>
</main>    
