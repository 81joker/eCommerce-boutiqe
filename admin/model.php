<?php 
 include "init.php";
$id = $_POST['id'];
$id = (int)$id;
$sql=("SELECT * FROM products WHERE id ='$id'");
$resuelt =$db->query($sql);
$product = mysqli_fetch_assoc($resuelt);

$brand_id = $product['brand'];
$spl2 = "SELECT brand FROM brand WHERE id ='$brand_id'";
$brand_query =$db->query($spl2);
$brand = mysqli_fetch_assoc($brand_query);

$sizstring = $product['sizes'];
$size_array=explode(',', $sizstring);


  
 
  

?>



<!--Start Details  Modal-->
<?php ob_start();?>
<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
  <div class="modal-header">
   <button class="close" type="button" data-dismiss="modal" aria-label="Close" onClick="document.location.reload(true)">
     <span aria-hidden="true">&times;</span>
   </button>
 
   <h4 class="modal-title text-center" ><?= $product['title'];?></h4>
   
  </div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
       <div class="col-sm-6">
         <div class="center-block">
          <img src="<?= $product["image"];?>" alt="<?= $product['title'];?>" class="details img-responsive" />
         </div>
       </div>
       <div class="col-sm-6">
         <h4>Details</h4>
         <p><?= $product['description'];?></p>
         <hr>
         <p>Price: $<?= $product['price'];?></p>
         <p>Brand: <?= $brand["brand"];  ?></p>
         <form action="add_cart.php" method="POST" >
          <div class="form-group">
          <div class="col-xs-3">
            <label for="quantity">Quantity:</label>
            <input type="text" class="form-control" id="quantity" name="quantity">
            </div><div class="col-xs-9"></div>
            <p>Available: 3</p>
          </div></br></br>
          <div class="form-group">
            <label for="size">Size: </label>


            <select class="form-control" id="size" name="size">
              <option value=""></option>
              <?php foreach($size_array as $string){
              $string_array = explode(':',  $string);
              $size =$string_array[0];
              $quantity=$string_array[1];
              echo "<option value='".$size."'>$size ($quantity. Available)</option>";
              }

              ?>
            </select>


          </div>
         </form>
       </div>
      </div>
    </div>
  </div>
  
  <div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal" onClick="document.location.reload(true)">Close</button>
    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</button>
  </div>
 </div>
</div> 
</div>


<!--End Details  Modal-->
<script>

  


</script>
<?php echo ob_get_clean();?>

