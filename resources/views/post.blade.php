@extends('layouts.main')
@section('title', $post->title)
@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
        <div id="image-container" class="col-md-6">
        <img src="/img/posts/{{$post->image}}" class="img-fluid" alt="{{$post->title}}">

        </div>
        <div id="info-container" class="col-md-6">
            <h1>{{$post->title}}</h1>
            <p class="post"><ion-icon name="location-outline"></ion-icon>{{$post->title}}</p>
        </div>
        <div class="col-md-12" id="description-container">
            <p class="post-description">{{$post->description}}</p>
            <p class="post-description">{{$post->public}} </p>
            <p class="post-description">{{$postOwner['name']}} </p>
        </div>
    </div>
</div>

@endsection
