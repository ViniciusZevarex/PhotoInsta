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
                    <p class="lead">Ver seguidores</p>
                    <p class="lead">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_upload">
                            Alterar Foto de Perfil<i class="medium material-icons">settings</i>
                        </button>  
                    </p>
                </div>
            @endforeach
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