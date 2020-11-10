<?php 
$sql="SELECT * FROM categories WHERE parent = 0";
$pquery=$db->query($sql);
   ?>



<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <a href="index.php" class="navbar-brand">Shaunte Boutiqe Admin</a>
     
<ul class="nav navbar-nav">
  <!-- Main Items -->
   <li><a href="brand.php">Brand</a></li>
     <li><a href="categories.php">Category</a></li>
     <li><a href="products.php">Products</a></li>

  </ul>

 
 </div>
</nav>
<!-- End Top Nav Bar -->
