@extends('layouts.app')

@section('content')
<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">
            @if(!$posts->isEmpty())
                @foreach ($posts as $post)

                    <div class="card mt-4">

                        <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">

                        <div class="card-body">{{$post->description}}</div>
                            <!-- @if ($post->likes == 0)
                                <a class="btn btn-danger" href="{{route('like', ['idPost' => $post->id])}}">Like</a>
                            @else
                                <span>{{$post->likes}} likes</span>
                            @endif -->
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