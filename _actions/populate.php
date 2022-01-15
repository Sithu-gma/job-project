<?php
include '../vendor/autoload.php';
use Faker\Factory as Faker;

use Libs\Database\MySQL;
use Libs\Database\Employers;

$faker= Faker::create();
$table= new Employers(new MySQL());

if($table) {
    echo "DATABASE connect .\n";
    for($i=0; $i<10; $i++) {
        $data=[
            'name'=> $faker->name,
            'email'=> $faker->email,
            'phone'=> $faker->phoneNumber,
            'address'=> $faker->address,
            'password'=> md5('password'),
            'role_id'=> 3,
            'post_id'=> $i < 5 ? rand(1,4): 1,
        ];
        $table->insert($data);
    }
    echo "Done pupulation users table. \n";
}

