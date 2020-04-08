<?php
namespace App;

final class Movie
{

    public function __construct($id="no id", $name="no name", $session="no session", $hall="no hall", $price="no price")
    {

        $this->id=$id;
        $this->name=$name;
        $this->session=$session;
        $this->hall=$hall;
        $this->price=$price;

    }

}


?>