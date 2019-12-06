<?php
$result = mysqli_query($connection, "
  SELECT 
    products.idProduct, 
    products.name,
    products.photo
    
  FROM 
    products
");

?>
<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="?module=products&action=read">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Products</li>
    </ol>
  </nav>
</div>
<div class="row">
    <?
    if(!$result){?>
      <div class="alert alert-warning" role="alert">
        No data
      </div>
    <?} else {?>

    <?
    while($element = mysqli_fetch_assoc($result)){
        ?>
      <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?=$element['name'];?></h5>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
        <?
    }?>

  <? }?>
</div>

