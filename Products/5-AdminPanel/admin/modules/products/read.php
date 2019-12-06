<?php
$result = mysqli_query($connection, "SELECT photo FROM products WHERE id={$_GET['id']}");
        if($result){
            $product = mysqli_fetch_assoc($result);
            if(!empty($product['photo'])  && file_exists('../public/img/product_photo/' . $product['photo'])){
                unlink('../public/img/product_photo/' . $product['photo']);
            }
        }

if(mysqli_query($connection, "DELETE FROM products WHERE id={$_GET['id']}")){
    $msg = 'Succesfuly deleted!';
} else {
    $msg = 'Delete error!';
}

$result = mysqli_query($connection, "
  SELECT 
    products.id, 
    products.name,
    products.photo,
    products.pretul,
    products.phone
    
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
  <table class="table">
    <thead>
    <tr>
      <th>Photo</th>
      <th>ID</th>
      <th>Name</th>
       <th>Pretul MDL</th>
        <th>Phone</th>
      <th>
        <a class="btn btn-primary" href="?module=products&action=create">Create</a>
      </th>
    </tr>
    </thead>
    <tbody>
    <?
    while($element = mysqli_fetch_assoc($result)){

      if(empty($element['photo']) || !file_exists('../public/img/product_photo/' . $element['photo'])){
          $element['photo'] = 'no_image.jpg';
      }
        ?>
      <tr>
        <td>
          <img src="../public/img/product_photo/<?=$element['photo'];?>" alt="%jpg%">
        </td>
        <td><?=$element['id'];?></td>
        <td><?=$element['name'];?></td>
        <td><?=$element['pretul'];?></td>
        <td><?=$element['phone'];?></td>
        
        <td>
          <a href="index.php?module=products&action=read&id=<?=$element['id'];?>" onclick="return confirm('Do you want to delete?')">X</a>
          <a href="index.php?module=products&action=update&id=<?=$element['id'];?>">M</a>
        </td>
      </tr>
        <?
    }?>
    </tbody>

  </table>
  <? }?>
</div>

