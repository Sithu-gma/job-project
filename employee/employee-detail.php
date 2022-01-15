<?php
    include("../vendor/autoload.php");
    use Libs\Database\MySQL;
    use Libs\Database\Employees;
    
    $id=$_GET['id'];
    $yees = new Employees(new MySQL());
    $data=$yees->getDetail($id);    

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
        <title>Profile</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-5">
            <!-- <h1 class="mt-5 mb-5">
                <?= $auth->name ?>
                <span class="fw-normal text-muted">
                    (<?= $auth->role ?>)
                </span>
            </h1>
            <?php if(isset($_GET['error'])): ?>
                <div class="alert alert-warning">
                    Cannot upload file
                </div>
            <?php endif ?>
            <?php if($auth->photo): ?>
                <img
                class="img-thumbnail mb-3"
                src="_actions/photos/<?= $auth->photo ?>"
                alt="Profile Photo" width="200">
            <?php endif ?> -->
            <!-- <form action="_actions/upload.php" method="post"  enctype="multipart/form-data">
                <div class="input-group mb-3">
                    <input type="file" name="photo" class="form-control">
                    <button class="btn btn-secondary">Upload</button>
                </div>
            </form> -->
            
            <ul class="list-group">
                        <?php if($data->photo): ?>
                          <img
                          class="img-thumbnail mb-3"
                          src="../_actions/photo/<?= $data->photo ?>"
                          alt="Profile Photo" width="200">
                      <?php endif ?>
                <li class="list-group-item">
                    <b>Name:</b> <?= $data->name ?>
                </li>
                <li class="list-group-item">
                    <b>Phone:</b> <?= $data->phone ?>
                </li>

                <li class="list-group-item">
                    <b>Email:</b> <?= $data->email ?>
                </li>
                <li class="list-group-item">
                    <b>Phone:</b> <?= $data->phone ?>
                </li>
                <li class="list-group-item">
                    <b>Address:</b> <?= $data->address ?>
                </li>
            </ul>
            <br>
            <a href="../show.php" class="text-primary">Back</a> |
            <a href="../index.php" class="text-danger">Main</a>
            <a href="employee-edit.php?id=<?=$data->id?>" class="text-success">Edit</a>
            <a href="employee-del.php?id=<?=$data->id?>" class="text-success">Del</a>
        </div>
    </body>
</html>
