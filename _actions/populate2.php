
<?php
include '../vendor/autoload.php';
use Faker\Factory as Faker;

use Libs\Database\MySQL;
use Libs\Database\Employees;

$faker= Faker::create();
$employee= new Employees(new MySQL());
if($employee) {
    echo "DATABASE connect .\n";
    for($i=0; $i<10; $i++) {
        $data=[
            'name'=> $faker->name,
            'nrc'=> $faker->phoneNumber,
            'phone'=> $faker->phoneNumber,
            'email'=> $faker->email,
            'password'=> md5('password'),
            'age'=>rand(18,35),
            'address'=> $faker->address,
            'role_id'=> 2,
            'post_id'=> $i < 5 ? rand(1,4): 1,
        ];
        $employee->create($data);
    }
    echo "Done pupulation Employees Table. \n";
}