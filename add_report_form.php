<!DOCTYPE html>
<html>

<head>
    <title>Trip Reports</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <main>
        <h1>Add Report</h1>
        <form action="add_report.php" method="post" id="add_report_form">
            
            <label>Trip Name:</label>
            <input type="text" name="trip_name"><br>
            
            <label>Mileage:</label>
            <input type="text" name="mileage"><br>
            
            <label>Date:</label>
            <input type="date" name="date"><br>
            
            <label>Location:</label>
            <input type="text" name="location"><br>
            
            <label>Report:</label>
            <input type="text" name="report"><br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Report"><br>
            
        </form>
        <p><a href="index.php">View Trip Reports</a></p>
    </main>
    
</body>
    
</html>