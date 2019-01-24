@extends('layouts.app')

@section('title', '| Editar')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card-title">
                    <h5><i class="fa fa-key"></i> Editar entrada</h5>
                </div>
                <div class="car-block">
                    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
                        
                        @include('admin.posts.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
