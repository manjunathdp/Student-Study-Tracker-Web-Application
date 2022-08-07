<?php 
	include("connection.php");
	$subject=$_POST['subject'];
	$date=$_POST['date'];
	$topic=$_POST['topic'];
	 $hrs=$_POST['hrs'];
	
	$insert="insert into details values('$subject','$date','$hrs','$topic');";
	$dbrt=mysqli_query($conn,$insert);
	  if( $insert )
	 { 
		echo "<script>
		alert('Data uploaded successful');
		window.location.href='index.html';
		</script>";
 	  }
 	  else
 	 	echo "There was an error\n please try Again";

 ?>


