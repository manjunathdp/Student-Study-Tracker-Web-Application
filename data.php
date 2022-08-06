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
		alert('Information added successful');
		window.location.href='index.html';
		</script>";
 	  }
 	  else
 	 	echo "Not registered \n register Again";

 ?>


