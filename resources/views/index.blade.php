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

</div>

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="/post/{{$post->id}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <h3 class="post-subtitle">Problems look mighty small from 150 miles up</h3>
                            <img id="img-post" src="/img/posts/{{$post->image}}" alt="{{$post->title}}">
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Start Bootstrap</a>
                            on September 24, 2022
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    @endforeach
        @if(count($posts) == 0 && $search)
            <p> Não foi encontrada nenhuma publicação.</p> <a href="/">Ver todos</a>
        @elseif(count($posts) == 0)
            <p> Não foi encontrada nenhuma publicação</p>
        @endif
                     <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>


@endsection
