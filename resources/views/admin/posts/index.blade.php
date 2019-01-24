@extends('layouts.app')

@section('title', '| Aportes')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h5 class="card-title"><i class="fa fa-key"></i> Mis aportes
                    <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary float-right"> Crear</a>
                </h5>
                <div class="card">
                    <div class="card-block">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="10px">ID</th>
                                    <th>Titulo</th>
                                    <th>Fecha</th>
                                    <th>Imagen</th>
                                    <th colspan="3">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td><img src="../images/{{$post->file }}" alt="Imagen" width = "80px"></td>
                                    <td width="10px">
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm btn-primary">Ver</a>
                                    </td>
                                    <td width="10px">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>                           
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>   
                        </table>     	
                        {{ $posts->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
