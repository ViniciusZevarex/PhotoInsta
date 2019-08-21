@extends('layouts.app')


@section('content')

<div class="container">

   <div class="row justify-content-center">

       <div class="col-md-8">

           <h1>Novo POST</h1>

           <form method="POST" enctype="multipart/form-data" action="/posts">

         

               @csrf

               Descrição<textarea type="text" name="description"></textarea>

         

               Filter:<input type="text" name="filter">

         

               Arquivo:<input type="file" name="image_path">

         

               <button type="submit">vai</button>

           </form>

       </div>

   </div>

</div>

@endsection