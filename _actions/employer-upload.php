<?php
    include '../vendor/autoload.php';
    // use Faker\Factory as Faker;

    use Libs\Database\MySQL;
    use Libs\Database\Employers;
    use Helpers\HTTP;

    $data= [
        'name'=>$_POST['name']?? "unknown",        
        'phone'=>$_POST['phone']?? "unknown",
        'email'=>$_POST['email']?? "unknown",
        'password'=>md5($_POST['password']),       
        'address'=>$_POST['address']?? "unknown",
        'post_id'=>$_POST['post']?? "unknown",
        'role_id'=> 3,        
        'logo'=> $_FILES['logo']['name'],
    ];
        $logo=$_FILES['logo']['name'];
        $error = $_FILES['logo']['error'];
        $tmp = $_FILES['logo']['tmp_name'];
        $type = $_FILES['logo']['type'];


    $obj=new Employers(new MySQL);
    if($obj){
        if($type === "image/jpeg" or $type === "image/png") {           
            move_uploaded_file($tmp, "photo/$logo");           
        }
        
        $obj->create($data);
        HTTP::redirect("/employer-show.php", "registered=true");
    } else {
     HTTP::redirect("/create.php", "error=true");
    }
