<?php
use PHPUnit\Framework\TestCase;
use App\Cartelera;

final class CarteleraTest extends TestCase
{

    public function test_create_movie(){
        
      $id = 0;
      $name = "Frozen";
      $session = 4;
      $hall = 3;
      $price = 5.5;

        $Movie= Cartelera::createMovie($id, $name, $session, $hall, $price);

        var_dump($Movie);

        $this->assertSame($id, $Movie->id);
        $this->assertSame($name, $Movie->name);
        $this->assertSame($session, $Movie->session);

   }

   public function test_read_movie_name(){

        $Movie= Cartelera::createMovie(0, "Fast and Furious", 5, 1, 5.5);

        $MovieName= Cartelera::readMovieName($Movie);

        $this->assertSame($MovieName,$Movie->name);
   }

   public function test_create_empty_list(){

        $MovieList= Cartelera::createEmptyList();

        $this->assertEmpty($MovieList);
   }

   public function test_add_movie(){

        $exampleList=array();

        $Movie= Cartelera::createMovie(0, "No", 4, 1, 5.5);

        $UpdatedList= Cartelera::addMovie($exampleList, $Movie);

        $this->assertContains($Movie, $UpdatedList);
   }
   
   public function test_delete_movie(){

        $Movie1= Cartelera::createMovie(0, "Fast and Furious", 5, 1, 5.5);
        $Movie2= Cartelera::createMovie(1, "Frozen", 5, 1, 5.5);
       
        $exampleList=[$Movie1,$Movie2];

        $MovieToDelete= $Movie1;

        $UpdatedList=Cartelera::deleteMovie($MovieToDelete, $exampleList);

        $this->assertNotContains($MovieToDelete, $UpdatedList);
   }

   public function test_generate_id(){

        $Movie1= Cartelera::createMovie();
        $Movie2= Cartelera::createMovie();
        $Movie3= Cartelera::createMovie();
        $Movie4= Cartelera::createMovie();
       
        $List=[$Movie1,$Movie2, $Movie3,$Movie4];

        $UpdatedList= Cartelera::generateID($List);

        $this->assertSame(0,$Movie1->id);
        $this->assertSame(1,$Movie2->id);
        $this->assertSame(2,$Movie3->id);
        $this->assertSame(3,$Movie4->id);

   }

   public function test_update_name()
   {
       
       $Movie= Cartelera::createMovie(0, "Harry Potter", 4, 3, 5.5);
       $MovieName="Frozen";
       $UpdatedMovie= Cartelera::updateName($Movie, $MovieName);

       $this->assertSame($MovieName, $UpdatedMovie->name);

   }

   public function test_update_session()
   {
       
       $Movie= Cartelera::createMovie(0, "Harry Potter", 4, 3, 5.5);
       $MovieSession= 5;
       $UpdatedMovie= Cartelera::updateSession($Movie, $MovieSession);

       $this->assertSame($MovieSession, $UpdatedMovie->session);

   }
   public function test_update_hall()
   {
       
       $Movie= Cartelera::createMovie(0, "Harry Potter", 4, 3, 5.5);
       $Moviehall= 1;
       $UpdatedMovie= Cartelera::updateHall($Movie, $MovieHall);

       $this->assertSame($MovieHall, $UpdatedMovie->hall);

   }
   public function test_update_price()
   {
       
       $Movie= Cartelera::createMovie(0, "Harry Potter", 4, 3, 5.5);
       $MoviePrice= 8;
       $UpdatedMovie= Cartelera::updatePrice($Movie, $MoviePrice);

       $this->assertSame($MoviePrice, $UpdatedMovie->price);

   }

   public function test_create_billboard()
   {
       $Billboard=Cartelera::createBillboard();

       $this->assertIsArray($Billboard);
       $this->assertInstanceOf('App\Movie', $Billboard[0]);

   }
}
