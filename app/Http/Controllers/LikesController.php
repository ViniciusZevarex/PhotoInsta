<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;


class CommentsController extends Controller

{

    public function CreateComment() {        
        $comments = Comentarios::create([

            'user_id' => auth()->id(),
 
            'description' => request('description'),
 
            'filter' => request('filter'),
 
            'likes' => 0
 
        ])->save();
    }


    public function ShowComment(){

    }

    public function DeleteComments(){

    }

}