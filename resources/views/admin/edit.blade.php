@extends('layouts.admin')
@section('title', 'Editando: $post->title')
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h2> Editando {{$post->title}}</h2>
    <form action="/update/{{$post->id}}" method="POST" enctype="multipart/form-data">
        @csrf <!-- diretiva obrigatoria para permitir inserir os dados no banco -->
        @method('PUT')
        <div class="form-group">
            <label for="image">Título Post:</label>
            <input type="text" class="form-control-file" id="title" name="title" placeholder="Título do post" value="{{$post->title}}">

        </div>
        <div class="form-group">
            <label for="title">Imagem Post:</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="/img/posts/{{$post->image}}" alt="{{$post->title}}" class="img-preview">
        </div>
        <div class="form-group">
            <label for="title">Texto do Post:</label>
            <textarea class="form-control" id="description" name="description" placeholder="Texto do post">{{$post->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="title">Post ativo:</label>
            <select name="public" id="public" class="form-control">
                <option value="1" {{$post->public == 1 ? "selected='selected'" : ""}}>Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Cadastrar">
    </form>
</div>

@endsection
