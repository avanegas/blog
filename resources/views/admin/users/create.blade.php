@extends('layouts.app')

@section('title', '| Crear')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md">
                <h4><i class="fas fa-lock-open"></i> Administración
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary float-right">Roles</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-secondary float-right">Permisos</a>
                </h4>
                <hr>

                <div class="card-title">
                    <h5><i class='fa fa-user-plus'></i> Crear usuario</h5>
                </div>
                <br>
                <div class="card-block">
                    {!! Form::open(['route' => 'users.store']) !!}

                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, array('class' => 'form-control')) }}
                        </div>

                        <h6><strong>Asignar rol</strong></h6>

                        <div class='form-group'>
                            @foreach ($roles as $role)
                                {{ Form::checkbox('roles[]',  $role->id ) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                            @endforeach
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}<br>
                            {{ Form::password('password', array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::label('password', 'Confirm Password') }}<br>
                            {{ Form::password('password_confirmation', array('class' => 'form-control')) }}
                        </div>

                        <div class="form-group">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
                            <a href="{{ URL::previous() }}" class="btn btn-sm btn-secondary float-right"> Regresar</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
