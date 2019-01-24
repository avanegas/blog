@extends('layouts.app')

@section('title', '| Crear')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <div class="card-title">
                    <h5><i class="fa fa-key"></i> Crear entrada</h5>
                </div>
                <div class="card-block">
                    {!! Form::open(['route' => 'posts.store', 'files' => true]) !!}
                        
                        @include('admin.posts.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
