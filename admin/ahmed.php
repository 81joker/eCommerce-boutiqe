<?php 
include "init.php";

if (isset($_GET['add'])) {
	$brandQuery = $db->query("SELECT * FROM brand ORDER BY brand");
	$praenQuery = $db->query("SELECT * FROM categories WHERE parent= 0 ORDER BY category");

?>


<!-- Start Page Add-->
<h1 class="text-center">Add A New Produvt</h1><hr>
	<form action="products.php?add=1" method="POST" enctype="multipart/form-data">
	<!-- Title-->	
	 <div class="form-group col-sm-3">
		<label for="title">Title*:</label>
		<input type="title" name="title" class="form-control" id="title" 
		value="<?=((isset($_POST['title']))?sanitize($_POST['title']):'');?>">
      </div>
    <!-- Brand-->
      <div class="form-group col-sm-3">
		<label for="brand">Brand*:</label>
		<select class="form-control" id="brand" name="brand" >
			<option value=""<?=((isset($_POST['brand']) && $_POST['brand'] == '')?'Selected':'');?>></option>

			<?php while($brand = mysqli_fetch_assoc($brandQuery)):   ?>
			<option value="<?=$brand['id'];?>"<?=((isset($_POST['brand']) && $_POST['brand'] ==$brand['id'])? 'Selected':'');?>><?=$brand['brand'] ?></option>
			<?php endwhile;?>
		</select>
      </div>

      <!-- Prant-->
      <div class="form-group col-sm-3">
      	<label for="parent">Parent Category*:</label>
      	<select class="form-control" id="prant" name="prant">
      	 <option value=""<?=((isset($_POST['prant'])&& $_POST['prant'] =='')?'Selected':'')?>></option>
      	  <?php while($prant= mysqli_fetch_assoc($praenQuery)):?>
      	  <option value="<?=$prant['id'];?>"<?=((isset($_POST['prant']) && $_POST['prant']== $prant['id'])?'Selected':'')?>>
      	  	<?=$prant['category']?>
      	  	</option>
      	 <?php endwhile; ?>
      	</select>
      </div>
      <div class="form-group col-md-3">
       <label for="child">Child Category*:</label>
       <select id="child" name="child" class="form-control">
       	
       </select>
      </div>
	</form>
<!-- End Page Add-->
<?php
}else {


$sql = "SELECT * FROM products WHERE deletes = 0";
$presults =$db->query($sql);
if (isset($_GET['featuerd'])) {
  $id = (int)$_GET['id'];
  $featured = (int)$_GET['featuerd'];
  $featuredsql= "UPDATE products SET featuerd='$featured' WHERE id='$id'";
  $db->query($featuredsql);
  header('Location: products.php');
}
?>
<h1 class="text-center">Products</h1>
<a href="products.php?add=1" class="btn btn-success pull-right" id="add-product-btn">Add Product</a><div class="clearfix"></div>

<hr>
<div class="container">
<table class="table table-bordered table-condensed table-hover table-stripe">
	<thead><th></th><th>Product</th><th>Price</th></th><th>Category</th><th>Featured</th><th>Sold</th></thead>
	<tbody>
		<?php while($product = mysqli_fetch_assoc($presults)):
 				$chaildID = $product['categoriess'];
 				$catSql = "SELECT * FROM categories WHERE id ='$chaildID'";
 				$result = $db->query($catSql);
 				$child =mysqli_fetch_assoc($result);
 				$parentID = $child['parent'];

 				$pSql =  "SELECT * FROM categories WHERE id ='$parentID'";
 				$presulte = $db->query($pSql);
 				$parentet =mysqli_fetch_assoc($presulte);
 				
 				$category =$parentet['category'].'~'.$child['category'];



		    ?>
		<tr>
		
		<td>
			<a href="products.php?edit=<?= $product["id"];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
		    <a href="products.php?delete=<?= $product["id"];?>" class="btn btn-xs btn-default"><span class="glyphicon glyphicon-remove"></span></a>
	    </td>

		<td><?=$product['title'];?></td>
		<td><?=money($product['price']);?></td>
		<td><?=$category; ?></td>
		<td><a href="products.php?featuerd=<?=(($product['featuerd']== 0)?'1':'0');?>&id=<?=$product['id'];?>" class="btn btn-xs btn-default">
		<span class="glyphicon glyphicon-<?=(($product['featuerd']== 1))?'minus':'plus';?>"></span>
		</a>&nbsp <?=(($product['featuerd'] == 1)?'Featured Producte':'');?>
	   </td>
		<td>joiker</td>
        </tr>
      <?php endwhile; ?>
	</tbody>
</table>
</div>

 <!-- Footer -->
 <footer class="text-center" id="footer">&Copy; Copyright 2019-2020 Shunta Boutique</footer>
<?php 
}
include  $temp."footerInc.php";/* Footer */
 ?>
  
