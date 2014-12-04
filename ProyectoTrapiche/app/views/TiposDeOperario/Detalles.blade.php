@extends('Layaouts.master')

@section('Title')
<title>Detalles Tipo de Operario</title>
@stop

@section('body')

<h3>Detalles Tipo Operario</h3>
<div class="form-horizontal">
    {{Form::open(array('url'=>'tiposdeoperario/editado/'.$TipoDeIdentificacion->GetId()))}}
    <div class="form-group">
        {{Form::Label('Nombre','Nombre',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10">    
            {{Form::text('Nombre',$TipoDeIdentificacion->GetNombre(),array('class' => 'text-box single-line','disabled'))}}
        </div>
    </div>
   
    <div class="form-group">
        {{Form::Label('IdEstado','Estado',array('class' => 'control-label col-md-2'))}}
        <div class="col-md-10"> 
            {{Form::select('IdEstado',$Estados,$TipoDeIdentificacion->GetIdEstado(),array('disabled'))}}
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-10"> 
        </div>
    </div>
    {{Form::close()}}
    <p>{{ HTML::link('tiposdeoperario/index','Ir a La Lista')}}</p>
</div>

@stop