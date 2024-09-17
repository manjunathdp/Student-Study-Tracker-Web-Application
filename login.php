<?php
include("connection.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!empty($_POST['login'])) {
    // echo "1";
    $uname = $_POST['username'];
    $pass = $_POST['pass'];

    // echo "2";
    $query = "SELECT * FROM signup WHERE username='$uname' AND password='$pass'";
    echo "Query: " . $query;

    $result = mysqli_query($conn, $query);

    if (!$result) {
        echo "MySQL Error: " . mysqli_error($conn);
    }

    // echo "4";
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        // echo "if 1";
        header("Location: home.html");
        exit();
    } else {
        // echo "else 1";
        echo "<script>
            alert('Enter valid Username / Password');
            window.location.href='index.html';
            </script>";
    }
}
?>
