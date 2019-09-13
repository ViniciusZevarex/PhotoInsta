<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Post;

use App\Likes;

use App\User;

class LikesController extends Controller

{

    public function like(Request $data) {
        $user_like = Likes::where('idPost', '=', $data['idPost'])->where('user_id', '=', auth()->id())->count();
        
        if($user_like == 0){
            $likes = Likes::create([

                'user_id' => auth()->id(),
    
                'idPost'  => $data['idPost'],
    
                'description' => request('description'),
    
                'filter' => request('filter'),
    
            ])->save();
        }

        return redirect()->route('show_posts');
    }

    public function unlike(Request $data){
        Likes::where('idPost', '=', $data['idPost'])->where('user_id', '=', auth()->id())->delete();
        return redirect()->route('show_posts');
    }

}

// public function like(Request $data){
    //     $post_like = Post::findOrFail($data['idPost']);
    //     $post_like->likes += 1;
    //     $post_like->save();
    //     $posts = Post::all();
    //     return view('posts.list')->with('posts', $posts);
    //    }
