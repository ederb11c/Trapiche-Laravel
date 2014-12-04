@extends('Layaouts.master')

@section('Title')
<title>Eliminar</title>
@stop

@section('body')

<h3>Eliminar Tipo de Operario</h3>
<p> Estas seguro de eliminar este Tipo de Operario?</p>
<div class="form-horizontal">
    {{Form::open(array('url'=>'tiposdeoperario/eliminado/'.$TipoDeIdentificacion->GetId()))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre',$TipoDeIdentificacion->GetNombre(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>
   
    <div class="form-group">
        {{Form::Label('IdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdEstado',$Estados,$TipoDeIdentificacion->GetIdEstado(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
            
            {{Form::submit('Enviar',array('class'=>'btn btn-danger'))}}
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('tiposdeoperario/index','Ir a La Lista')}}</p>
</div>

@stop