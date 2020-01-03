@extends('layouts.app')

@section('title', '| Editar')

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
                    <i class="fa fa-key"></i> Editar permiso
                </h5>
                {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Permiso') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>
                    <br>
                    {{ Form::submit('Guardar', array('class' => 'btn btn-sm btn-primary')) }}
                    <a href="{{ URL::previous() }}" class="btn btn-sm btn-secondary float-right"> Regresar</a>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection