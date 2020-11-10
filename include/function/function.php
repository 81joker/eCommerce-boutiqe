<?php 



	function getTitle() {
    global $pageTitle;

    if (isset($pageTitle)) {

      echo $pageTitle;

    } else {

    	echo "Defulte";
    }

	}

	/*
  ** Home Redirect Function v2.0
  ** This Function Accept Parameters
  ** $theMsg = Echo The Message [ Error | Success | Warning ]
  ** $url = The Link You Want To Redirect To
  ** $seconds = Seconds Before Redirecting
  */
function redirectHome($theMsg, $url = null ,  $seconds = 3 ) {


      if ($url === null ) {

  
   	  $url = 'index.php';
   	  $link = 'Home Page';

 } else {
   
  if (isset($_SERVER['HTTP_REFERER'])  &&  $_SERVER['HTTP_REFERER'] !== '') {


      $url = $_SERVER['HTTP_REFERER'];
      $link = 'Previous Page';


  } else {

        $url  = 'index.php';
        $link = 'Home Page';

   }	
}
 echo $theMsg;

 echo "<div class='alert alert-info'>You Will Be Redirect To $link After $seconds Second</div>";

 header ("refresh:$seconds; url= $url");
 exit();

}


	/* Chick The Nmae ist Exicest */

	function checkItem ($select, $from , $value) {
    global $con;

    $stmtent = $con->prepare("SELECT $select FROM $from WHERE  $select = ?");
    
    $stmtent->execute(array($value));

    $count=$stmtent->rowCount();

    return $count;

	}
  /*
  ** Count Number Of Items Function v1.0
  ** Function To Count Number Of Items Rows
  ** $item = The Item To Count
  ** $table = The Table To Choose From
  */

 function countItems($item, $table) {
  global $con;


    $stmt3 = $con->prepare("SELECT COUNT($item) FROM $table");


    $stmt3->execute();

    return $stmt3->fetchcolumn();

 }





  /*
  ** Get Latest Records Function v1.0
  ** Function To Get Latest Items From Database [ Users, Items, Comments ]
  ** $select = Field To Select
  ** $table = The Table To Choose From
  ** $order = The Desc Ordering
  ** $limit = Number Of Records To Get
  */


 function getTLatest($select, $table, $order, $limit=5)  {
  global $con;

  $getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

  $getStmt->execute();

  $row = $getStmt->fetchAll();

  return   $row ;




 }