@extends('layouts.app')

@section('content')

    <div class="jumbotron jumbotron-fluid bg-white col-md-12">
        <div class="container row">
            @foreach($user_data as $user)
                <div class="col-md-4">
                    <img class="profile-user-list" src="{{ url('storage/' . $user->avatar_path) }}">
                </div>
                <div class="col-md-8">
                    <h1 class="display-4">{{ $user->name }}</h1>
                    <p class="lead">
                        @if($user->id == auth()->id())
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_seguidores">
                                Ver seguidores
                            </button> <br><br>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_upload">
                                Alterar Foto de Perfil<i class="medium material-icons">settings</i>
                            </button>  
                        @else
                            @if(!$user->seguindo)
                                <a href="{{route('seguir_user',['idUser' => $user->id])}}" class="btn btn-primary">seguir</a>
                            @else
                                <a href="{{route('deixar_seguir_user',['idUser' => $user->id])}}" class="btn btn-danger">Deixar de Seguir</a>
                            @endif
                        @endif
                    </p>
                </div>
            @endforeach
            @if(session()->has('success'))
                <div class="alert alert-success col-12">
                    {{ session()->get('success') }}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger col-12">
                    {{ session()->get('error') }}
                </div>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1 class="card-title text-center">Upload da Foto de Perfil</h1>

                <form method="POST" enctype="multipart/form-data" action="{{route('store_profile_img')}}">
                    @csrf

                    <div class="col-md-12 mx-auto">
                        <div class="form-group col-12">
                            <label for="fileImage"><img class="img-form" src="{{asset('images/icons/upload.png')}}" ></label>
                            <input type="file" class="form-control-file" id="fileImage" name="image_profile">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary col-12">Postar</button>
                </form>
            </div>
            </div>
        </div>
    </div>
    @if($user->id == auth()->id())
        <div class="modal fade" id="modal_seguidores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                                <h1 class="card-title text-center col-10">Seus Seguidores</h1>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @foreach ($seguidores_arr as $seguidores)
                                @foreach ($seguidores as $seguidor)
                                    <li class="list-group-item">
                                        <img  class="user_list_avatar" src="{{url('storage/' . $seguidor->avatar_path)}}">
                                        <span class="list-title">{{$seguidor->name}}</<span>

                                        <a href="{{route('seguir_user',['idUser' => $seguidor->id])}}" class="btn btn-primary">seguir</a>
                                        <a href="{{route('user_profile',['idUser' => $seguidor->id])}}" class="btn btn-dark">ver perfil</a>
                                    </li>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    @endif
   <div class="row">
        <div class="card col-md-12">
            <div class="card-body row">
                <!-- if(!$posts->isEmpty()) -->
                    @foreach ($posts as $post)
                        <div class="col-md-4 py-2">
                            <div class="card">

                                <img class="card-img-top" src="{{$post->image_path}}" alt="Card image cap">

                                <div class="card-body">{{$post->description}}</div>
                                    <!-- @if ($post->likes == 0)
                                        <a class="btn btn-danger" href="{{route('like', ['idPost' => $post->id])}}">Like</a>
                                    @else
                                        <span>{{$post->likes}} likes</span>
                                    @endif -->
                            </div>   
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