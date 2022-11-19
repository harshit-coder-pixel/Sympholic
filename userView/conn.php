<?php
	$server="localhost";
	$dbuser="symp_root";
	$dbpass="Adarsh@12";
	$dbname="symp_sy";
	
		$conn=mysqli_connect($server,$dbuser,$dbpass,$dbname);
		if($conn->connect_error)
		{
			die("Connection failed: ".mysqli_connect_error());
		}
?>