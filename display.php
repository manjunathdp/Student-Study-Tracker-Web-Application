<html>
    <head>
    <style>
    <?php include 'table.css'; ?>
    </style>
    </head>
    <body>
        
    
<?php
include("connection.php");

$ret2="select subject, DATE_FORMAT(date ,'%d-%M-%Y  (%W)') as date, hours, topic from details order by date ASC";

$dbrt=mysqli_query($conn,$ret2);

?>


<table border=1px solid black><tr>
        <th>SUBJECT</th>
        <th>DATE</th>
        <th>HOURS</th>
        <th>TOPIC</th></tr>      
<?php
         while ($arr = mysqli_fetch_assoc($dbrt))
    {
       $totalHrs=$totalHrs+$arr['hours'];
?>
        <tr>
            <td><?php echo $arr['subject']; ?></td>
            <td><?php echo $arr['date']; ?></td>
            <td><?php echo $arr['hours']; ?></td>
            <td><?php echo $arr['topic']; ?></td>
            
        </tr>
<?php
    }
    ?>
        </table>
        <h1>Total hours=<?php echo $totalHrs ?></h1>
        
<?php
// Get the current date in the format used in your database
$today = date('Y-m-d'); // Adjust the format to match your database's date format (e.g., 'Y-m-d')

// Query to sum today's studied hours
$daterev = "SELECT SUM(hours) as today FROM details WHERE date = '$today';";

$dbrt = mysqli_query($conn, $daterev);
$result = mysqli_fetch_assoc($dbrt);
?>
<h2>Today studied = <?php echo $result['today'] + 0; ?></h2>


        <center><h1 style="background-color:powderblue;"><u><i>Top list of studied subjects</i></u></h1></center>
        <table border=1px solid black class=toptables><tr>
        <th>SUBJECT</th>
        <th>HOURS</th></tr>
        <?php
        $ret2="select subject,sum(hours) as hrs from details group by subject order by hrs desc ;";

        $dbrt=mysqli_query($conn,$ret2);
    
         while ($arr = mysqli_fetch_assoc($dbrt))
    {
       
?>
        <tr>
            <td><?php echo $arr['subject']; ?></td>
            <td><?php echo $arr['hrs']; ?></td>
            
        </tr>
<?php
    }
    ?>
        </table>

        <center><h1 style="background-color:powderblue;"><u><i>List of hours studied in every month</i></u></h1></center>
<table border=1px solid black class=toptables><tr>
    <th>MONTH(YEAR)</th>
    <th>HOURS</th>
</tr>
<?php
// Remove the subject filter if you want to calculate hours for all subjects
$ret2 = "SELECT DATE_FORMAT(date, '%M (%Y)') as month, SUM(hours) as hrs FROM details GROUP BY month ORDER BY date ASC;";

$dbrt = mysqli_query($conn, $ret2);

while ($arr = mysqli_fetch_assoc($dbrt))
{
?>
    <tr>
        <td><?php echo $arr['month']; ?></td>
        <td><?php echo $arr['hrs']; ?></td>
    </tr>
<?php
}
?>
</table>



        </body>
    </html>
 
