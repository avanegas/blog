@extends('layouts.app')

@section('title', '| Editar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h5 class="card-title">
                    <i class="fa fa-key"></i> Editar etiqueta
                </h5>
                <div class="card-block">
                    {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'PUT']) !!}
                        
                        @include('admin.tags.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection