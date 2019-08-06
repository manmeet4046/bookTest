<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Author;
use Carbon\Carbon;
class AuthorManagementTest extends TestCase
{
      use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
  /** @test */

  public function an_author_can_be_created(){
    $this->withoutExceptionHandling();
    $this->post('/author',[
        'name'=>'Author Name',
        'dob'=>'05/14/1978',

    ]);
    $author = Author::all();
    $this->assertCount(1,$author);
    $this->assertInstanceOf(Carbon::class,$author->first()->dob);
    $this->assertEquals('1978/14/May',$author->first()->dob->format('Y/d/M'));
  }
}