@extends('layouts.app')

@section('title', '| Categorias')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h5 class="card-title"><i class="fa fa-key"></i> Categorías 
                    <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary float-right"> Crear</a>
                </h5>
                <div class="card">
                    <div class="card-block">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="10px">ID</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th colspan="2">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->body }}</td>
                                    <td width="10px">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                    </td>
                                    <td width="10px">
                                        {!! Form::open(['route' => ['categories.destroy', $category->id], 'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>                           
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>   
                        </table>
                        {{ $categories->render() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
