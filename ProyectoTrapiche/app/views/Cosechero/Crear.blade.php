@extends('Layaouts.master')

@section('Title')
<title>Registrar Cosechero</title>
@stop

@section('body')
{{--var_dump($Datos["Inputs"])--}}
<h2>Registrar Cosechero</h2>
<div class="form-horizontal">
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje_error') }}
    </div>
    @else

    {{Form::open(array('url'=>'cosechero/creado'))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre','',array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('PApellido','Primer Apellido',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('PApellido','',array('required'=>'true'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('SApellido','Segundo Apellido',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('SApellido','',array('required'=>'true'))}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('IdTipoId','Tipo de Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdTipoId',$Datos["TiposIds"],'',array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('NoId','Numero Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('text','NoId','',array('required'=>'true'))}}
        </div>
    </div>
     <div class="form-group">
        {{Form::Label('Foto','Foto',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('file','Foto','',array())}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('Email','Email',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('email','Email','',array('required'=>'true'))}}
        </div>
    </div>   
  
    <div class="form-group">
        {{Form::Label('FechaNacimiento','Fecha de Nacimiento',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('date','FechaNacimiento','',array('required'=>'true'))}}
        </div>
    </div>    
     <div class="form-group">
        {{Form::Label('IdTrapiche','Trapiche',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdTrapiche',$Datos["Trapiches"],0,array('class' => 'text-box single-line'))}}
        </div>
    </div>
     <div class="form-group">
        {{Form::Label('IdSexo','Sexo',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdSexo',$Datos["Sexos"],0,array('class' => 'text-box single-line'))}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('IdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdEstado',$Datos["Estados"],0,array('class' => 'text-box single-line'))}}
        </div>
    </div>
  
    
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('cosechero/index','Ir a la lista')}}</p>
    @endif
</div>


@stop