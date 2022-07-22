<html>
    <head>
    <style>
    <?php include 'table.css'; ?>
    </style>
    </head>
    <body>
        
    
<?php
include("connection.php");

$ret2="select * from details where subject='JAVA';";

$dbrt=mysql_query($ret2,$conn);

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
        </body>
    </html>
    
