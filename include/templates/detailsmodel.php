
 <!-- Footer -->
 <footer class="text-center" id="footer">&Copy; Copyright 2019-2020 Shunta Boutique</footer>



<!--Start Details  Modal-->
<?php ob_start();?>
<div class="modal fade details-1" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="details-1" aria-hidden="true">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
  <div class="modal-header">
   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
   <h4 class="modal-title text-center" >Lives Jeans</h4>
  </div>
  <div class="modal-body">
    <div class="container-fluid">
      <div class="row">
       <div class="col-sm-6">
         <div class="center-block">
          <img src="layout/imag/products/men4.png" alt="Levis Jeans" class="details img-responsive" />
         </div>
       </div>
       <div class="col-sm-6">
         <h4>Details</h4>
         <p>These jeans are amzing! They are straight leg, fit great and look sexy.Get a pair whill</p>
         <hr>
         <p>Price: $34.99</p>
         <p>Brand: Levis</p>
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
              <option value="28">28</option>
              <option value="32">32</option>  
              <option value="36">36</option>  
            </select>
          </div>
         </form>
       </div>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-default" data-dismiss="modal">Close</button>
    <button class="btn btn-danger" type="submit"><span class="glyphicon glyphicon-shopping-cart"></span>Add To Cart</button>
  </div>
 </div>
</div> 
</div>
<!--End Details  Modal-->
<?php echo ob_get_clean();?>