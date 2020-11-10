<?php

$do="";

if(isset($_GET['do'])){

$do = $_GET['do'];

} else {

	$do= "Mange";
}


if($do == 'Mange') {

	echo "Welcom IN Page Mange";
} elseif ($do == "add") {
	
	echo "Welcom In Page Add";



} else {

	echo "Error Thers Not Page ";
}




