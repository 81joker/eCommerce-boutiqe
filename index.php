<?php include "init.php";
$Navbar    ="";




 ?>
<!-- Headr -->
<div id="headerWrapper">
  <div id="back-flower"></div>
  <div id="logotext"></div>
  <div id="for-flower"></div>
  </div>

 <div class="container-fluid">
 
<!-- left side bar-->
<?php include "include/templates/left.php"; ?>
<?php 


$sql3="SELECT * FROM products WHERE featuerd  = 1";
$featuerd=$db->query($sql3);


?>
    <!-- Main Content -->
    <div class="col-md-8">
     <div class="row">
      <h2 class="text-center">Feature Producte</h2>
       <?php while($product = mysqli_fetch_assoc($featuerd)) : ?>
        <div class="col-md-3 text-center">
          <h4><?= $product['title'];?></h4>
          <img src="<?= $product['image'];?>" alt="Levis Jeans" class="img-thumb" />
          <p class="list-price text-danger">List Price : <s>$<?= $product['price'];?></s></p>
          <p class="price">Our Price : $<?= $product['list_price'];?></p>
          <button type="button" class="btn btn-sm btn-success"  onclick="detailsmodal(<?= $product['id'];?>)">Details
          </button>
        </div>

        <?php endwhile; ?>

      </div>
     </div>




<?php 


include "include/templates/right.php";/*right side bar  */
include  $temp."footerInc.php";/* Footer */
 ?>
  
