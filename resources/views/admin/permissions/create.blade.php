@extends('layouts.app')

@section('title', '| Crear')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
          <div class="row">
            <h4 class="col-sm-5 col-md-10"><i class="fas fa-lock-open"></i> Administración</h4>
            <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary float-right">Usuarios</a>
            <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary ml-1">Roles</a>
          </div>      
            <hr>
            <h5 class="card-title">
                <i class='fa fa-key'></i> Crear permiso
            </h5>
            {{ Form::open(array('url' => 'permissions')) }}
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div>
                @if(!$roles->isEmpty())             {{-- If no roles exist yet --}}
                    <h5 class="card-title">Asignar el permiso al rol</h5>
                    <div class="form-group">
                    @foreach ($roles as $role) 
                        {{ Form::checkbox('roles[]',  $role->id ) }}
                        {{ Form::label($role->name, ucfirst($role->name)) }}
                        <br>
                    @endforeach
                    </div>
                @endif
                {{ Form::submit('Guardar', array('class' => 'btn btn-sm btn-primary')) }}
                <a href="{{ URL::previous() }}" class="btn btn-sm btn-secondary float-right">Regresar</a>
            {{ Form::close() }}
        </div>
    </div>
@endsection