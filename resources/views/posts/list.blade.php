@extends('layouts.app')

@section('content')
<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-body">
                    <h3>Para adicionar um post clique <a href="{{route('CreatePosts')}}" class="btn btn-dark">Aqui</a></h3>
                </div>
            </div>

            @if(!$posts->isEmpty())
                @foreach ($posts as $post)

                    <div class="card mt-4">

                        <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">

                        <div class="card-body row p-5">
                            <h4 class="col-12">{{$post->description}}</h4>
                            exibir um de cada vez, se já deu like ou se não deu
                            <a class="btn btn-outline-danger col-1" href="{{route('like', ['idPost' => $post->id])}}">
                                <i class="material-icons">thumb_up</i>
                            </a>
                            <a class="btn btn-danger col-1" href="{{route('unlike', ['idPost' => $post->id])}}">
                                <i class="material-icons">thumb_down</i>
                            </a>
                        </div>
                        <!-- comments -->
                        <ul class="list-group comment-list">
                          <li class="list-group-item">Caraca!!!! Foto tooop whagdhsagdhsa</li>
                          <li class="list-group-item">
                                <form class="form-inline col-12">
                                    <input class="form-control col-10" type="search" placeholder="Comentar" aria-label="Pesquisar">
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
