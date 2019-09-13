@extends('layouts.app')

@section('content')
<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-body">
                    <span class="col-12">
                    <h3 class="">Para adicionar um post clique </h3> 
                    <h3><a href="{{route('CreatePosts')}}" class="btn btn-dark">Aqui</a></h3>
                    </span>
                </div>
            </div>
            
            @if(!$posts->isEmpty())
                @foreach ($posts as $post)
                    <div class="card mt-4 shadow">
                        <div class="col-12 p-2">
                            <div class="row">
                                <img class="profile-user-post" src="{{ url('storage/' . $post->data_user->avatar_path)}}">
                                <a class="col-10 link-none-decoration" href="{{route('user_profile',['idUser' => $post->data_user->id])}}">
                                    <h5>{{$post->data_user->name}}</h5>
                                </a>
                            </div>
                        </div>
                        <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">

                        <div class="card-body row">
                            
                                <div class="row col-12 p-3">
                                    <div class="col-12">                        
                                        @if (!$post->userLike)
                                            <a class="btn btn-outline-danger col-1" href="{{route('like', ['idPost' => $post->id])}}">
                                                <i class="material-icons">thumb_up</i>
                                            </a>
                                        @else
                                            <a class="btn btn-danger col-1" href="{{route('unlike', ['idPost' => $post->id])}}">
                                                <i class="material-icons">thumb_down</i>
                                            </a>
                                        @endif
                                    </div>
                                   
                                </div> 
                                <div class="col-12"><h4>Curtido por {{$post->qtdLikes}} pessoas</h4></div>
                                <h4 class="col-12">{{$post->description}}</h4>
                                
                            
                        </div>
                        <!-- comments -->
                        <ul class="list-group comment-list">
                        @foreach ($comments as $comment)
                          <li class="list-group-item">{{$comment->comentario}}</li>
                        @endforeach
                          <li class="list-group-item">
                                <form class="form-inline col-12" method="GET" action="{{route('CreateComment')}}">
                                    <input class="form-control col-10" type="search" placeholder="Comentario" name="Comentario" aria-label="Pesquisar">
                                    <button class="btn btn-outline-success my-2 col-2" type="submit">Comentar</button>
                                </form>
                          </li>
                        </ul>
                    </div>
                @endforeach
            @else
                <h2 class="text-center">Nenhum post a Mostrar!</h2>
                <h3 class="text-center">Adicione um post clicando <a href="{{ route('CreatePosts') }}">aqui</a></h3>
            @endif
       </div>

   </div>

</div>

@endsection
