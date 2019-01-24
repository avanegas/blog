@extends('layouts.app')

@section('title', '| Roles')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <h4><i class="fas fa-lock-open"></i> Administración
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary float-right">Usuarios</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-secondary float-right">Permisos</a>
            </h4>
            <hr>
            <div class="card-title">
                <h5><i class="fa fa-key"></i> Roles
                    <a href="{{ URL::to('roles/create') }}" class="btn btn-sm btn-primary float-right"> Crear</a>
                </h5>  
            </div>          
            <div class="card">
                <div class="card-block">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Rol</th>
                                <th>Permisos</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                            <tr>
                                <td>{{ $role->name }}</td>

                                <td>{{ $role->permissions()->pluck('name')->implode(', ') }}</td>
                                <td width="10px">
                                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-sm btn-primary" style="margin-right: 3px;">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $roles->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection