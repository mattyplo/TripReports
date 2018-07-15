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

    <?php
    if($_SESSION['loggedIn'] == true){
        echo $_SESSION['username'];
    } else {
        echo "Welcome!";
    }
    ?>

    <p><a href=".?action=login">Login</a></p>
    <p><a href=".?action=create_user">Create User</a></p>
    <p><a href=".?action=add_report">Add Report</a></p>
    
    
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
</body>
</html>