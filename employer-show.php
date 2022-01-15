<?php 
    include("vendor/autoload.php");
    use Libs\Database\MySQL;
    use Libs\Database\Employees;
    use Libs\Database\Employers;
    use Helpers\Auth;
    $yees = new Employees(new MySQL());
    $yers= new Employers(new MySQL());
  
    $employers=$yers->getAll();
    
    
  ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>JOB( Employer Section )</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/"> -->

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
<!-- /docs/5.1/dist/css/bootstrap.min.css -->
    <!-- Favicons -->
<!-- <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180"> -->
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


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
                <a class="nav-link" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Employer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="employer/employer-create.php">Create Company Profile</a>
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

    <main> 
         <!-- START THE FEATURETTES -->

       <hr >
      <?php foreach($employers as $row):?>
          <div class="container">
                <div class="row featurette">
                    <div class="col-md-3">
                      
                        <?php if($row->logo): ?>
                              <img
                              class="img-thumbnail mb-3"
                              src="_actions/photo/<?= $row->logo?>"
                              alt="Profile Photo" width="200">
                          <?php endif ?>
                    </div>

                    <div class="col-md-9">                
                        <h4 class="featurette-heading">
                        <a href="employer/employer-detail.php?id=<?=$row->id ?>"><?php echo $row->name;?></a>  
                        <span class="text-muted"><i>Phone No.<?php echo $row->phone;?> </i></span>
                        </h4>
                        <p class="lead"><?php echo $row->email;?> </p>
                    </div>                

                </div>  
            </div> 
            <hr >
        <?php endforeach; ?>
          
      
       
        
      <footer class="container bg-dark" style="height:3em; line-height:3em; color:white;" >
        <p class="float-end"><a href="#">Back to top</a></p>
        <p>Design Refrence By Bootstrap  &middot; Sithu Created</p>
      </footer>
    </main>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      
  </body>
</html>
