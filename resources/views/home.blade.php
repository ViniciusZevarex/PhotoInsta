@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>


<div class="text-center">
    <h1>Ainda não há posts disponíveis</h1>
    <br>
    <h2>Clique aqui para criar posts: <a href="{{route('CreatePosts')}}">link</a></h2>
</div>

@endsection
