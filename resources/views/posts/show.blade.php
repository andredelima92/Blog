
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{Url('/posts/')}}"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
                </div>
                <div class="panel-heading">Postagem</div>
                <div class="panel-body">
                    <p><b>Usuário: </b> {{ $post->user_id }}</p>
                    <p><b>Título: </b> {{ $post->title }}</p>
                    <p><b>Conteúdo: </b> {{ $post->body }}</p>
                    <p><b>Criado em: </b> {{ $post->created_at }}</p>
                    <p><b>Atualizado em: </b> {{ $post->updated_at }}</p>
                    <div class="col-md-2">
                        <a href="{{ url('/comments/'. $post->id) }}" class="btn btn-info">Comentarios</a>
                    </div>
                    <form method="post" action="/posts/{{ $post->id }}">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <p>
                        
                        <div class="col-md-2 col-md-offset-8">
                            <button type="submit" class="btn btn-default">Excluir</button>
                        </div>              
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection