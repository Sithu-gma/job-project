<?php
include '../vendor/autoload.php';
use Libs\Database\MySQL;
use Libs\Database\Employees;
use Helpers\HTTP;

$id=$_GET['id'];
$obj=new Employees(new MySQL);
if($obj){
    $obj->delete($id);
    HTTP::redirect("/show.php");
}