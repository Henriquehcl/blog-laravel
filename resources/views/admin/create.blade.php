@extends('layouts.admin')
@section('title', 'Ínicio Blog')
@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h2> Cadastro do Post</h2>
    <form action="/saving" method="POST" enctype="multipart/form-data">
        @csrf <!-- diretiva obrigatoria para permitir inserir os dados no banco -->
        <div class="form-group">
            <label for="image">Imagem Post:</label>
            <input type="text" class="form-control-file" id="title" name="title" placeholder="Título do post">
        </div>
        <div class="form-group">
            <label for="title">Título Post:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="title">Texto do Post:</label>
            <textarea class="form-control" id="description" name="description" placeholder="Texto do post" ></textarea>
        </div>
        <div class="form-group">
            <label for="title">Post ativo:</label>
            <select name="public" id="public" class="form-control">
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Cadastrar">
    </form>
</div>

@endsection
