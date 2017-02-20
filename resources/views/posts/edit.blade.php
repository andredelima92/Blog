
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{Url('/posts/')}}"><span class="glyphicon glyphicon-arrow-left"></span> Voltar</a><br>
                    Editar Postagem
                </div>
                <div class="panel-body">
                   <form method="post" action="/posts/{{ $post->id }}">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="title">Título:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="comment">Conteudo:</label>
                            <textarea class="form-control" rows="5" id="comment" name="body" required>{{ $post->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="slug">Url Amigável:</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $post->slug }}" required>
                        </div>
                        <button type="submit" class="btn btn-default">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection