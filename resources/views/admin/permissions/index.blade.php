@extends('layouts.app')

@section('title', '| Permisos')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md">
            <h4><i class="fas fa-lock-open"></i> Administración
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary float-right">Usuarios</a>
                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary float-right">Roles</a>
            </h4>
            <hr>
            <div class="card-title">
                <h5><i class="fa fa-key"></i> Permisos
                    <a href="{{ URL::to('permissions/create') }}" class="btn btn-sm btn-primary float-right"> Crear</a>
                </h5>
            </div>
            <div class="card">
                <div class="card-block">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Permisos</th>
                                <th colspan="2">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td> 
                                <td width="10px">
                                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-sm btn-primary" style="margin-right: 3px;">Editar</a>
                                </td>
                                <td width="10px">
                                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                                    {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $permissions->render() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection