@extends('layouts.app')

@section('title', '| Editar')

@section('content')
<div class="container">
    <div class="row">
        <div class='col-md'>
          <div class="row">
            <h4 class="col-sm-5 col-md-10"><i class="fas fa-lock-open"></i> Administración</h4>
                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary float-right">Usuarios</a>
                <a href="{{ route('permissions.index') }}" class="btn btn-sm btn-secondary ml-1">Permisos</a>
          </div>  
          <hr>

          <div class="card-title">
              <h5 class="card-title"><i class='fa fa-key'></i> Editar rol</h5>
          </div>
          <br>
          <div class="card-block">
              {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}
                  <div class="form-group">
                      {{ Form::label('name', 'Role Name') }}
                      {{ Form::text('name', null, array('class' => 'form-control')) }}
                  </div>
                  <div class="form-group">
                      <h6><strong>Asignar permisos</strong></h6>
                      @foreach ($permissions as $permission)
                          {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                          {{Form::label($permission->name, ucfirst($permission->name)) }}
                          <br>
                      @endforeach
                  </div>
                  <div class="form-group">
                      {!! Form::submit('Guardar', array('class' => 'btn btn-sm btn-primary')) !!}
                      <a href="{{ URL::previous() }}" class="btn btn-sm btn-secondary float-right"> Regresar</a>
                  </div>
              {!! Form::close() !!}
           </div>    
    
        </div>
    </div>
</div>
@endsection