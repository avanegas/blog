@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">

            <div class="form-group row">
                <h5 class="col-7"> Apuntes, detalles y teoría de la construcción.</h5>
                <div class="form-group col-4">
                    <input
                        type="text"
                        class="form-control mr-sm-2 mb-2 mb-sm-0"
                        placeholder="Search..."
                        autocomplete="off">
                </div>
            </div>

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
