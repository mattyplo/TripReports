<?php

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>


    <main>
        <form action="add_report.php" method="post" id="add_report_form">
        
        <h1>Add Report</h1>
        <h2><?php echo $_SESSION['username']; ?></h2>
        
          <fieldset>  
            <legend>Trip Report</legend>  
              
            <label>Trip Name:</label>
            <input type="text" name="trip_name"><br>
            
            <label>Mileage:</label>
            <input type="text" name="mileage"><br>
            
            <label>Date:</label>
            <input type="date" name="date"><br>
            
            <label>Location:</label>
            <input type="text" name="location"><br>
            
            <label>Report:</label>
            <textarea name="report" rows="5"></textarea><br>
            
            <label>&nbsp;</label>
            <input type="submit" value="Add Report"><br>
          </fieldset>
        </form>
        <p><a href="index.php">View Trip Reports</a></p>
    </main>
    
