<?php
include("connection.php");
if(!empty($_POST['login']))
{
    echo "jyvwduv";
    $uname=$_POST['username'];
    $pass=$_POST['pass'];
    $query="select * from login where username='$uname' and password='$pass'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        header("Location: home.html");
        exit();
    }
    else
    {
        echo "<script>
		alert('Enter valid Username / Password');
		window.location.href='index.html';
		</script>";
    }

}
?>
