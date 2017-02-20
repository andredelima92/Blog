@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{Url('/posts/'. $post->id)}}"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a>
                    <p><b>Título: </b> {{ $post->title }}</p>
                    <p><b>Conteúdo: </b> {{ $post->body }}</p>
                </div>
                <div class="panel-body">
                    <h3>Novo comentario</h3>
                    <form method="post" action="/comments">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" value="{{ $post->id }}" name="post_id">
                            <textarea class="form-control" name="description" placeholder="Digite o comentario aqui..." required></textarea><br>
                            <input type="submit" class="btn btn-primary" value="Enviar comentario">
                        </div>
                    </form>    
            
                    <hr>
                    <h4>Comentarios</h4>
                    @foreach ($comments as $comment)
                        <hr>
                        <p><b>Usuario:</b> {{ $user_name }} -  <b>Postado em:</b>  {{$comment->present()->createdAt}} - <b>Atualizado em:</b> {{$comment->present()->updatedAt}}</p>
                        <p>{{$comment->description}}</p>
                        <form method="post" action="/comments/{{ $comment->id }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                            {{ csrf_field() }}
                            <div class="col-md-12 col-md-offset-10">
                                <button type="submit" class="btn btn-default">Excluir</button>
                            </div>
                        </form><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection