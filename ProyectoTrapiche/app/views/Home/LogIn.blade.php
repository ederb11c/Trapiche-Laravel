@extends('Home.LogInMaster')
@section('Titulo')
<title>Login</title>
@stop

@section('body')
<h2>Login</h2>

    {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
    {{ Session::get('mensaje_error') }}
    </div>
    @endif
    <br>
<div class="form-horizontal">
    {{ Form::open(array('url' => 'Home/Loged')) }}
    <div class="form-group">
        {{ Form::label('usuario', 'Nombre de usuario',array('class' => 'control-label col-md-2')) }}
        <div class="col-md-10"><!--array('class'=>'text-box single-line')-->
            {{ Form::text('username', Input::old('username'),array('class' => 'text-box single-line')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('Contrasena', 'password',array('class' => 'control-label col-md-2')) }}
        <div class="col-md-10"><!--array('class'=>'text-box single-line')-->
            {{ Form::password('password','',array('class' => 'text-box single-line')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('lblRememberme', 'Recordar contraseña',array('class' => 'control-label col-md-2')) }}
        <div class="col-md-10">
            {{ Form::checkbox('rememberme', true,array('class' => 'text-box single-line')) }}
        </div>
    </div>
    <div class="form-group">
          {{ Form::label('', '',array('class' => 'control-label col-md-2')) }}
        <div class="col-md-10">
            {{ Form::submit('Enviar',array('class' => 'btn btn-success')) }}
        </div>
    </div>
    {{ Form::close() }}
</div>

@stop

