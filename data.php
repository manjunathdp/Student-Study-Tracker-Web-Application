<?php 
	include("connection.php");
	$subject=$_POST['subject'];
	$date=$_POST['date'];
	$topic=$_POST['topic'];
	 $hrs=$_POST['hrs'];
	// $cel=$_POST['phno'];
	// $email=$_POST['email'];
	// $address=$_POST['address'];


	// $myuid = uniqid('KAR22');
	mysql_select_db($dbName);

	$insert="insert into details values('$subject','$date','$hrs','$topic');";
	mysql_query($insert,$conn);
	  if( $insert )
	 { 
		echo "<script>
		alert('Your registration is successful');
		window.location.href='index.html';
		</script>";
 	  }
 	  else
 	 	echo "Not registered \n register Again";

 ?>


