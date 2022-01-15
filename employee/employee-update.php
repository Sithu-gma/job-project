<?php
    include '../vendor/autoload.php';
    // use Faker\Factory as Faker;

    use Libs\Database\MySQL;
    use Libs\Database\Employees;
    use Helpers\HTTP;

    $data= [
        'id'=>$_POST['id'],
        'name'=>$_POST['name'] ?? "unknown",
        'nrc'=>$_POST['nrc']?? "unknown",
        'phone'=>$_POST['phone']?? "unknown",
        'email'=>$_POST['email']?? "unknown",
        'password'=>md5($_POST['password']),
        'age'=>$_POST['age']?? "unknown",
        'address'=>$_POST['address']?? "unknown",
        'post_id'=>$_POST['post_id']?? "unknown",     
        'photo'=> $_FILES['photo']['name'],
    ];
        $photo=$_FILES['photo']['name'];
        $error = $_FILES['photo']['error'];
        $tmp = $_FILES['photo']['tmp_name'];
        $type = $_FILES['photo']['type'];


    $obj=new Employees(new MySQL);
    if($obj){
        if($type === "image/jpeg" or $type === "image/png") {           
            move_uploaded_file($tmp, "../_actions/photo/$photo");           
        }
        
        $obj->update($data);
        HTTP::redirect("/show.php", "registered=true");
    } else {
     HTTP::redirect("/create.php", "error=true");
    }
    echo $data['name'];
