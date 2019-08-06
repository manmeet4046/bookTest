<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Book;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;


    /** @test */

    public function a_book_can_be_added_to_library(){

       // $this->withoutExceptionHandling();
        $response = $this->post('/books',[
            'title'=>'Cool Book Title',
            'author'=>'Manmeet',

        ]);
        $book = Book::first();
        //$response->assertOk();
        $this->assertCount(1,Book::all());
          $response->assertRedirect($book->path());
    }
     /** @test */
    public function a_title_is_required(){
       //$this->withoutExceptionHandling();
        $response = $this->post('/books',[
            'title'=>'',
            'author'=>'Manmeet',

        ]); 
        $response->assertSessionHasErrors('title');
    }
   /** @test */
    public function a_book_can_be_updated(){

       // $this->withoutExceptionHandling();
        $this->post('/books',[
            'title'=>'Cool Book Title',
            'author'=>'Manmeet',

        ]);
        $book = Book::first();
        $response = $this->patch($book->path() ,[
            'title'=>'New Book Title',
            'author'=>'New Author',
        ]);
        $this->assertEquals('New Book Title', Book::first()->title);
        $this->assertEquals('New Author', Book::first()->author);
          $response->assertRedirect($book->fresh()->path());
    }
/** @test */
    public function a_book_can_be_deleted(){
      // $this->withoutExceptionHandling();
        $this->post('/books',[
            'title'=>'Cool Book Title',
            'author'=>'Manmeet',

        ]);
        $book = Book::first();
        
        $this->assertCount(1,Book::all());

        $response = $this->delete($book->path() );
        $this->assertCount(0,Book::all());
        $response->assertRedirect('/books');
    }
}
