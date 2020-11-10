<?php 

	include "config.php";

	$temp = "include/templates/";
	$css  = "layout/css/";
	$js   =  "layout/js/";
    $lang = 'include/languges/';
	$func = 'include/function/';



	  // Include Important Files
   include $func . 'function.php';
   include   $lang.'english.php';
   include $temp."headerInc.php";



   if (!isset($Navbar)){
    include $temp."navbar.php";
 }   