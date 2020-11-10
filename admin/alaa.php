<?php 

include "init.php";


<h1>haloo alaa</h1>
<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/tutorial/core/init.php';
include_once '../includes/head.php';
$parentID = (int)$_POST['parentID'];
$childQuery = $db->query("SELECT * FROM categories WHERE parent = '$parentID' ORDER BY category");
ob_start(); ?>

 <option value =""></option>
 <?php while($child = mysqli_fetch_assoc($childQuery)): ?>
  <option value="<?=$child['id'];?>"><?=$child['category'];?></option>
 <?php endwhile; ?>
<?php echo ob_get_clean(); ?>﻿
 

@Al MajaI will keep looking but little typos like that will break your page :)s on line 6 you have $brandQuery = $db->query("SELECT * FROM barnd ORDER BY brand");

There is a typo it should be $brandQuery = $db->query("SELECT * FROM brand ORDER BY brand");
You have brand mispelled?>
on line 43 you have
        <option value="<?=$parent['id'];?>"<?=((isset($_POST['parent']) && $_POST['parent'] == $parent['id'])?' select':'');?>><?=$parent['category'];?></option>
you have select being echoed it should be
        <option value="<?=$parent['id'];?>"<?=((isset($_POST['parent']) && $_POST['parent'] == $parent['id'])?' selected':'');?>><?=$parent['category'];?></option>
