@extends('layouts.main')
@section('title', 'Ínicio Blog')
@section('content')

<div id="search-container" class="col-md-12">
    <h3>Buscar Postagem</h3>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
    </form>
</div>
<div id="events-container" class="col-md-12">
    @if($search)
    <h3>Buscando por: <strong>{{$search}}</strong></h3>
    @else
    <h3>Últimas Postagens</h3>
    @endif
    <h4>Posts</h4>
    <div id="cards-container" class="row">
        @foreach($posts as $post)
        <div class="card-body">
            <h5 class="card-title">Título: {{$post->title}}</h5>
            <h5 class="card-title">Descrição: {{$post->description}}</h5>
            <h5 class="card-title">Publicado: {{$post->public}}</h5>
            <img src="/img/posts/{{$post->image}}" alt="{{$post->title}}">
            <a href="/post/{{$post->id}}" class="btn btn-primary">Visualizar</a>
        </div>

        @endforeach
        @if(count($posts) == 0 && $search)
            <p> Não foi encontrada nenhuma publicação.</p> <a href="/">Ver todos</a>
        @elseif(count($posts) == 0)
            <p> Não foi encontrada nenhuma publicação</p>
        @endif
    </div>
</div>

@endsection
