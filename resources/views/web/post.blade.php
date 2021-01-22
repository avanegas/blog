@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">

            <div class="card mb-3 mt-3">
                <div class="card-header">
                    CATEGORIA:
                    <a href="{{ route('category', $post->category->slug) }}" class="card-title" title="Selección por categoría">
                        {{ $post->category->name }}
                    </a>
                </div>

                <div class="card-body" >
                    @if($post->file)
                        <img src="{{ $post->file }}" class="card-img-top">
                    @endif
                        <p class="card-title text-uppercase text-center">{{$post->name}}</p>
                        <p class="card-text text-justify">{{ $post->body }}</p>
                        <p class="card-title">ETIQUETAS:
                            @foreach($post->tags as $tag)
                                <a href="{{ route('tag', $tag->slug) }}"  class="alert-link" title="Selección por etiqueta">
                                    {{ $tag->name }},
                                </a>
                            @endforeach
                        </p>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <h5 class="mr-auto p-2">Este articulo tiene <span style="font-weight: bold;">{{$post->comments->count()}}</span> {{ Illuminate\Support\Str::plural('comentario', $comments->count()) }}</h5>
                        <h6 class="p-0"><button class="btn btn-outline-secondary" type="button" data-toggle="collapse" data-target="#comentario" aria-expanded="false" aria-controls="collapseExample">
                                Comentar
                        </button></h6>
                    </div>

                    @auth
                        <!--include('includes.errors')-->
                        <form method="post" action="{{ route('comment.add') }}">
                            @csrf
                            <div class="collapse input-group mb-4" id="comentario">
                                <textarea id="comment" name="comment" class="form-control" rows="5" aria-label="With textarea" placeholder="Escriba su comentario" ></textarea>
                                <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Publicar</button>
                                </div>
                            </div>
                        </form>
                    @endauth 
                </div>
                @if($comments->count()>0)
                    @forelse ($comments as $comment)
                        <div class="card">
                            <div class="card-body">
                                <p><strong>Usuario: </strong>{{ $comment->user->name }}, <strong> con fecha: </strong>{{ $comment->created_at }}</p>
                                <p><strong>Comentario: </strong>{{ $comment->comment }}</p>
                            </div>
                        </div>
                    @empty
                        <p>Este articulo NO tiene comentarios....?</p>
                    @endforelse
                @endif    
            </div>
        </div>
    </div>
</div>
@endsection