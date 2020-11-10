<?php 

	include "config.php";

	$temp = "include/templates/";
	$css  = "layout/css/";
	$js   =  "layout/js/";
	$func = 'include/function/';


	  // Include Important Files
   include $func . 'function.php';

   include $temp."headerInc.php";



   if (!isset($Navbar)){
    include $temp."navbar.php";
 }   


 function money($number){
   return '$'.number_format($number,2);


 }