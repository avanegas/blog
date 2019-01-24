@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">

        	<h3 CLASS="card-title mb-2 text-muted">LISTA DE ARTICULOS</h3>

        	@foreach($posts as $post)
            <div class="card">
                <div class="card-title">{{ $post->name }}</div>

                <div class="card-block">
                    @if($post->file)
                        <img src="images/{{ $post->file }}" class="card-img-top">
                    @endif
                    
                    {{ $post->excerpt }}
                    <a href="{{ route('post', $post->slug) }}" class="float-right">Leer más</a>
                </div>
            </div>
            <br/>
            @endforeach

            {{ $posts->render() }}
        </div>
    </div>
</div>
@endsection
