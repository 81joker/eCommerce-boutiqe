<?php 
include "init.php";

$sql = "SELECT * FROM brand ORDER BY brand";
$result =$db->query($sql);
$errors = array();



//Edit Brand
if (isset($_GET['edit']) && !empty($_GET['edit'])) {
	$edit_id= (int)$_GET['edit'];
	$edit_id=sanitize($edit_id);
	$sql2="SELECT * FROM brand WHERE id ='$edit_id'";
	$edit_result= $db->query($sql2);
	$eBrand=mysqli_fetch_assoc($edit_result);
	}

/**************************************/


// Delete Brand
if (isset($_GET['delete']) && !empty($_GET['delete'])) {
	$delete_id = (int)$_GET['delete'];
	$delete_id=sanitize($delete_id);
	$sql="DELETE FROM brand WHERE id ='$delete_id'";
	$db->query($sql);
	header('Location: brand.php');
    }


	/* If add from database */
	if (isset($_POST['add_submit'])){
	$brand =sanitize($_POST['brand']);



	// Check If brand is blank
	if($_POST['brand'] == ''){
	$errors[] .= "You Must enter a brand !";

	}

	// Check if brand exists in database
	$sql = "SELECT * FROM brand WHERE brand ='$brand' ";
 if(isset($_GET['edit'])){
 	$sql = "SELECT * FROM brand WHERE brand ='$brand' AND id !='$edit_id'";	
 }
	$result =$db->query($sql);
	$count = mysqli_num_rows($result);
	if ($count > 0) {
	$errors[] .= $brand." already exists. Please Chose anthor berand name....";
	}

	// Display Errors
	if(!empty($errors)){
	echo display_errors($errors);
	}else {
	// Add brand to database
	$sql = "INSERT INTO brand (brand) VALUES ('$brand')";

    if(isset($_GET['edit'])){
    $sql = "UPDATE brand SET brand = '$brand' WHERE id = '$edit_id'";
    }

	$db->query($sql);
	header('Location: brand.php');
	}
}



 ?>
<h2 class="text-center">Brands</h2>
 <!--   Brand Form-->
 <div class="container text-center">
	<form  class="form-inline" action="brand.php<?=((isset($_GET['edit']))?'?
edit='.$edit_id:'');?>"  method="POST" >
	<div class="form-group">
	<?php 
		
		if(isset($_GET['edit'])){
		$brand_value = $eBrand['brand'];
		}else{
		$brand_value = '';

		}
	 ?>
		<label for="brand"><?=((isset($_GET['edit']))?"Edit " : "Add A ");?>Brand :</label>
				<input type="text" name="brand" id="brand" class="form-control"
		        value="<?= $brand_value ?>" > 

		<input type="submit" name="add_submit" class="btn btn-success" 
		value="<?=((isset($_GET['edit']))? "Edit Brand" : "Add Brand" ); ?>">
	</div>
	</form>

</div><hr>



 <!-- Table Brand -->

<table class="table table-bordered table-striped  table-condensed"  id="table-auto">
  <thead>
    <tr>
      <th></th>
      <th><a href="<?='brand.php'?>">Brand</a></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  	<?php while($brand = mysqli_fetch_assoc($result)): ?>
    <tr>
      <th ><a href="brand.php?edit=<?= $brand["id"];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a></th>
      <td><?= $brand["brand"];?></td>
      <td><a href="brand.php?delete=<?= $brand["id"];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove-sign"></span></a></td>
    </tr>
<?php endwhile;?>
  </tbody>
</table>





 <!-- Footer -->
 <footer class="text-center" id="footer">&Copy; Copyright 2019-2020 Shunta Boutique</footer>
<?php 
include  $temp."footerInc.php";/* Footer */
 ?>
  
