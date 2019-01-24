@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col-md">
              
              <div class="card-block">
                  <h5 class="card-subtitle">CATEGORIA:</h5>
                  <a href="{{ route('category', $post->category->slug) }}">
                      {{ $post->category->name }}
                  </a>
              </div>

              <div class="card-block">
                  @if($post->file)
                      <img src=" ../images/{{ $post->file }}" class="card-img-top">
                  @endif
                  <h5 class="card-title"><span>TITULO:</span>{{ $post->name }}</h5>
                      <p><span>RESUMEN:</span> {{$post->excerpt}}</p>
                      <p>
                          {!! $post->body !!}
                      </p>

              </div>

              <div>
                  <h5 class="card-subtitle">ETIQUETAS:</h5>
                  @foreach($post->tags as $tag)
                      <a href="{{ route('tag', $tag->slug) }}">
                          {{ $tag->name }}
                      </a>
                  @endforeach
              </div>
              <hr>
              <div class="card-block">
                  <h6><strong>Comentarios </strong> {{$comments->count()}}</h6>
                  
                  @if (Auth::check())
                      <!--include('includes.errors')-->
                      {{ Form::open(['route' => ['comments.store'], 'method' => 'POST']) }}

                          <div class="form-group">
                              {{ Form::label('body', 'Comentario') }}
                              {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => '4']) }}
                          </div>
                      
                          {{ Form::hidden('post_id', $post->id) }}
                          {{ Form::submit('Send') }}

                      {{ Form::close() }}
                  @endif
                  <hr>
                  <h5><span>{{$comments->count()}} {{ str_plural('respuesta', $comments->count()) }}</span></h5>
                  <hr>
                  @forelse ($comments as $comment)
                      <div class="card">
                          <div class="card-block">
                              <p>AUTOR: {{ $comment->user->name }} FECHA: {{$comment->created_at}}</p>
                              <p>MENSAJE: {{ $comment->body }}</p>
                          </div>
                      </div>
                  @empty
                      <p>Este articulo NO tiene comentarios....?</p>
                  @endforelse
              </div>
              
          </div>
      </div>
  </div>
@endsection
