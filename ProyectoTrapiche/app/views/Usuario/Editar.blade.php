@extends('Layaouts.master')

@section('Title')
<title>Editar Usuario</title>
@stop

@section('body')

<h2>Editar Usuario</h2>
<div class="form-horizontal">
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje_error') }}
    </div>
    @else


    {{Form::open(array('url'=>'usuario/editado/'.$Usuario->GetId()))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre',$Usuario->GetNombre(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('PApellido','Primer Apellido',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('PApellido',$Usuario->GetPApellido(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('SApellido','Segundo Apellido',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('SApellido',$Usuario->GetSApellido(),array('required'=>'true'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('IdTipoId','Tipo de Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdTipoId',$Datos["TiposIds"],$Usuario->GetIdTipoId(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('NoId','Numero Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('NoId','NoId',$Usuario->GetNumeroDeId(),array('required'=>'true'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('Email','Email',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('email','Email',$Usuario->GetEmail(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('Login','Login',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('text','Login',$Usuario->GetLogin(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('Contrasena','Contrasena',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('password','Contrasena',$Usuario->GetContrasena(),array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('FechaNacimiento','Fecha de Nacimiento',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('date','FechaNacimiento',$Usuario->GetFechaNacimiento(),array('required'=>'true'))}}
        </div>
    </div>
    
     <div class="form-group">
        {{Form::Label('IdRol','Rol',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdRol',$Datos["Roles"],$Usuario->GetIdRol(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
     <div class="form-group">
        {{Form::Label('IdSexo','Sexo',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdSexo',$Datos["Sexos"],$Usuario->GetIdRol(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('IdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdEstado',$Datos["Estados"],$Usuario->GetIdEstado(),array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('usuario/index','Ir a la lista')}}</p>
    @endif
</div>


@stop