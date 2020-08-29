<?php
	$server='localhost';
	$id='root';
	$pwd='root';
	$dbname='bank';   
	$con = mysqli_connect($server , $id , $pwd,$dbname,8889);
	if (!$con){
  		die("Could not connect: " . mysql_error());
  	}
	mysqli_query($con ,"SET NAMES utf8");
	// mysql_close($con);
	
?>