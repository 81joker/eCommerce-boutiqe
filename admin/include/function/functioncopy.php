<?php
function count_all($item , $table , $value=NULL){
    global $con;
    $subquery = '';
    if ($value !== NULL) {
        $subquery = "WHERE $item = ?";
    }
    $stmt3 = $con->prepare("SELECT $item FROM $table $subquery");
    $stmt3->execute(array($value));
    $count = $stmt3->rowCount();
    return $count;
}﻿


function countItem ($item, $table, $reg) {
    global $con;
    if ($reg==1){
        $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table ");
    $stmt2->execute();
   } else {
        $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table WHERE $item= ?");
    $stmt2->execute(array($reg));
  }
 return $stmt2->fetchColumn();
}﻿


function checkItems($Item ,$table){
  global $con;
  $valuee ='';
  if('RagStutes ==0'){
    $valuee = 'WHERE RagStutes =0 ';
  }
    $stmt2 = $con->prepare("SELECT COUNT($Item) FROM $table $valuee");
  $stmt2->execute();
 return $stmt2->fetchColumn();
}﻿
}﻿


