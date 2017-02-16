@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Postagens
                </div><br>
                <div class="col-md-12">
                    <a href="{{Url('/posts/create')}}" class="btn btn-primary">Novo</a>
                </div>
                <div class="panel-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Usuário</th>
                                <th>Título</th>
                                <th>Conteúdo</th>
                                <th>Editar</th>
                                <th>Visualizar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</a></td>
                                        <td>{{ $post->user_id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->body }}</td>
                                        <td><a href="{{ Url('/posts/'. $post->id.'/edit' ) }}"> Editar </a></td>
                                        <td><a href="{{ Url('/posts/'. $post->id) }}"><span class="glyphicon glyphicon-search"></span></a></td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection