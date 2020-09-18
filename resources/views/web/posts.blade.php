@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <div class="d-flex">
                <h5 class="mr-auto p-2"> Apuntes, detalles y teoría de la construcción.</h5>
                <div class="col-4 p-0">
                    <input
                        type="search"
                        class="form-control mr-sm-2 mb-2 mb-sm-0"
                        placeholder="Search..."
                        autocomplete="off">
                </div>
            </div>
            <div class="row">
                <div class="col-md">
                    @foreach($posts as $post)
                    <div class="card mb-3 mt-3">
                        <div class="card-header">
                            <p>Tema creado por, {{$post->name}} el día<em> {{$post->created_at}}.</em></p>
                        </div>
                        <div class="card-body">
                            @if($post->file)
                                <img src="{{ $post->file }}" class="card-img-top">
                            @endif
                                <p class="card-title">CATEGORIA: {{$post->category->name}}</p>
                                <p class="text-uppercase text-center">{{$post->name}}</p>
                                <p class="card-text text-justify">{{$post->excerpt}}
                                    <a href="{{ route('post', $post->slug) }}" class="float-right">leer más</a>
                                </p>
                        </div>
                        <div class="card-footer">
                            <p class="float-right">comentarios: {{$post->comments->count()}}</p>
                        </div>
                    </div>
                    @endforeach
                    <div  class="d-flex justify-content-center mt-3">
                        {{ $posts->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
