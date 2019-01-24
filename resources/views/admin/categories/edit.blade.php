@extends('layouts.app')

@section('title', '| Editar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h5 class="card-title">
                    <i class="fa fa-key"></i> Editar categoría
                </h5>
                <div class="card-block">
                    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'PUT']) !!}
                        
                        @include('admin.categories.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
