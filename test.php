<?php
interface Animal{
    public function move();
}
class Dog implements Animal{
    public function move ()
    {
        echo "The Dog Is Running";
    }
}
class Fish implements Animal{
    public function move ()
    {
        echo "The Fish is Swimming.";
    }
}

function app(Animal $obj){
    $obj->move();
}
app(new Dog);
app(new Fish);