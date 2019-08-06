<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BooksController extends Controller
{
    public function store(){

    	//$data = $this->valiadeteRequest();

    	Book::create($this->valiadeteRequest());
    }
    public function update(Book $book)
    {
    	//$data = $this->valiadeteRequest();
    	$book->update($this->valiadeteRequest());

    }

    protected function valiadeteRequest(){
    	return request()->validate([
    		'title'=>'required',
    		'author'=>'required',

    	]);

    }
}
