<html>
    <head>
    <style>
    <?php include 'table.css'; ?>
    </style>
    </head>
    <body>
        
    
<?php
$conn=mysql_connect("localhost","root","");
if(!$conn)
die('coundnt connect'.mysql_error());

mysql_select_db("mydetails");

$ret2="select subject,DATE_FORMAT(date ,'%d-%M-%Y  (%W)') as date ,hours,topic from details order by date desc";

$dbrt=mysql_query($ret2,$conn);
$totalHrs=0;

?>


<table border=1px solid black><tr>
        <th>SUBJECT</th>
        <th>DATE</th>
        <th>HOURS</th>
        <th>TOPIC</th></tr>
    

        
<?php
    //if($dbrt->num_rows>0)
         while ($arr = mysql_fetch_assoc($dbrt))
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
        <table border=1px solid black class=toptables><tr>
        <th>SUBJECT</th>
        <th>HOURS</th></tr>
        <?php
        $ret2="select subject,sum(hours) as hrs from details group by subject order by hours ;";

        $dbrt=mysql_query($ret2,$conn);
    //if($dbrt->num_rows>0)
         while ($arr = mysql_fetch_assoc($dbrt))
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
        </body>
    </html>
    
