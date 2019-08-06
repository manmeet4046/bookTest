<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BooksController extends Controller
{
    public function store(){

    	//$data = $this->valiadeteRequest();

    	$book = Book::create($this->valiadeteRequest());
    	return redirect($book->path());
    }
    public function update(Book $book)
    {
    	//$data = $this->valiadeteRequest();
    	$book->update($this->valiadeteRequest());
    	return redirect($book->path());
    }
    public function destroy(Book $book){
    	$book->delete();
    	return redirect('/books');
    }

    protected function valiadeteRequest(){
    	return request()->validate([
    		'title'=>'required',
    		'author'=>'required',

    	]);

    }
}
