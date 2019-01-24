@extends('layouts.app')

@section('title', '| Usuarios')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <h4><i class="fas fa-lock-open"></i> Administración
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary float-right">Roles</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-secondary float-right">Permisos</a>
            </h4>
            <hr>
            <div class="card-title">
                <h5><i class="fa fa-users"></i> Usuarios
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary float-right"> Crear</a>
                </h5>
            </div>
            <div class="card">
                <div class="card-block">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Roles</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Ingreso</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td> {{--Retrieve array of roles associated to a user and convert to string --}}
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td width="10px">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'DELETE']) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!} 
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>   
                    </table>     	
                    {{ $users->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
