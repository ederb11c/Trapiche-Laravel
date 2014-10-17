@extends('Layaouts.master')

@section('Title')
<title>Detalles Cosechero</title>
@stop

@section('body')

<h2>Editar Cosechero</h2>
<div class="form-horizontal">
    @if(Session::has('mensaje_error'))
    <div class="alert alert-danger" role="alert">   
        {{ Session::get('mensaje_error') }}
    </div>
    @else


    {{Form::open(array('url'=>'cosechero/editado/'.$Cosechero->GetId()))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre',$Cosechero->GetNombre(),$Datos["Attr"])}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('PApellido','Primer Apellido',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('PApellido',$Cosechero->GetPApellido(),$Datos["Attr"])}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('SApellido','Segundo Apellido',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::text('SApellido',$Cosechero->GetSApellido(),$Datos["Attr"])}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('IdTipoId','Tipo de Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdTipoId',$Datos["TiposIds"],$Cosechero->GetIdTipoId(),$Datos["Attr"])}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('NoId','Numero Id',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('text','NoId',$Cosechero->GetNumeroId(),$Datos["Attr"])}}
        </div>
    </div>
    
    <div class="form-group">
        {{Form::Label('Email','Email',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('email','Email',$Cosechero->GetEmail(),$Datos["Attr"])}}
        </div>
    </div>
  
  
    <div class="form-group">
        {{Form::Label('IdTrapiche','IdTrapiche',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
                {{Form::select('IdTrapiche',$Datos["Trapiches"],$Cosechero->GetIdTrapiche(),$Datos["Attr"])}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('FechaNacimiento','Fecha de Nacimiento',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::input('date','FechaNacimiento',$Cosechero->GetFechaNacimiento(),$Datos["Attr"])}}
        </div>
    </div>
    
    
     <div class="form-group">
        {{Form::Label('IdSexo','Sexo',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdSexo',$Datos["Sexos"],$Cosechero->GetIdSexo(),$Datos["Attr"])}}
        </div>
    </div>
    <div class="form-group">
        {{Form::Label('IdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdEstado',$Datos["Estados"],$Cosechero->GetIdEstado(),$Datos["Attr"])}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
           
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('cosechero/index','Ir a la lista')}}</p>
    @endif
</div>


@stop