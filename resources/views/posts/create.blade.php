@extends('layouts.app')


@section('content')




<div class="container">

   <div class="row justify-content-center">

        <div class="card col-md-8">
                <div class="card-body">
                    <h1 class="card-title text-center">Adicionar Postagem</h1>

                        <form method="POST" enctype="multipart/form-data" action="{{route('store_posts')}}">
                            @csrf

                            <div class="form-group">
                                <label for="desc">Descrição: </label>
                                <textarea class="form-control" id="desc" rows="3" name="description"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="filter">Filter: </label>
                                <input type="text" class="form-control" id="filter" name="filter" placeholder="Filtro">
                            </div>
                            <div class="col-md-10 m-auto">
                                <div class="form-group col-12">
                                    <label for="fileImage"><img class="img-form" src="{{asset('images/icons/upload.png')}}" ></label>
                                    <input type="file" class="form-control-file" id="fileImage" name="image_path">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary col-12">Postar</button>
                        </form>
                </div>
            </div>
        
   </div>

</div>

@endsection