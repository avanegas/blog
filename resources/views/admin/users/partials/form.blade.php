{{ Form::hidden('user_id', auth()->user()->id) }}

<div class="form-group">
    {{ Form::label('name', 'Name') }}
    {{ Form::text('name', null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
    {{ Form::label('email', 'Email') }}
    {{ Form::email('email', null, array('class' => 'form-control')) }}
</div>

<h5><b>Give Role</b></h5>

<div class='form-group'>
    @foreach ($roles as $role)
        {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
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
</div>