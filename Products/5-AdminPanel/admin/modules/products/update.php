<?
$result = mysqli_query($connection, "SELECT photo FROM products WHERE id={$_GET['id']}");
        if($result){
            $product = mysqli_fetch_assoc($result);
            if(!empty($product['photo'])  && file_exists('../public/img/product_photo/' . $product['photo'])){
                unlink('../public/img/product_photo/' . $product['photo']);
            }
        }
if(isset($_POST['name'])){
    if($_POST['name'] != '') {
        if(mysqli_query($connection, "
                UPDATE 
                    products 
                SET 
                    name = '{$_POST['name']}',
                    pretul = '{$pretul}',
                    phone = '{$phone}',
                    photo = '{$filename}',
                      
                WHERE 
                id={$_GET['id']}
            ")){
            $msg = 'Update succes';
            $msgClass = 'success';
        } else {
            $msg = 'Update ERROR';
            $msgClass = 'danger';
        }
    } else {
        $msg = 'Error. Name can not be empty';
        $msgClass = 'danger';
    }
}

$result = mysqli_query($connection, "SELECT id, name, pretul, phone, photo FROM products WHERE id={$_GET['id']}");
if($result){
    $products = mysqli_fetch_assoc($result);
   $resultproducts = mysqli_query($connection, "SELECT id, name, pretul, phone, photo FROM `products`");
       
}

 
       
?>
<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.php">Home</a></li>
      <li class="breadcrumb-item"><a href="?module=products&action=read">Products</a></li>
      <li class="breadcrumb-item active" aria-current="page">Update</li>
    </ol>
  </nav>
</div>

<div class="row">
  <form action="" method="post">
    <div class="alert alert-<?=$msgClass;?>" role="alert">
        <?=$msg;?>
    </div>

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" value="<?=$products['name'];?>" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
      <small id="emailHelp" class="form-text text-muted">Product name.</small>
    </div>
    <div class="form-group">
      <label for="name">Pretul</label>
      <input type="text" value="<?=$products['pretul'];?>" class="form-control" name="pretul" id="pretul" aria-describedby="emailHelp" placeholder="Enter pretul">
      <small id="emailHelp" class="form-text text-muted">Product pret.</small>
    </div>

    <div class="form-group">
      <label for="name">Phone</label>
      <input type="text" value="<?=$products['phone'];?>" class="form-control" name="phone" id="phone" aria-describedby="emailHelp" placeholder="Enter phone">
      <small id="emailHelp" class="form-text text-muted">Product phone.</small>
    </div>

    
    <div class="form-group">
      <label for="photo">Photo</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="photo" name="photo">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>

    <input type="submit" class="btn btn-primary" value="save">
  </form>
</div>




