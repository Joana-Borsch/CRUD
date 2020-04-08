<?php
namespace App;
use App\Movie;

class Cartelera{


    public static function createMovie($id="no id", $name="no name", $session="no session", $hall="no hall", $price="no price"){

        $Movie1= new Movie($id, $name, $session, $hall, $price);
        return $Movie1;
    }



    public static function readMovieName($Movie){
        echo "$Movie->name";
        return $Movie->name;
    }
    public static function addMovie($list, $movieName){
       
        array_push($list, $movieName);

        return $list;
    }
    public static function createEmptyList(){
        $list=array();
        return $list;
    }
    public static function deleteMovie($Movie, $listOfMovies){

        $id=$Movie->id;
        unset($listOfMovies[$id]);
        return $listOfMovies;
        
    }

    public static function generateID($list){
        $count=0;
        foreach ($list as &$value){
            $value->id=$count;
            var_dump($value->id);
            $count++;
            var_dump($value->id);
        }
        return $list;
    }

    public static function updateName($Movie, $movieName)
    {
        $Movie->name = $movieName;
        return $Movie;
    }
    public static function updateSession($Movie, $movieSession)
    {
        $Movie->session = $movieSession;
        return $Movie;
    }
    public static function updateHall($Movie, $movieHall)
    {
        $Movie->hall = $movieHall;
        return $Movie;
    }
    public static function updatePrice($Movie, $moviePrice)
    {
        $Movie->price = $moviePrice;
        return $Movie;
    }

    public static function createBillboard()
    {
        $Billboard=[];
        $Movie1= self::createMovie(0, "Frozen", 4, 3, 5.5);
        $Movie2= self::createMovie(0, "Fast and Furious", 4, 3, 5.5);
        $Movie3= self::createMovie(0, "Harry Potter", 4, 3, 5.5);
        $Movie4= self::createMovie(0, "La Lego, la película", 4, 3, 5.5);
        $Movie5= self::createMovie(0, "No", 4, 3, 5.5);

        $Billboard=self::addMovie($Billboard,$Movie1);
        $Billboard=self::addMovie($Billboard,$Movie2);
        $Billboard=self::addMovie($Billboard,$Movie3);
        $Billboard=self::addMovie($Billboard,$Movie4);
        $Billboard=self::addMovie($Billboard,$Movie5);
        
        $Billboard=self::generateID($Billboard);

        var_dump($Billboard);
        return($Billboard);
    }
    

}