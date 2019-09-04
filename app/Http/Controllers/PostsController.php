<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;


class PostsController extends Controller

{


   public function __construct()

   {

       $this->middleware('auth');

   }


   public function index(){

       $posts = Post::all();

       return view('posts.list')->with('posts', $posts);

   }


   public function create() {

       return view('posts.create');

   }

   public function like(Request $data){

    $post_like = Post::findOrFail($data['idPost']);
    $post_like->likes += 1;
    $post_like->save();

    $posts = Post::all();

    return view('posts.list')->with('posts', $posts);;

   }
   public function store(Request $data){

       request()->validate([

           'image_path' => ['required', 'image']          

       ]);      

       $post = Post::create([

           'user_id' => auth()->id(),

           'image_path' => request()->file('image_path')->store('posts', 'public'),

           'description' => request('description'),

           'filter' => request('filter'),

           'likes' => 0

       ])->save();


       return redirect()->route('show_posts');

   }

}