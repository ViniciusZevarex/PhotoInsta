@extends('layouts.app')

@section('content')
   <div class="row">
        <div class="card col-md-12">
            <div class="card-body row">
                <h1 class="text-center col-12">Perfis Cadastrados no PhotoInsta</h1>
                @if(session()->has('success'))
                    <div class="alert alert-success col-12">
                        {{ session()->get('success') }}
                    </div>
                @elseif(session()->has('error'))
                    <div class="alert alert-danger col-12">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="col-12">
                    <ul class="list-group">
                        @foreach ($users as $user)
                            <li class="list-group-item">
                                <img  class="user_list_avatar" src="{{url('storage/' . $user->avatar_path)}}">
                                <span class="list-title">{{$user->name}}</<span>
                                @if(!$user->seguindo)
                                    <a href="{{route('deixar_seguir_user',['idUser' => $user->id])}}" class="btn btn-primary">seguir</a>
                                @else
                                    <a href="{{route('seguir_user',['idUser' => $user->id])}}" class="btn btn-danger">Deixar de Seguir</a>
                                @endif
                                
                                <a href="{{route('user_profile',['idUser' => $user->id])}}" class="btn btn-dark">ver perfil</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection