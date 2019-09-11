@extends('layouts.app')

@section('content')

    <div class="jumbotron jumbotron-fluid bg-white col-md-12">
        <div class="container row">
            <div class="col-md-4">
                <img class="profile-user-list" src="{{asset('images/icons/upload.png')}}">
            </div>
            <div class="col-md-8">
                <h1 class="display-4">Nome do Usuário</h1>
                <p class="lead">Ver seguidores</p>
            </div>
        </div>
    </div>
   <div class="row">
        <div class="card col-md-12">
            <div class="card-body">
                <!-- if(!$posts->isEmpty()) -->
                    @foreach ($posts as $post)

                        <div class="card">

                            <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">

                            <div class="card-body">{{$post->description}}</div>
                                <!-- @if ($post->likes == 0)
                                    <a class="btn btn-danger" href="{{route('like', ['idPost' => $post->id])}}">Like</a>
                                @else
                                    <span>{{$post->likes}} likes</span>
                                @endif -->
                        </div>   

                    @endforeach
                <!-- else
                    <h2 class="text-center">Nenhum post a Mostrar!</h2>
                    <h3 class="text-center">Adicione um post clicando <a href="{{ route('CreatePosts') }}">aqui</a></h3>
                endif -->
        </div>
    </div>
</div>
@endsection