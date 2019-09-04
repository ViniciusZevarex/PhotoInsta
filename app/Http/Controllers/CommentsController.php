<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;


class CommentsController extends Controller

{

    public function CreateComment(Request $data) {        
        $comments = Comentarios::create([

            'user_id' => auth()->id(),
 
            'Comentario' => request('Comentario'),
 
            'likesComentario' => 0 
 
        ])->save();


    }

    public function LikeComentario()
    {
        $comments_likes = Post::findOrFail('user_id', auth()->id());
        $comments_likes->likes += 1;
        $comments_likes->save();
    }
    public function ShowComment(){

    }

    public function DeleteComments(Request $request){
        $idEvento = $request->query('deletar_evento');
        Comentarios::destroy($request->idPost);
        
        return redirect()->route('listEvent');
    }

}