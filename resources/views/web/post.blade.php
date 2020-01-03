@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">

            <div class="card-block">
                <div>
                    <h6 class="card-subtitle">CATEGORIA:</h6>
                    <a href="{{ route('category', $post->category->slug) }}">
                        {{ $post->category->name }}
                    </a>
                </div>

                <div >
                    @if($post->file)
                        <img src="../images/{{ $post->file }}" class="card-img-top">
                    @endif
                    <hr>
                    <h4 class="card-title">{{ $post->name }}</h4>
                    {!! $post->body !!}
                </div>

                <div>
                    <h6 class="card-subtitle">ETIQUETAS:</h6>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('tag', $tag->slug) }}">
                            {{ $tag->name }},
                        </a>
                    @endforeach
                </div>
            </div>

            <hr>
            <div class="card-block">
                <h5>Este articulo tiene <span>{{$comments->count()}} {{ Illuminate\Support\Str::plural('comentario', $comments->count()) }}</span></h5>
            @if (Auth::check())
                <!--include('includes.errors')-->
                    {{ Form::open(['route' => ['comments.store'], 'method' => 'POST']) }}

                    <div class="form-group">
                        {{ Form::label('body', 'Escriba su comentario:') }}
                        {{ Form::textarea('body', null, ['class' => 'form-control', 'rows' => '4']) }}
                    </div>

                    {{ Form::hidden('post_id', $post->id) }}
                    {{ Form::submit('Send') }}

                    {{ Form::close() }}
                @endif
                <br>
                @forelse ($comments as $comment)
                    <div class="card">
                        <div class="card-block">
                            <p>{{ $comment->user->name }}, comento el {{$comment->created_at}}</p>
                            <p>{{ $comment->body }}</p>
                        </div>
                    </div>
                    <br>
                @empty
                    <p>Este articulo NO tiene comentarios....?</p>
                @endforelse
            </div>

        </div>
    </div>
</div>
@endsection