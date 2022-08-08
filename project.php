<html>
    <head>
    <style>
    <?php include 'table.css'; ?>
    </style>
    </head>
    <body>
        
    
<?php
include("connection.php");

$ret2="select * from details where subject='PROJECT';";

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
        <center><h1 style="background-color:powderblue;"><u><i>List of hours studied in every month</i></u></h1></center>
        <table border=1px solid black class=toptables><tr>
        <th>MONTH(YEAR)</th>
        <th>HOURS</th></tr>
        <?php
        $ret2="select DATE_FORMAT(date ,'%M (%Y)') as month,sum(hours) as hrs from details WHERE subject='PROJECT' group by month;";

        $dbrt=mysqli_query($conn,$ret2);
    
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
        </body>
    </html>
    
