<?php 
    include("../vendor/autoload.php");
    use Libs\Database\MySQL;
    use Libs\Database\Employees;
    use Libs\Database\Posts;
    use Helpers\HTTP;
    $id=$_GET['id'];
    $yees = new Employees(new MySQL());    
    $data = $yees->getDetail($id); 

    $posts = new Posts(new MySQL());    
    $all = $posts->getPost(); 
  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>JOB</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/"> -->

    <!-- Custom styles for this template -->
    <link href="../css/carousel.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">



    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 1.5rem;
        }
      }
      .featurette-divider {
        margin: 2rem 0; 
        /* Space out the Bootstrap <hr> more */
      }
    </style>    
    
  </head>

  <body>
    
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">JOB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="<?=HTTP::$base.'/index.php' ?>">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="../show.php">Employee</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="#">Create CV</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="#">Edit CV</a>
                </li>
              </ul>
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
       </nav>
    </header>
   

    <main mt-3> 
         <!-- START THE FEATURETTES -->

       <hr>
       
            <div class="container >
                  <?php if (isset($_GET['error'])): ?>
                    <div class="alert alert-warning">
                      Cannot create account. Please try again.
                    </div>
                  <?php endif ?>
              <div class="row featurette">
                <form action="employee-update.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$data->id?>">
                    <div class="mb-3">                       
                        <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder=" Input Your Name" value="<?=$data->name?>">
                    </div>
                    <div class="mb-3">                       
                        <input type="text" name="nrc" class="form-control" id="formGroupExampleInput" placeholder=" Input Your National Identity" value="<?=$data->nrc?>">
                    </div>
                   
                    <div class="mb-3">                       
                        <input type="phone" name="phone" class="form-control" id="formGroupExampleInput" placeholder=" Input Your Phone" value="<?=$data->phone?>">
                    </div>
                    <div class="mb-3">                       
                        <Input type="email" name="email" class="form-control" id="formGroupExampleInput" value="<?=$data->email?>" placeholder=" Input Your Email">
                    </div>
                    <div class="mb-3">                       
                        <input type="password" name="password" class="form-control" id="formGroupExampleInput" value="<?=$data->password?>" placeholder=" Input Your Password">
                    </div>

                    <div class="mb-3">                       
                        <input type="age" name="age" class="form-control" id="formGroupExampleInput" value="<?=$data->age?>" placeholder=" Input Your Age">
                    </div>

                    <div class="mb-3">                       
                        <input type="text" name="address" class="form-control" id="formGroupExampleInput" value="<?=$data->address?>" placeholder=" Input Your Address">
                    </div>
                    <div class="mb-3">                       
                       <select name="post_id" id="" class="form-control">
                       <option value="0"> Choose Position</option>
                         <?php foreach($all as $post):?>
                          <option value="<?=$post->id?>" <?php if($post->id== $data->post_id) echo "selected" ?>> 
                            <?=$post->post_name?>
                          </option>
                         <?php endforeach;?>
                       </select>
                    </div>             
                    <div class=" mb-3">
                      <?php if($data->photo): ?>
                            <img
                            class="img-thumbnail mb-3"
                            src="../_actions/photo/<?= $data->photo ?>"
                            alt="Profile Photo" width="200">
                        <?php endif ?>

                      <input type="file" name="photo" class="form-control" value="<?=$data->photo?>">
                    
                    </div>
                 

                    <button type="submit" class="btn btn-primary">Edit CV</button>

                </form>
                
              </div>  
            </div> 
        <hr class="bg-primary" >
            
          
      
       
        
      <footer class="container bg-dark" style="height:3em; line-height:3em; color:white;" >
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>Design Refrence By Bootstrap  &middot; Sithu Created</p>
      </footer>
    </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>
