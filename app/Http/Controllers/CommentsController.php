<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Comments;


class CommentsController extends Controller

{

    public function CreateComment(Request $data) {        
        $comments = Comments::create([

            'user_id' => auth()->id(),
 
            'Comentario' => request('Comentario'),

            'idPost'    => request('idPost'),
 
        ])->save();

        return redirect()->route('show_posts');
    }

    public function DeleteComments(Request $data){
        Comments::where('idComments', '=', $data['idComents'])->delete();
        return redirect()->route('show_posts');
    }

}