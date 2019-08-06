<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;


class AuthorsController extends Controller
{
   public function store(){

    	//$data = $this->valiadeteRequest();

    	$author = Author::create($this->valiadeteRequest());
    	//return redirect($book->path());
    }

     protected function valiadeteRequest(){
    	return request()->validate([
    		'name'=>'required',
    		'dob'=>'required',

    	]);

    }
}
