<?php 
	include("connection.php");
	$name=$_POST['name'];
	$email=$_POST['email'];
	$uname=$_POST['uname'];
	 $phno=$_POST['phno'];
     $pwd=$_POST['password'];
     
	
	$insert="insert into login (name,email,phno,password,username) values('$name','$email','$phno','$pwd','$uname');";
	$dbrt=mysqli_query($conn,$insert);
	  if( $insert )
	 { 
		echo "<script>
		alert('Registration successful');
		window.location.href='index.html';
		</script>";
 	  }
 	  else
 	 	echo "There was an error\n please try Again";

 ?>


