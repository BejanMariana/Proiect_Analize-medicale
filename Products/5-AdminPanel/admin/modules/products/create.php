<?
if(isset($_POST['name'])){
    if($_POST['name'] != '') {
        $filename = microtime() . '.' . getExtension($_FILES['photo']['name']);
        if(mysqli_query($connection,
            "
                INSERT INTO products 
                SET 
                    name = '{$_POST['name']}',
                    pretul = '{$_POST['pretul']}',
                    phone = '{$_POST['phone']}',
                    photo = '{$filename}'
                 "
        )){
            $msg = 'Succesfuly added!';
            $msgClass = 'success';


            move_uploaded_file($_FILES['photo']['tmp_name'], '../public/img/product_photo/' . $filename);
        } else {
            $msg = 'Add error!';
            $msgClass = 'danger';
        }
    }else {
        $msg = 'Error. Name can not be empty';
        $msgClass = 'danger';
    }
}

?>

<div class="row">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="?module=products&action=read">Home</a></li>
      <li class="breadcrumb-item"><a href="?module=products&action=read">Products</a></li>
      <li class="breadcrumb-item active" aria-current="page">Create</li>
    </ol>
  </nav>
</div>

<div class="row">
  <form action="" method="post" enctype="multipart/form-data">

    <div class="alert alert-<?=$msgClass;?>" role="alert">
        <?=$msg;?>
    </div>

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
      <small id="emailHelp" class="form-text text-muted">Product name.</small>
    </div>

    <div class="form-group">
      <label for="pretul">Pretul</label>
      <input type="text" class="form-control" name="pretul" id="pretul" aria-describedby="emailHelp" placeholder="Enter pretul">
    </div>

    <div class="form-group">
      <label for="phone">Phone</label>
      <input type="text" class="form-control" name="phone" id="phone" aria-describedby="emailHelp" placeholder="Enter phone"> 
    </div>


    <div class="form-group">
      <label for="photo">Photo</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="photo" name="photo">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>

    </div>



    <input type="submit" class="btn btn-primary" value="add">
  </form>
</div>

