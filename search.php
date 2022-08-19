<?php 
	include("connection.php");
	$subject=$_POST['subject'];
    if($subject=="DMS")
        header("Location: dms.php");
        if($subject=="DBMS")
        header("Location: dbms.php");
        if($subject=="PROJECT")
        header("Location: project.php");
        if($subject=="DSA")
        header("Location: dsa.php");
        if($subject=="JAVA")
        header("Location: java.php");
        if($subject=="JAVASCRIPT")
        header("Location: js.php");
        if($subject=="OTHER")
        header("Location: other.php");
        if($subject=="CN1")
        header("Location: cn1.php");
        if($subject=="ML")
        header("Location: ml.php");
        if($subject=="SE")
        header("Location: se.php");
        if($subject=="SS")
        header("Location: ss.php");
        if($subject=="WT")
        header("Location: wt.php");
        if($subject=="NLP")
        header("Location: nlp.php");
        ?>
        

        

    