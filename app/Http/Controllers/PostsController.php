<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Likes;
use App\User;
use App\Comments;
use App\seguidores;

class PostsController extends Controller

{


   public function __construct()

   {

       $this->middleware('auth');

   }


   public function index(){

       $posts = Post::orderByRaw('created_at DESC')->get();
       foreach ($posts as $post) {
            $data_user          = User::where('id',$post->user->id)->get();
            $post->data_user    = $data_user[0];

            $comentarios = Comments::where('idPost',$post->id)
            ->join('users', 'users.id', '=', 'Comments.user_id')
            ->get();
            //foreach ($comentarios as $comentario){
            //    $comentario->user_comment = User::where('id','=',$comentario->user_id)->select("name")->get(); 
            //}
           
            $post->comments = $comentarios;

            $post->qtdLikes     = Likes::where('idPost', '=', $post->id)->count();
            $user_like          = Likes::where('idPost', '=', $post->id)->where('user_id', '=', auth()->id())->count();
                
                if($user_like == 0){
                    $post->userLike = False;
                }else{
                    $post->userLike = True;
                }
       }
    
       return view('posts.list')->with('posts', $posts);
   }

   public function create() {

       return view('posts.create');

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
       ])->save();


       return redirect()->route('show_posts');

   }

}
