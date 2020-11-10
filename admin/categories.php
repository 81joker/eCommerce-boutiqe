<?php 
include "init.php";

// Delete Brand
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
	$delete_id = (int)$_GET['delete'];
	$delete_id=sanitize($delete_id);
	$sql="DELETE FROM cat WHERE id ='$delete_id'";
	$db->query($sql);
	header('Location: categories.php');
    }

//Edit Brand
if (isset($_GET['edit']) && !empty($_GET['edit'])) {
	$edit_id= (int)$_GET['edit'];
	$edit_id=sanitize($edit_id);
	$sql2="SELECT * FROM cat WHERE id ='$edit_id'";
	$edit_result= $db->query($sql2);
	$edit_cat=mysqli_fetch_assoc($edit_result);
	
	}


$sql = "SELECT * FROM cat WHERE parent = 0";
$result =$db->query($sql);
$errors = array();
$category = '';
$post_parent = '';


//Procec Form 
if(isset($_POST) && !empty($_POST)){

$post_parent =sanitize($_POST['parent']);
$category =sanitize($_POST['category']);
$sqlform="SELECT * FROM cat WHERE category='$category' AND parent='$post_parent' ";
    if (isset($_GET['edit'])) {
      $id = $edit_cat['id'];
      $sqlform = "SELECT * FROM cat WHERE category = '$category' AND parent = '$post_parent' AND id != '$id'";
    }
$fresult=$db->query($sqlform);
$count=mysqli_num_rows($fresult);

// If Catwgory ist blank 
if ($category == '') {
	$errors[] .= "The Category cannot be left blank";
}

// If the exists in database
if ($count > 0) {
	$errors[] .= $category. " elerdy exists.Plase choose a new category .";
}

//Display Erroers or Updata Database
if (!empty($errors)) {
	
$display = display_errors($errors); ?>
<script >
	$('document').ready(function(){
      $('#errors').html('<?=$display; ?>');
	});
</script>
<?php 
}else{

$upsql = "INSERT INTO cat (category,parent) VALUES ('$category','$post_parent')";
if (isset($_GET['edit'])) {
  $upsql ="UPDATE  cat SET category= '$category',parent= $post_parent WHERE id = '$edit_id' ";
}

$db->query($upsql);

header("Location: categories.php");
 }

}


?>
  <?php 

	
	
 $cat_value = '';
  $parent_value = 0;
  if (isset($_GET['edit'])){
    $cat_value = $edit_cat['category'];
    $parent_value = $edit_cat['parent'];
  }else {
    if (isset($_POST)) {
      $cat_value = $category;
      $parent_value = $post_parent;
    }
  }

	    ?>



<h2 class="text-center">Category</h2><hr>


<div class="row">
 <!-- Form-->
 <div class="col-sm-6">
  <legend class=""><?=((isset($_GET['edit']))?"Edit A" : "Add A ");?> Category</legend>
  <div id="errors"></div>
   <form class="form" method="POST"
    action="categories.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>">
	   	<div class="form-group">
	    <label for="parent">Parent</label> 		
	     <select name="parent" id="parent" class="form-control" >
	     	<option value="0"<?=(($parent_value == 0)?' selected="selected"':'');?>>Parent</option>
	         <?php while($parent=mysqli_fetch_assoc($result)) : ?>
	         <option value="<?=$parent['id'];?>"<?=(($parent_value == $parent['id'])?' selected="selected"':'');?>><?=$parent['category'];?></option>
	     	 <?php endwhile;?>
	     </select>
	    </div>
	    <div class="form-group">
	  
		
	      <label for="category">Category</label>
	      <input type="text" name="category" id="category" class="form-control" value="<?=$cat_value;?>">
	     </div>	
	     <div class="form-group">
	      <input type="submit"  value="<?=((isset($_GET['edit']))?'Edit Category' : 'Add Category'); ?>" class="btn btn-success">
	     </div>	
   </form>
 </div>

 <!-- Table Brand -->
  <div class="col-sm-6">
	<table class="table table-bordered">
	  <thead>
		<th>Category</th><th>Parent</th><th></th>
	  </thead>
	  <tbody>
	   <?php
	    $sql = "SELECT * FROM cat WHERE parent = 0";
        $result =$db->query($sql);
	    while($parent = mysqli_fetch_assoc($result)):
		$parent_id = (int)$parent['id'];

		$sql2 = "SELECT * FROM cat WHERE parent = '$parent_id'";
		$cresult = $db->query($sql2);

	      ?> 	
	    <tr class="bg-primary">
			<td><?=$parent['category'];?></td>
			<td>Parent</td>
			<td>
			 <a href="categories.php?edit=<?=$parent['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
			 <a href="categories.php?delete=<?=$parent['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a>
			</td>
	    </tr>
	
	   <?php while($chaild=mysqli_fetch_assoc($cresult)): ?>
	    <tr class="bg-info">
			<td><?=$chaild['category'];?></td>
			<td><?=$parent['category'];?></td>
			<td>
			 <a href="categories.php?edit=<?=$chaild['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
			 <a href="categories.php?delete=<?=$chaild['id'];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a>
			</td>
	    </tr>
	    <?php endwhile;?>
     <?php endwhile;?>
	  </tbody>
	</table>
</div>



 <!-- Footer -->
 <footer class="text-center" id="footer">&Copy; Copyright 2019-2020 Shunta Boutique</footer>
<?php 
include  $temp."footerInc.php";/* Footer */
 ?>
  
