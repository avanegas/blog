@extends('layouts.app')

@section('title', '| Crear')

@section('content')
    <div class="container">
        <div class="row">
            <div class='col-md'>
                <h4><i class="fas fa-lock-open"></i> Administración
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary float-right">Usuarios</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-secondary float-right">Permisos</a>
                </h4>
                <hr>

                <div class="card-title">
                    <h5><i class='fa fa-key'></i> Crear rol</h5>
                </div>
                <br>
                <div class="card-block">
                    {{ Form::open(array('url' => 'roles')) }}
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>
                        
                        <div class='form-group'>
                            <h6><strong>Asignar permisos</strong></h6>
                            @foreach ($permissions as $permission)
                                {{ Form::checkbox('permissions[]',  $permission->id ) }}
                                {{ Form::label($permission->name, ucfirst($permission->name)) }}
                                <br>
                            @endforeach
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Add', array('class' => 'btn btn-sm btn-primary')) }}
                            <a href="{{ URL::previous() }}" class="btn btn-sm btn-secondary float-right"> Regresar</a>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection