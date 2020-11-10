<?php 

$db = mysqli_connect("localhost", "root", "", "ecommerce");


if(mysqli_connect_errno()) {
	
	echo 'Database connection Failed with fllowing errors: ' . mysqli_connect_errno();
	die();
}



	 
