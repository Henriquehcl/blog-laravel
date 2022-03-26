@extends('layouts.admin')
@section('title', 'ADM - DashBoard')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h2> Postagens:</h2>
</div>
<div class="col-md-10 offset-md-1 dashboard-event-container">
    @if(count($posts) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Resumo</th>
                <th scope="col">Publicado</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td scope="row">{{$loop->index}}</td>
                    <td><a href="/post/{{$post->id}}">{{$post->title}}</a></td>
                    <td>Sem nada, precisa implementar</td>
                    <td>{{$post->public}}</td>
                    <td>
                        <a href="#" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
                        <!--<form action="/post/{{$post->id}}" method="POST">

                            @csrf
                            @method('DELETE')
                            {{ method_field('delete')}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form> -->
                        <form action="{{route('post.destroy',$post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <!--<input type="submit" value="deletar" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>-->
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon>Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>você não tem nenhuma publicação. <a href="/create_post">Novo Post</a></p>
    @endif
</div>

@endsection
