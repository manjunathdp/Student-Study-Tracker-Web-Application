<?php
	 $serverName="localhost";
	 $userName="root";
	 $password="";
	 $dbName="mydetails";
	 $totalHrs=0;
	 $conn=mysql_connect($serverName,$userName,$password,$dbName);
	 mysql_select_db($dbName);
	 //debugging code:
	 
	 /*if($conn)
	 	echo "Connection Ok";
	 else
	 	echo "Connection Error\n".mysql_error();*/
	 	
	 ?>


